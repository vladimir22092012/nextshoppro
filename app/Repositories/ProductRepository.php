<?php

namespace App\Repositories;

use App\Http\Filters\ProductFilter;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Interfaces\CommonRepositoryInterface;
use App\Services\GlobalSearch\FireWind;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $products = Product::query()->limit(7)->get();
        return ProductResource::collection($products)->resolve();
    }

    public function get(Request $request, $onlyArchive = false): array
    {
        $temp = $request->all();
        $data = $temp['filters'] ?? [];
        $limit = $temp['limit'] ?? 18;
        $page = $temp['page'] ?? 1;
        $sort = $temp['sort'] ?? 'id';
        $order = $temp['order'] ?? 'desc';

        if (isset($temp['category_id'])) {
            $data['category_id'] = $temp['category_id'];
        }

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $query = Product::filter($filter);
        if ($onlyArchive) {
            $query->whereNotNull('deleted_at');
        }
        $query->with(['category'])->orderBy($sort, $order);
        if (isset($temp['query'])) {
            $q = $temp['query'];
            $fireWind = new FireWind();
            $query_indexes = $fireWind->make_index($q);
            $result = [];
            $products = Product::all();
            foreach ($products as $product) {
                $range = $fireWind->search($query_indexes, json_decode($product->search_indexes));
                if ($range > 0) {
                    $result[$product->id] = $range;
                }
            }
            if (isset($result)) {
                arsort( $result , SORT_ASC);
                if (!empty($result)) {
                    $query->whereIn('id', array_chunk(array_keys($result), 15)[0]);
                }
            }

        }

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
