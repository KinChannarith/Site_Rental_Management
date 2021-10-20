<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MonthlyPaymentReportResource extends JsonResource
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
            'newID'=> $this->newID,
            'Year'=> $this->Year,
            'Jan'=> $this->Jan,
            'Feb'=> $this->Feb,
            'Mar'=> $this->Mar,
            'Apr'=> $this->Apr,
            'May'=> $this->May,
            'Jun'=> $this->Jun,
            'Jul'=> $this->Jul,
            'Aug'=> $this->Aug,
            'Sep'=> $this->Sep,
            'Oct'=> $this->Oct,
            'Nov'=> $this->Nov,
            'Des'=> $this->Des

        ];
    }
}
