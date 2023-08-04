<?php

namespace Dangkhoa\Plugins\User\src\Models;

use App\Models\User as BaseUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends BaseUser
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Summary of userInformation
     *
     * @return HasOne
     */
    public function userInformation(): HasOne
    {
        return $this->hasOne(UserInformation::class, 'user_id', 'id');
    }
}
