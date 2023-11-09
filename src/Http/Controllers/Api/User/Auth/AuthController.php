<?php

namespace Dangkhoa\Plugins\User\src\Http\Controllers\Api\User\Auth;
use Dangkhoa\PluginManager\Http\Controllers\BaseController;
use Dangkhoa\Plugins\User\src\Requests\UserLoginRequest;
use Dangkhoa\Plugins\User\src\Resources\Api\Auth\UserLoginResource;
use Dangkhoa\Plugins\User\src\Service\AuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class AuthController extends BaseController
{
    /**
     * Summary of __construct
     *
     * @param AuthService $authService
     */
    public function __construct(
        protected AuthService $authService
    ) {
        //
    }

    /**
     * Summary of login
     *
     * @param UserLoginRequest $request
     * @return JsonResponse
     */
    public function login(UserLoginRequest $request): JsonResponse
    {
        if ($user = $this->authService->loginUserApi($request->all())) {
            return response()->json([
                SUCCESS_MESSAGE => 'test',
                DATA_RESPONSE => new UserLoginResource($user),
            ], Response::HTTP_OK);
        }

        return response()->json([
            SUCCESS_MESSAGE => 'test',
            DATA_RESPONSE => null,
        ], Response::HTTP_FORBIDDEN);
    }
}
