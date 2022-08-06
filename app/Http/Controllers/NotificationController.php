<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function mark_all_notifications(){
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->route('orders.index');
    }

    public function mark_a_notification($notification_id, $order_id){
        auth()->user()->unreadNotifications->when($notification_id, function($query) use ($notification_id){
            return $query->where('id', $notification_id);
        })->markAsRead();
        $order = Order::find($order_id);
        return redirect()->route('orders.show', $order);
    }
}
