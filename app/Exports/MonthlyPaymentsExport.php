<?php

namespace App\Exports;

use App\Models\MonthlyPayment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
 use Maatwebsite\Excel\Concerns\WithHeadings;
 use Maatwebsite\Excel\Events\AfterSheet;
 use Maatwebsite\Excel\Concerns\WithEvents;
// use PhpOffice\PhpSpreadsheet\Style\Alignment;
 use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\Exportable;
use DB;
class MonthlyPaymentsExport implements FromQuery,WithHeadings
{
    use Exportable;
    protected $monthlyPayments;
    public function __construct($monthlyPayments)
    {
        $this->monthlyPayments = $monthlyPayments;
       
    }
    
    public function headings():array{
        return [
            [
                'New ID','Site Owner','Status','Net Fee','Pay Date','Pay Month','Description'
            ]
           
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {        
        $result= MonthlyPayment::SELECT('newID','siteOwner','status','netFee','payDate','payMonth','description')->whereKey($this->monthlyPayments);        
        
        return $result;
    }
   
    
}
