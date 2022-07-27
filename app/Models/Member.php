<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Member extends Model
{
    protected $fillable=[
        'name',
        'email',
        'password',
        'membertype'
    ];
    use HasApiTokens, HasFactory, Notifiable;
}
