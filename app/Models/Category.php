<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = 'categories';

    public static function getMap(): array
    {
        $cats = [];
        $mains = Category::query()->where('parent_id', '=', 0)->get();
        foreach ($mains as $main) {
            $domCats = [];
            $domCatsEl = Category::query()->where('parent_id', '=', $main->id)->get();
            foreach ($domCatsEl as $item) {
                $domCatsChild = [];
                $domCatsChildEl = Category::query()->where('parent_id', '=', $item->id)->get();
                foreach ($domCatsChildEl as $value) {
                    $domCatsChild[] = [
                        'id' => $value->id,
                        'name' => $value->name,
                    ];
                }

                $domCats[] = [
                    'id' => $item->id,
                    'name' => $item->name,
                    'dom' => $domCatsChild
                ];
            }

            $cats[] = [
                'id' => $main->id,
                'name' => $main->name,
                'dom' => $domCats
            ];
        }
        return $cats;
    }

    public static function childs($cat_id): array
    {
        $ids = [$cat_id];
        $cats = Category::query()->where('parent_id', '=', $cat_id)->get();
        foreach ($cats as $cat) {
            $second = Category::query()->where('parent_id', '=', $cat->id)->get();
            foreach ($second as $value) {
                $ids[] = $value->id;
            }
            $ids[] = $cat->id;
        }
        return $ids;
    }

}
