<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SiteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    // public function toArray($request)
    // {
    //     return parent::toArray($request);
    // }
    public function toArray($request)
    {
        return [
            'newID' => $this->newID,
            'oldID' => $this->oldID,
            'fullname' => $this->fullname,
            'status' => $this->status,
            'pmtMethod' => $this->pmtMethod,
            'netFee' => $this->netFee,
        ];
    }
}
