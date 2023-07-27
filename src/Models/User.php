<?php

namespace Dangkhoa\Plugins\User\src\User;

use App\Models\User as BaseUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends BaseUser
{
    use HasApiTokens, HasFactory, Notifiable;
}
