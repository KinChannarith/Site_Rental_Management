<?php

namespace App\Http\Resources;
use App\Models\Helpers;
use Illuminate\Http\Resources\Json\JsonResource;

class MonthlyPaymentResource extends JsonResource
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
            'id'=> $this->id,
            'newID'=> $this->newID,
            'payMonth'=> Helpers::dateFormat($this->paymonth,'Y-m-d'),
            'payDate'=> Helpers::dateFormat($this->paydate,'Y-m-d'),
            'siteID'=> $this->siteID,
            'netFee'=> $this->netFee,
            'description'=> $this->description,
            'siteOwner'=> $this->siteOwner,
            'status'=> $this->status,
            'vouchers'=> $this->vouchers,

        ];
    }
}
