<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $fillable = ['username', 'password', 'name', 'profile_image', 'phone'];

    public function notifications(){
        return $this->morphMany(AdminNotification::class, 'notifiable' )->orderBy('created_at', 'desc');
    }

}
