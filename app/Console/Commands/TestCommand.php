<?php

namespace App\Console\Commands;

use App\Console\Kernel;
use App\Models\Category;
use App\Models\Product;
use App\Services\GlobalSearch\FireWind;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $fireWind = new FireWind();
        $q = "дисплей iphone 7 белый";
        $query = $fireWind->make_index($q);

        $result = [];
        $products = Product::all();
        foreach ($products as $product) {
            $range = $fireWind->search($query, json_decode($product->search_indexes));
            if ($range > 0) {
                $result[$product->id] = $product;
            }
        }
        dd($result);
    }

    public function import_categories()
    {
        DB::connection('next_mysql')->table('shop_category')->select([
            'shop_category.id',
            'shop_category.parent_id',
            'shop_category.name',
            'shop_category.meta_title',
            'shop_category.meta_keywords',
            'shop_category.meta_description',
            'shop_category.description',
        ])->get()->map(function ($cat) {
            Category::create([
                'id' => $cat->id,
                'parent_id' => $cat->parent_id,
                'name' => $cat->name,
                'meta' => json_encode([
                    'title' => $cat->meta_title,
                    'keywords' => $cat->meta_keywords,
                    'description' => $cat->meta_description,
                ]),
                'description' => $cat->description,
            ]);
        });
    }

    public function import_products()
    {
        DB::connection('next_mysql')->table('shop_product')->select([
            'shop_product.id',
            'shop_product.category_id',
            'shop_product.name',
            'shop_product.summary',
            'shop_product.description',
            'shop_product.status',
            'shop_product.price',
            'shop_product.count',
            'shop_product_skus.sku'
        ])->join(
            'shop_product_skus',
            'shop_product.id',
            '=',
            'shop_product_skus.product_id'
        )->get()->map(function ($product) {
            if (!empty($product->category_id)) {
                Product::create([
                    'id' => $product->id,
                    'category_id' => $product->category_id,
                    'article' => $product->sku,
                    'name' => $product->name,
                    'short_description' => $product->summary,
                    'description' => $product->description,
                    'deleted_at' => $product->status == 0 ? date('Y-m-d H:i:s') : null,
                    'price' => number_format($product->price, 2, '.', ''),
                    'count' => intval($product->count),
                ]);
            }
        });
    }

    public function import_feature()
    {
        DB::connection('next_mysql')->table('shop_feature')->get()->map(function ($product) {
            if (!empty($product->category_id)) {
                Product::create([
                    'id' => $product->id,
                    'category_id' => $product->category_id,
                    'article' => $product->sku,
                    'name' => $product->name,
                    'short_description' => $product->summary,
                    'description' => $product->description,
                    'deleted_at' => $product->status == 0 ? date('Y-m-d H:i:s') : null,
                    'price' => number_format($product->price, 2, '.', ''),
                    'count' => intval($product->count),
                ]);
            }
        });
    }

}
