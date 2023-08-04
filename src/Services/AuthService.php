<?php

namespace Dangkhoa\Plugins\User\src\Service;

use Dangkhoa\Plugins\User\src\Actions\User\Find as UserFinder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * Summary of __construct
     * @param UserFinder $userFinder
     */
    public function __construct(
        protected UserFinder $userFinder
    ) {
        //
    }

    /**
     * Summary of loginUserApi
     * @param array $data
     * @return Model|bool
     */
    public function loginUserApi(array $data): Model|bool
    {
        $user = $this->userFinder->findUserByEmail($data['email']);

        if (
            ! $user
            || (
                $user
                && ! Hash::check($data['password'], $user->password)
            )
        ) {
            return false;
        }

        return $user;
    }
}
