<?php

namespace App\Repositories;

use App\Http\Filters\ProductFilter;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Repositories\Interfaces\CommonRepositoryInterface;
use Illuminate\Http\Request;

class ProductRepository extends CommonRepository implements CommonRepositoryInterface {

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
                'field' => 'article',
                'title' => 'Артикул',
                'sortable' => false,
                'field_search' => true,
            ],
            [
                'field' => 'name',
                'title' => 'Наименование',
                'sortable' => true,
                'sort' => 'desc',
                'field_search' => true,
            ],
            [
                'field' => 'price',
                'title' => 'Цена',
                'sortable' => true,
                'field_search' => true,
            ],
            [
                'field' => 'count',
                'title' => 'Кол-во на складе',
                'sortable' => true,
                'field_search' => false,
            ],
            [
                'field' => 'category_name',
                'title' => 'Категория',
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

    public function main_page_products()
    {
        $products = Product::query()->limit(7)->inRandomOrder()->get();
        return ProductResource::collection($products)->resolve();
    }

    public function get(Request $request): array
    {
        $data = $request->all();
        $limit = $data['limit'] ?? 20;
        $page = $data['page'] ?? 1;
        $sort = $data['sort'] ?? 'id';
        $order = $data['order'] ?? 'desc';

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $query = Product::filter($filter)->with(['category'])->orderBy($sort, $order);
        if ($request->deleted) {
            $query->withTrashed();
        }

        $count = $query->count();

        if ($limit > 0) {
            $query = $query->limit($limit)->offset(($page - 1) * $limit);
        }

        $items = ProductResource::collection($query->get())->resolve();

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

    public function delete($product): void
    {
        $product->delete();
    }

    public function update($data, $product): void
    {
        $product->update($data);
    }
}
