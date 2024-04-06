<?php

namespace App\Repositories;

use App\Helpers\DateHelper;
use App\Http\Filters\UserFilter;
use App\Models\User;
use App\Repositories\Interfaces\CommonRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserRepository extends CommonRepository implements CommonRepositoryInterface {

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
                'field' => 'name',
                'title' => 'Имя',
                'sortable' => false,
                'field_search' => true,
            ],
            [
                'field' => 'email',
                'title' => 'Email',
                'sortable' => true,
                'sort' => 'desc',
                'field_search' => true,
            ],
            [
                'field' => 'phone',
                'title' => 'Телефон',
                'sortable' => true,
                'field_search' => true,
            ],
            [
                'field' => 'role',
                'title' => 'Роль',
                'sortable' => true,
                'field_search' => false,
            ],
            [
                'field' => 'created_at',
                'title' => 'Дата регистрации',
                'sortable' => false,
                'field_search' => false,
            ],
            [
                'field' => 'deleted_at',
                'title' => 'В архиве',
                'sortable' => false,
                'field_search' => false,
            ],
        ];
    }

    public function get(Request $request, $onlyClients = false): array
    {
        $temp = $request->all();
        $data = $temp['filters'] ?? [];
        $limit = $temp['limit'] ?? 18;
        $page = $temp['page'] ?? 1;
        $sort = $temp['sort'] ?? 'id';
        $order = $temp['order'] ?? 'desc';

        $filter = app()->make(UserFilter::class, ['queryParams' => array_filter($data)]);
        $query = User::filter($filter)->whereNotIn('role_id', [1]);
        if ($onlyClients) {
            $query->where('role_id', '=', 3);
        }
        $query->with(['role'])->orderBy($sort, $order);

        $query->withTrashed();

        $count = $query->count();

        if ($limit > 0) {
            $query = $query->limit($limit)->offset(($page - 1) * $limit);
        }

        $items = [];
        foreach ($query->get() as $item) {
            $items[] = [
                'id' => $item->id,
                'name' => $item->name,
                'email' => $item->email,
                'phone' => $item->phone,
                'role' => $item->role->name,
                'created_at' => Carbon::parse($item->created_at)->format(DateHelper::DEFAULT_FORMAT),
                'deleted_at' => $item->deleted_at ?
                    Carbon::parse($item->deleted_at)->format(DateHelper::DEFAULT_FORMAT) : '',
            ];
        }

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

    public function delete($user): void
    {
        $user->delete();
    }

    public function update($data, $user): void
    {
        $user->update($data);
    }
}
