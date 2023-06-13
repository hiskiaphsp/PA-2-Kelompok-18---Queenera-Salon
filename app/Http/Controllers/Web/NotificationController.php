<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function counter()
    {
        $total = Notification::where('user_id', Auth::user()->id)->where('read', 0)->count();
        return response()->json([
            'total' => $total,
        ]);
    }

    public function index()
    {
        $user = User::find(Auth::id());
        $notifications = Notification::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        $output = '';

        if ($notifications->count() > 0) {
            foreach ($notifications as $notification) {
                if ($notification->type == 'success') {
                    $output .= '
                    <div class="container">
                        <div class="notification-content d-flex justify-content-between align-items-center mb-2" >
                            <div class="notification-text">
                                <hr style="margin-top:-5px;">
                                <strong>Queenera Salon </strong>
                                <div class="text-success" style="float: right;">' . $notification->created_at->diffForHumans() . '</div>
                                <div class="text-wrap" style="text-align: justify;">
                                   ' .$notification->message. ' ' .$notification->order_number. '
                                </div>
                                <hr style="margin-bottom:-5px;">
                            </div>
                            <div style="margin-left:10px;">
                                <a class="delete-notification"  data-notification-id="' . $notification->id . '" onclick="deleteNotification(' . $notification->id . ')">
                                    <i class="icon-trash text-danger"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    ';
                } elseif ($notification->type == 'warning') {
                    $output .= '
                    <div class="container">
                        <div class="notification-content d-flex justify-content-between align-items-center mb-2" >
                            <div class="notification-text">
                                <hr style="margin-top:-5px;">
                                <strong>Queenera Salon </strong>
                                <div class="text-warning" style="float: right;">' . $notification->created_at->diffForHumans() . '</div>
                                <div class="text-wrap" style="text-align: justify;">
                                   ' .$notification->message. ' ' .$notification->order_number. '
                                </div>
                                <hr style="margin-bottom:-5px;">
                            </div>
                            <div style="margin-left:10px;">
                                <a class="delete-notification"  data-notification-id="' . $notification->id . '" onclick="deleteNotification(' . $notification->id . ')">
                                    <i class="icon-trash text-danger"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    ';
                } elseif ($notification->type == 'info') {
                    $output .= '
                    <div class="container">
                        <div class="notification-content d-flex justify-content-between align-items-center mb-2" >
                            <div class="notification-text">
                                <hr style="margin-top:-5px;">
                                <strong>Queenera Salon </strong>
                                <div class="text-info" style="float: right;">' . $notification->created_at->diffForHumans() . '</div>
                                <div class="text-wrap" style="text-align: justify;">
                                   ' .$notification->message. ' ' .$notification->order_number. '
                                </div>
                                <hr style="margin-bottom:-5px;">
                            </div>
                            <div style="margin-left:10px;">
                                <a class="delete-notification"  data-notification-id="' . $notification->id . '" onclick="deleteNotification(' . $notification->id . ')">
                                    <i class="icon-trash text-danger"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    ';
                }
            }
        } else {
            $output .= '
            <a class="dropdown-item" href="javascript:;">
                    <div class="notification-content">
                        <div class="notification-text">
                            <strong>Queenera Salon</strong>
                            <p>No Notification</p>
                        </div>
                    </div>
                </a>
            ';
        }

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

    public function destroy($id)
    {
        $notification = Notification::find($id);
        $notification->delete();
        return response()->json(['message' => 'Notification Deleted!'], 200);
    }
}

