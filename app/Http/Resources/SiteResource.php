<?php

namespace App\Http\Resources;
use App\Models\Helpers;
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
            'id'=> $this->id,
            'newID' => $this->newID,
            'oldID' => $this->oldID,
            'fullname' => $this->fullname,
            'status' => $this->status,
            'pmtMethod' => $this->pmtMethod,
            'netFee' => $this->netFee,
            'startDate'=> Helpers::dateFormat($this->startDate,'d-m-Y'),
            'endDate'=> Helpers::dateFormat($this->endDate,'d-m-Y'),
            'contractNumber'=> $this->contractNumber,
            'siteOwner'=> $this->siteOwner,
            'address'=> Helpers::stringCut($this->address,25),
            // 'constructionDate'=> Helpers::dateFormat($this->constructionDate,'d-m-Y'),
            'netFee'=>$this->netFee,
            // 'RFAIDate'=>Helpers::dateFormat($this->RFAIDate,'d-m-Y'),
            'tenant'=>$this->tenant,
            'additionalFee'=>$this->additionalFee,
            'additionalService'=>$this->additionalService,
            // 'updated_at'=>Helpers::dateFormat($this->updated_at,'d-m-Y'),
           


        ];
    }
}
