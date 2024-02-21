<?php

namespace App\Repositories;


class CommonRepository {

    public function limits(): array
    {
        return [
            10 => 10,
            20 => 20,
            30 => 30,
            40 => 40,
            50 => 50,
            100 => 100
        ];
    }

}
