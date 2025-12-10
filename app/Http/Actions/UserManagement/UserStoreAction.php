<?php

namespace App\Http\Actions\UserManagement;

use App\ActivityLogTrait;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;

class UserStoreAction
{
    use ActivityLogTrait;

    public function execute(array $data)
    {
        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            $roles = [];

            foreach ($data['roles'] as $roleId) {
                $roles[] = [
                    'user_id' => $user->id,
                    'role_id' => $roleId,
                ];
            }
            UserRole::insert($roles);

            $this->createActivityLog('User Created', "User '" . $user->name . "' is created by ");

            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
