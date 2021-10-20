<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SiteRentalPaymentResource extends JsonResource
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
            'paymentTerm'=> $this->paymentTerm,
            'allOnAir'=> $this->allOnAir,
            'allShutdown'=> $this->allShutdown,
            'allUnderInstallation'=> $this->allUnderInstallation,
            'allStatus'=> $this->allStatus,
            'netFee'=> $this->netFee,
            'additionalFee'=> $this->additionalFee,
            'allSites'=> $this->allSites,
            'totalAmount'=> $this->totalAmount,
            'pmtMethod'=> $this->paymentTerm,

        ];
    }
}
