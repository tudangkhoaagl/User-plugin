<?php

namespace Dangkhoa\Plugins\User\src\Actions\User;

use Illuminate\Database\Eloquent\Model;

class Find extends UserAction
{
    /**
     * Summary of findUserByEmail
     *
     * @param string $email
     * @return Model|null
     */
    public function findUserByEmail(string $email): Model|null
    {
        return $this->model->query()->where('email', $email)->first();
    }
}
