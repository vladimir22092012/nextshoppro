<?php

namespace App\Repositories\Interfaces;

use Illuminate\Http\Request;

interface CommonRepositoryInterface
{

    public function columns(): array;

    /**
     * @param Request $request
     * @return array
     */
    public function get(Request $request): array;

}
