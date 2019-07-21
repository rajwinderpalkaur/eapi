<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'descriptions'=>$this->detail,
            'price'=>$this->price,
            'stoke'=>$this->stock==0 ?'Out of stock' : $this->stock,
            'discount'=>$this->discount,
            'rating'=>$this->r->count()>0 ?round($this->r->sum('star')/$this->r->count(),2) : 'Not Rated Yet',
            'href'=>[
                'review'=>route('reviews.index',$this->id)
            ]
        ];
    }
}
