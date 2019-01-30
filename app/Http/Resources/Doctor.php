<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Doctor extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'note' => $this->note,
        ];
    }

    public function with($request){
        //retirn version and author url
        return[
            'version' => '1.0.0',
            'author_url' => 'patientdrivecrm.com'
        ];
    }
}
