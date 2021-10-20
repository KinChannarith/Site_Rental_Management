<?php

namespace App\Exports;

use App\Models\Site;
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
class SitesExport implements FromQuery,WithHeadings,WithStyles,WithEvents
{
    use Exportable;
    protected $sites;
    public function __construct($sites)
    {
        $this->sites = $sites;
    }
    public function registerEvents(): array
    {
        return [
            // AfterSheet::class => function(AfterSheet $event) {
            //     $event->sheet->getDelegate()->mergeCells('B1:D1');
            //  },
             //merge column
            
              AfterSheet::class => function(AfterSheet $event) {
                  //Merge Row
                  $event->sheet->getDelegate()->mergeCells('A1:B1');
                  $event->sheet->getDelegate()->mergeCells('C1:D1');
                 
                
              },
            //  AfterSheet::class => function(AfterSheet $event) {
            //     $event->sheet->getDelegate()->mergeCells('F1:F2');
            //  },
            //  AfterSheet::class => function(AfterSheet $event) {
            //     $event->sheet->getDelegate()->mergeCells('G1:G2');
            //  },
            //  AfterSheet::class => function(AfterSheet $event) {
            //     $event->sheet->getDelegate()->mergeCells('H1:H2');
            //  },
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1')->getAlignment()->applyFromArray(
            array('horizontal' => 'center')
        );
        $sheet->getStyle('C1')->getAlignment()->applyFromArray(
            array('horizontal' => 'center')
        );
        
        
        
    }
    public static function afterSheet(AfterSheet $event)
    {
        try {
            $workSheet = $event
                ->sheet
                ->getDelegate()
                ->setMergeCells([
                   
                ])
                ->freezePane('A3');

            $headers = $workSheet->getStyle('A1:D1');

            $headers
                ->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                ->setVertical(Alignment::VERTICAL_CENTER);

            $headers->getFont()->setBold(true);
        } catch (Exception $exception) {
            throw $exception;
        }
    }
    public function headings():array{
        return [
            [
                'Site ID','-','Contract Period','-',
            ],
            [
                'New ID','Old ID','Start Date','End Date','Contract No.','Payment Term','Site Owner','Vendor Name','Vattin','Location','Construction Date',
                'Site Status','Status Change Date','Rental Fee','Adjust FRAI Date','Tenant','Additional Charge Fee','Additional Service',
            ]
           
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        
        // return Site::query()->whereKey($this->sites);
        $result= Site::SELECT('newID','oldID','startDate','endDate','contractNumber','pmtMethod','siteOwner','fullname',DB::raw("(select '')as vattin"),'address','constructionDate','status',DB::raw("(select '')as changedDate"),'netFee','RFAIDate','tenant','additionalFee','additionalService')->whereKey($this->sites);
        
        return $result;
    }
   
    
}
