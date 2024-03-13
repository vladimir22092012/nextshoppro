<?php

namespace App\Models;

use App\Helpers\Html;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    const STATUS_NEW = 'new';
    const STATUS_ACCEPT = 'accept';
    const STATUS_READY = 'ready';
    const STATUS_PAYED = 'payed';
    const STATUS_DONE = 'done';

    protected $guarded = [
        'htmlStatus'
    ];

    protected $appends = [
        'htmlStatus'
    ];

    public function getHtmlStatusAttribute()
    {
        $statuses = [
            self::STATUS_NEW => [
                'name' => 'Новый',
                'class' => 'alert-primary'
            ],
            self::STATUS_ACCEPT => [
                'name' => 'Принят',
                'class' => 'alert-success',
            ],
            self::STATUS_READY => [
                'name' => 'Готов к оплате',
                'class' => 'alert-warning',
            ],
            self::STATUS_PAYED => [
                'name' => 'Оплачен',
                'class' => 'alert-success',
            ],
            self::STATUS_DONE => [
                'name' => 'Выдан',
                'class' => 'alert-success',
            ],
        ];
        return $this->deleted_at ? Html::getAlert('В архиве', 'alert-danger') :
            Html::getAlert($statuses[$this->status]['name'], $statuses[$this->status]['class']);
    }

    public function products(): HasMany
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }
}
