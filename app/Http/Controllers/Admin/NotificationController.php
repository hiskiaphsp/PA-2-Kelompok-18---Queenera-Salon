<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function counter()
    {
        $total = Notification::where('user_id', 1)->where('read', 0)->count();
        return response()->json([
            'total' => $total,
        ]);
    }

    public function index()
    {
        $user = User::find(Auth::id());
        $notifications = Notification::where('user_id', $user->id)->orderBy('id', 'desc')->get();
        $output = '';

        if ($notifications->count() > 0) {
            foreach ($notifications as $notification) {
                if ($notification->type == 'success') {
                    $output .= '
                    <li class="b-l-success border-4">
                        <p>' .$notification->message. ' ' .$notification->order_number.'<span class="font-success">' . $notification->created_at->diffForHumans() . '</span></p>
                    </li>
                    ';
                } elseif ($notification->type == 'warning') {
                    $output .= '
                    <li class="b-l-warning border-4">
                        <p>' .$notification->message. ' ' .$notification->order_number. '<span class="font-warning">' . $notification->created_at->diffForHumans() . '</span></p>
                    </li>
                    ';
                } elseif ($notification->type == 'info') {
                    $output .= '
                    <li class="b-l-info border-4">
                        <p>' .$notification->message. ' ' .$notification->order_number. '<span class="font-info">' . $notification->created_at->diffForHumans() . '</span></p>
                    </li>
                    ';
                }
            }
        } else {
            $output .= '
            <li class="b-l-info border-4">
                <p>' . $notification->message . '<span class="font-info">' . $notification->created_at->diffForHumans() . '</span></p>
            </li>
            ';
        }

        $notifications->each(function ($notification) {
            // $notification->read = true;
            $notification->save();
        });

        return response()->json([
            'notifications' => $output,
        ]);
    }

    public function markRead(){
        $user = User::find(Auth::id());
        $notifications = Notification::where('user_id', $user->id)->orderBy('id', 'desc')->get();

        $notifications->each(function ($notification) {
            $notification->read = true;
            $notification->save();
        });
    }
}
