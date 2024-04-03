<?php

namespace App\Http\Filters;

use App\Http\Filters\Abstract\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class UserFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const EMAIL = 'email';
    public const PHONE = 'phone';
    public const ROLE = 'role';


    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::EMAIL => [$this, self::EMAIL],
            self::PHONE => [$this, self::PHONE],
            self::ROLE => [$this, self::ROLE],
        ];
    }

    public function name(Builder $builder, $value): void
    {
        $builder->where('lower(name)', 'like', "%".strtolower($value)."%");
    }

    public function email(Builder $builder, $value): void
    {
        $builder->where('lower(email)', 'like', "%".strtolower($value)."%");
    }

    public function phone(Builder $builder, $value): void
    {
        $builder->where('lower(phone)', 'like', "%".strtolower($value)."%");
    }

    public function role(Builder $builder, $value): void
    {
        $builder->where('role_id', '=', $value);
    }

}
