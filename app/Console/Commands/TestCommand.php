<?php

namespace App\Console\Commands;

use App\Console\Kernel;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
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
        $this->download_images();
    }

    public function download_images()
    {
        $pids = [];
        foreach (scandir('/var/www/html/nextshoppro/public/images/products/') as $item) {
            if ($item != '.' && $item != '..') {
                $pids[] = $item;
            }
        }
        $ids = '';
        Product::query()->whereNotIn('id', $pids)->withTrashed()->get()->each(function ($product) use (&$ids) {
            $ids .= ','.$product->id;
        });
        file_put_contents(__DIR__.'/products_ids.txt', $ids);
    }

    public function import_images()
    {
        DB::connection('next_mysql')->table('shop_product_images')->get()->map(function($image) {
            if (Product::find($image->product_id)) {
                $newImage = ProductImage::create([
                    'id' => $image->id,
                    'product_id' => $image->product_id,
                    'title' => $image->description,
                    'sort' => $image->sort,
                    'width' => $image->width,
                    'height' => $image->height,
                    'size' => $image->size,
                    'original_filename' => $image->original_filename,
                    'ext' => $image->ext,
                    'created_at' => $image->upload_datetime,
                    'updated_at' => $image->upload_datetime,
                ]);
                $newImage->id = $image->id;
                $newImage->save();
            }
        });
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
