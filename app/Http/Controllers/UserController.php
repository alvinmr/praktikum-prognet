<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function markNotifications()
    {
        $userNotifications = Auth::user()->notifications->whereNull('read_at');
        foreach($userNotifications as $data){
            $data->update([
                'read_at' => now()
            ]);
        }
        return redirect()->back();
    }
}
