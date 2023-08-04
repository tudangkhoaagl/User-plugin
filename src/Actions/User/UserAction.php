<?php

namespace Dangkhoa\Plugins\User\src\Actions\User;

use Dangkhoa\PluginManager\Actions\BaseAction;
use Dangkhoa\Plugins\User\src\Models\User;

class UserAction extends BaseAction
{
    /**
     * Summary of getModel
     *
     * @return string
     */
    protected function getModel(): string
    {
        return User::class;
    }
}
