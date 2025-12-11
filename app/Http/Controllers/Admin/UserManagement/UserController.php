<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Actions\UserManagement\UserStoreAction;
use App\Http\Actions\UserManagement\UserUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserManagement\UserStoreRequest;
use App\Http\Requests\Admin\UserManagement\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereNot('id', 1)->get();
        return view('admin.user_management.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::whereNot('id', 1)->where('status', 'Active')->get();
        return view('admin.user_management.users.create', compact('roles'));
    }

    public function store(UserStoreRequest $request, UserStoreAction $action)
    {
        try {
            $response = $action->execute($request->validated());

            if (!$response) {
                return back()->with("error", "Something went wrong")->withInput();
            }
            return redirect()->route('user.index')->with("success", "User Created successfully");
        } catch (\Throwable $th) {
            return back()->with("error", "Something went wrong")->withInput();
        }
    }

    public function show(User $user)
    {
        $user->load(['userRole']);
        return view('admin.user_management.users.view', compact('user'));
    }

    public function edit(User $user)
    {
        $user->load(['userRole']);
        $roles = Role::whereNot('id', 1)->where('status', 'Active')->get();
        return view('admin.user_management.users.edit', compact('user', 'roles'));
    }

    public function update(UserUpdateRequest $request, UserUpdateAction $action, User $user)
    {
        try {
            $response = $action->execute($request->validated(), $user);

            if (!$response) {
                return redirect()->route('user.edit', $user->id)->with("error", "Something went wrong");
            }
            return redirect()->route('user.index')->with("success", "User Updated successfully");
        } catch (\Throwable $th) {
            return redirect()->route('user.edit', $user->id)->with("error", "Something went wrong");
        }
    }
}
