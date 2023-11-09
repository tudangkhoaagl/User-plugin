<?php

namespace Dangkhoa\Plugins\User\src\Http\Controllers\Web\Frontend\User;

use Dangkhoa\PluginManager\Http\Controllers\BaseController;
use Dangkhoa\Plugins\User\src\Actions\User\Get as GetUser;
use Illuminate\Contracts\Foundation\Application as ContractApplication;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class UserController extends BaseController
{
    /**
     * Index function of User Controller
     *
     * @param GetUser $getUser
     *
     * @return ContractApplication|Factory|View|Application
     */
    public function index(GetUser $getUser): ContractApplication|Factory|View|Application
    {
        return view('user_plugin::frontend.user.index', ['users' => $getUser()]);
    }
}
