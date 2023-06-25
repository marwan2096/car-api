<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'Car-id' => (string)$this->id,
            'attributes' => [
                'model' => $this->model,
                'color' => $this->color,
                'quantity' => $this->quantity,
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,

            ],

        ];
    }
}
