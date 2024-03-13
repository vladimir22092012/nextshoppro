<?php

namespace App\Http\Filters;

use App\Http\Filters\Abstract\AbstractFilter;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

class OrderFilter extends AbstractFilter
{
    public const FIRSTNAME = 'firstname';
    public const NAME = 'name';
    public const LASTNAME = 'lastname';


    protected function getCallbacks(): array
    {
        return [
            self::FIRSTNAME => [$this, self::FIRSTNAME],
            self::NAME => [$this, self::NAME],
            self::LASTNAME => [$this, self::LASTNAME],
        ];
    }

    public function firstname(Builder $builder, $value): void
    {
        $value = mb_strtolower($value);
        $builder->where('firstname', 'like', "%$value%");
    }

    public function name(Builder $builder, $value): void
    {
        $value = mb_strtolower($value);
        $builder->where('name', 'like', "%$value%");
    }

    public function lastname(Builder $builder, $value): void
    {
        $value = mb_strtolower($value);
        $builder->where('lastname', 'like', "%$value%");
    }


}
