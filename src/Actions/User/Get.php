<?php

namespace Dangkhoa\Plugins\User\src\Actions\User;


use Dangkhoa\Plugins\User\src\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class Get
{
    /**
     * Invoke class Get User
     *
     * @return Builder|Collection
     */
    public function __invoke(): Builder|Collection
    {
        return User::with('userInformation')->get();
    }
}
