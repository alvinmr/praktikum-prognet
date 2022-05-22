<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function markNotifications()
    {
        $adminNotifications = Auth::guard('admin')->user()->notifications->whereNull('read_at');
        foreach($adminNotifications as $data){
            $data->update([
                'read_at' => now()
            ]);
        }
        return redirect()->back();
    }
}
