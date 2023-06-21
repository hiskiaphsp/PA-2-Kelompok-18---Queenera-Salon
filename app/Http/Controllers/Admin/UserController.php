<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with('roles')->get();
        return view('pages.admin.user.main', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user.create', new User());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'email' =>'required|email|unique:users',
            'name' =>['required','min:8'],
            'nohp' =>[
                'required',
                'unique:users',
                'numeric',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^62/', $value)) {
                        $fail('Phone number must start with "62".');
                    }
                },
                function ($attribute, $value, $fail) {
                    if (strlen($value) < 9) {
                        $fail('Phone number must be have at least 9 characters.');
                    }
                },
            ],
            'password' =>'required|min:6'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);
        $user->assignRole('customer');

        return redirect()->route('admin.user.index')->with('success','Successfully added user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('pages.admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.admin.user.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'name' => ['required', 'min:8'],
            'nohp' =>[
                'required',
                'unique:users',
                'numeric',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^62/', $value)) {
                        $fail('Phone number must start with "62".');
                    }
                },
                function ($attribute, $value, $fail) {
                    if (strlen($value) < 9) {
                        $fail('Phone number must be have at least 9 characters.');
                    }
                },
            ],
            'password' => 'nullable|min:6'
        ]);

        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('admin.user.index')->with('success','Successfully updated user');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function change_role($id, $newRole)
    {
        $user = User::find($id);

        // Cek apakah role baru sudah ada, jika tidak, buat dulu.
        $role = Role::firstOrCreate(['name' => $newRole]);

        $user->syncRoles($role);

        return redirect()->route('admin.user.index')->with('success', $user->name. ' is ' .$newRole. ' now');
    }
}
