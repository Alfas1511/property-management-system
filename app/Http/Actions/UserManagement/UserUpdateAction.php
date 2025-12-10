<?php

namespace App\Http\Actions\UserManagement;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserUpdateAction
{
    public function execute(array $data, User $user)
    {
        try {
            DB::beginTransaction();
            $user->name = $data['name'] ?? "";
            $user->email = $data['email'] ?? "";
            $user->password = Hash::make($data['password']);
            $user->save();

            DB::commit();
            return true;
        } catch (\Throwable $th) {
            info($th);
            DB::rollBack();
            return false;
        }
    }
}
