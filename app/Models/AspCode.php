<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AspCode extends Model
{
    use HasFactory, SoftDeletes, Timestamp;

    protected $guarded = [];

    const TYPE_EMAIL_VERIFICATION = 'email_verification';


    /** Генерация кода **/
    public static function generate(int $length = 4): string
    {
        $arr = [
            1, 2, 3, 4, 5, 6, 7, 8, 9, 0,
        ];

        $res = '';
        for ($i = 0; $i < $length; $i++) {
            $res .= $arr[random_int(0, count($arr) - 1)];
        }

        return $res;
    }
}
