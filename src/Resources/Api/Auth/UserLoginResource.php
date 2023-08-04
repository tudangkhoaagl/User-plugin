<?php

namespace Dangkhoa\Plugins\User\src\Resources\Api\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserLoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'user_information' => new UserInformationResource($this->whenLoaded('userInformation')),
            'token' => $this->createToken($request->device_name)->plainTextToken,
            'created_at' => $this->created_at,
            'updated_at_at' => $this->updated_at,
        ];
    }
}
