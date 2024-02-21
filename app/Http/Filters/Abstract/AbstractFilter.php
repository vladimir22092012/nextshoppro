<?php

namespace App\Http\Filters\Abstract;

use App\Http\Filters\Interfaces\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter implements FilterInterface
{
    /** @var array */
    private $queryParams = [];

    /**
     * AbstractFilter constructor.
     */
    public function __construct(array $queryParams)
    {
        $this->queryParams = $queryParams;
    }

    public function apply(Builder $builder)
    {
        $this->before($builder);
        foreach ($this->getCallbacks() as $name => $callback) {
            if (array_key_exists($name, $this->queryParams)) {
                call_user_func($callback, $builder, $this->queryParams[$name]);
            }
        }
    }

    protected function before(Builder $builder)
    {
    }

    abstract protected function getCallbacks(): array;

    /**
     * @param  mixed|null  $default
     * @return mixed|null
     */
    protected function getQueryParam(string $key, $default = null)
    {
        return $this->queryParams[$key] ?? $default;
    }

    /**
     * @param  string[]  $keys
     * @return AbstractFilter
     */
    protected function removeQueryParam(string ...$keys)
    {
        foreach ($keys as $key) {
            unset($this->queryParams[$key]);
        }

        return $this;
    }
}
