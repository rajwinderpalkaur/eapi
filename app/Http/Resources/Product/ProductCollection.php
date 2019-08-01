<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        // $decodeArr = json_decode(parent::toArray($request), true);
        // print_r(json_encode($decodeArr));
        //return array_values($this->collection)
        return [
            'name'=>$this->name,
            'price'=>$this->price,
            'rating'=>$this->r->count()>0 ?round($this->r->sum('star')/$this->r->count(),2) : 'Not Rated Yet',
            'discount'=>$this->discount,
            'link'=>[
                'review'=>stripslashes (route('products.show',$this->id))
            ]
        ];
    }
}
