<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Inertia\Inertia;
use Inertia\Response;

class MainController extends Controller
{
    public function index(): \Inertia\Response
    {
        return Inertia::render('Admin/Main/Index');
    }

    public function users(): Response
    {
        return Inertia::render('Admin/Main/Users', [
            'columns' => (new UserRepository())->columns(),
            'limits' => (new UserRepository())->limits(),
        ]);
    }

    public function viewUser(User $user): Response
    {
        $user->role = $user->role;
        $roles = Role::all()->map(function (Role $role) {
            return [
                'id' => $role->id,
                'name' => $role->role
            ];
        });
        return Inertia::render('Admin/Main/ViewUser', [
            'roles' => $roles,
            'user' => $user,
        ]);
    }

    public function usersList(Request $request): JsonResponse
    {
        return \response()->json(['data' => (new UserRepository())->get($request)]);
    }

    public function saveUser(User $user, Request $request): JsonResponse
    {
        try {
            (new UserRepository())->update($request->toArray(), $user);
            $user = $user->refresh();
            //$user->role = $user->role;
            return response()->json([
                'status' => 'ok',
                'user' => $user,
            ]);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'error', 'text' => $exception->getMessage()]);
        }
    }
}
