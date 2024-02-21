<?php

namespace App\Http\Filters;

use App\Http\Filters\Abstract\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const NAME = 'name';

    public const PRICE = 'price';

    public function name(Builder $builder, $value): void
    {
        $value = mb_strtolower($value);
        $builder->where('name', 'like', "%$value%");
    }

    public function price(Builder $builder, $value): void
    {
        $builder->where('price', '=', $value . '.00');
    }

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::PRICE => [$this, 'price'],
        ];
    }
}
