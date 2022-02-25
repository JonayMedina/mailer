<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class AllUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'role' => $this->role,
            'email' => $this->email,
            'phone' => $this->phone,
            'phone_complete' => "(" . $this->city_code . ") " . $this->phone,
            'city_code' => $this->city_code,
            'birthday' => date('d-m-Y', strtotime($this->birthday)),
            'age' => Carbon::parse($this->birthday)->age,
        ];
    }
}
