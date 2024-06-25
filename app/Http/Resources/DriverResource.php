<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DriverResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'image'=>$this->image,
            'name'=>$this->name,
            'city'=>$this->city,
            'phoneNo'=>$this->phoneNo,
            'gender'=>$this->gender,
            'year_of_birth'=>$this->year_of_birth,
            'contact_link'=>$this->contact_link,
            'car_type'=>$this->car_type,
            'language'=>$this->language,
            'description'=>$this->description,
        ];
    }
}
