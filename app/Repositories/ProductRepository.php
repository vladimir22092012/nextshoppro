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

    public function get(Request $request): array
    {
        $data = $request->all();
        $limit = $data['limit'] ?? 18;
        $page = $data['page'] ?? 1;
        $sort = $data['sort'] ?? 'id';
        $order = $data['order'] ?? 'desc';

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $query = Product::filter($filter)->with(['category'])->orderBy($sort, $order);

        if (isset($data['query'])) {
            $q = $data['query'];

            $db = DB::connection('sphinx')->table('idx_products_name')->whereRaw("MATCH('$q')")->get();
            dd($db);

            /*$categoryQuery = Category::query();
            $categoryQuery->select(DB::raw("id,(MATCH (categories.name) against ('$q' IN NATURAL LANGUAGE MODE)) as score_name"));
            $cats = $categoryQuery->get()->pluck('id');

            $searchQeury = Product::query();
            $arr = explode(' ', $q);
            $searchQeury->select(DB::raw("id,category_id,(MATCH (products.name) against ('$q' IN NATURAL LANGUAGE MODE)) as score_name"));
            $searchQeury->whereIn('category_id', $cats);
            $searchQeury->groupBy('score_name','id', 'category_id');
            $searchQeury->having('score_name', '>', count($arr));
            $searchQeury->orderBy('score_name', 'ASC');

            if ($request->deleted) {
                $searchQeury->withTrashed();
            }

            $count = $searchQeury->count();

            if ($limit > 0) {
                $searchQeury = $searchQeury->limit($limit)->offset(($page - 1) * $limit);
            }

            $products = [];
            foreach ($searchQeury->get() as $product) {
                $products[] = Product::find($product->id);
            }
            $items = ProductResource::collection($products)->resolve();*/

        } else {
            if ($request->deleted) {
                $query->withTrashed();
            }

            $count = $query->count();

            if ($limit > 0) {
                $query = $query->limit($limit)->offset(($page - 1) * $limit);
            }

            $items = ProductResource::collection($query->get())->resolve();
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

    public function delete($product): void
    {
        $product->delete();
    }

    public function update($data, $product): void
    {
        $product->update($data);
    }
}
