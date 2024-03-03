<?php

namespace App\Http\Resources;

use App\Helpers\DateHelper;
use App\Helpers\Html;
use Carbon\Carbon;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'category' => $this->category,
            'category_id' => ['name' => $this->category->name, 'id' => $this->category->id],
            'category_name' => $this->category->name,
            'article' => $this->article,
            'name' => $this->name,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'price' => $this->formattedPrice,
            'count' => $this->count,
            'created_at' => Carbon::parse($this->created_at)->format(DateHelper::DEFAULT_FORMAT),
            'status' => $this->deleted_at ? Html::getAlert('В архиве', 'alert-danger') :
                Html::getAlert('Активный'),
            'deleted_at' => $this->deleted_at ?
                Carbon::parse($this->deleted_at)->format(DateHelper::DEFAULT_FORMAT) : '',
            'images' => $this->normalizeImages,
            'main_image' => $this->mainImage
        ];
    }
}
