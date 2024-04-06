<?php

namespace App\Repositories;

use App\Helpers\CartHelper;
use App\Http\Filters\OrderFilter;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Role;
use App\Models\User;
use App\Repositories\Interfaces\CommonRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OrderRepository extends CommonRepository implements CommonRepositoryInterface {

    public function columns(): array
    {
        return [
            [
                'type' => 'link'
            ],
            [
                'field' => 'id',
                'title' => 'ID',
                'sortable' => true,
                'sort' => 'asc',
                'field_search' => true,
            ],
            [
                'field' => 'firstname',
                'title' => 'Фамилия',
                'sortable' => false,
                'field_search' => true,
            ],
            [
                'field' => 'name',
                'title' => 'Имя',
                'sortable' => true,
                'sort' => 'desc',
                'field_search' => true,
            ],
            [
                'field' => 'lastname',
                'title' => 'Отчество',
                'sortable' => true,
                'field_search' => true,
            ],
            [
                'field' => 'deleted_at',
                'title' => 'В архиве',
                'sortable' => false,
                'field_search' => false,
            ],
        ];
    }

    public function get(Request $request): array
    {
        $temp = $request->all();
        $data = $temp['filters'] ?? [];
        $limit = $temp['limit'] ?? 18;
        $page = $temp['page'] ?? 1;
        $sort = $temp['sort'] ?? 'id';
        $order = $temp['order'] ?? 'desc';

        $filter = app()->make(OrderFilter::class, ['queryParams' => array_filter($data)]);
        $query = Order::filter($filter)->orderBy($sort, $order);

        if ($request->deleted) {
            $query->withTrashed();
        }

        $count = $query->count();

        if ($limit > 0) {
            $query = $query->limit($limit)->offset(($page - 1) * $limit);
        }

        $items = OrderResource::collection($query->get())->resolve();

        return [
            'data' => $items,
            'count' => $count,
            'total' => $limit > 0 ? ceil($count / $limit) : 1,
            'page' => $page,
            'sort' => $sort,
            'order' => $order,
            'limit' => $limit,
        ];
    }

    public function delete($order): void
    {
        $order->delete();
    }

    public function update($data, $order): void
    {
        $order->update($data);
    }

    public function removeProduct($data, $order): void
    {
        $order->products()->where('id', '=', $data['id'])->delete();
    }

    public function create($data, $request)
    {
        DB::beginTransaction();
        try {
            $user = $this->createUser($data);
            if (!$user) {
                throw new \Exception('Ошибка регистрации заказа.');
            }

            $data['user_id'] = $user->id;
            $data['status'] = 'new';
            $order = Order::create($data);

            if (!$order) {
                throw new \Exception('Ошибка регистрации заказа.');
            }

            $items = CartHelper::getItems($request);
            if (empty($items)) {
                throw new \Exception('Ошибка регистрации заказа.');
            }

            foreach ($items['items'] as $item) {
                OrderProduct::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'price' => $item['product_price'],
                    'count' => $item['count']
                ]);
            }

            Cart::query()->where('session_id', '=', $request->session()->getId())->delete();
            DB::commit();
            return $order;
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new \Exception($exception->getMessage());
        }
    }

    public function createUser($data)
    {
        $password = '1d|jeP]9';//Str::password(8);
        $create_data = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'company' => $data['company'],
            'password' => Hash::make($password),
            'role_id' => Role::query()->where('role', '=', Role::ROLE_USER)->first()->id,
        ];

        if ($user = User::query()->where('email', '=', $data['email'])->first()) {
            return $user;
        } else {
            $user = User::create($create_data);
            return $user;
        }
    }
}
