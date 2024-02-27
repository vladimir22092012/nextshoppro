<?php

namespace App\Http\Filters;

use App\Http\Filters\Abstract\AbstractFilter;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const NAME = 'name';

    public const PRICE = 'price';
    public const CATEGORY_ID = 'category_id';

    public function name(Builder $builder, $value): void
    {
        $value = mb_strtolower($value);
        $builder->where('name', 'like', "%$value%");
    }

    public function price(Builder $builder, $value): void
    {
        $builder->where('price', '=', $value . '.00');
    }

    public function category_id(Builder $builder, $value): void
    {
        $builder->whereIn('category_id', Category::childs(intval($value)));
    }

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::PRICE => [$this, 'price'],
            self::CATEGORY_ID => [$this, 'category_id'],
        ];
    }
}
