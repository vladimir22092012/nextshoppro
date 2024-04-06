<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Discount;
use App\Models\Product;
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

    public function usersClients(): Response
    {
        return Inertia::render('Admin/Main/Clients', [
            'columns' => (new UserRepository())->columns(),
            'limits' => (new UserRepository())->limits(),
        ]);
    }

    public function clientList(Request $request): JsonResponse
    {
        return \response()->json(['data' => (new UserRepository())->get($request, true)]);
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
            'discountAmount' => $user->discount?->amount ?? 0,
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

    public function saveDiscount(Request $request): JsonResponse
    {
        try {
            $data = $request->toArray();
            if ($data['type'] == 'user') {
                $model = User::class;
            }
            if ($data['type'] == 'product') {
                $model = Product::class;
            }
            if ($data['type'] == 'category') {
                $model = Category::class;
            }
            $discount = Discount::query()->where('discountable_type', '=', $model)
                ->where('discountable_id', '=', $data['modelId'])->first();
            if (!$discount) {
                Discount::create([
                    'discountable_type' => $model,
                    'discountable_id' => $data['modelId'],
                    'amount' => $data['discount'],
                ]);
            } else {
                $discount->update([
                    'amount' => $data['discount']
                ]);
            }
            return response()->json([
                'status' => 'ok',
            ]);
        } catch (\Exception $exception) {
            return response()->json(['status' => 'error', 'text' => $exception->getMessage()]);
        }
    }
}
