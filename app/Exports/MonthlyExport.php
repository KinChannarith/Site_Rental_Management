<?php

namespace App\Exports;

use App\Models\MonthlyPayment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
class MonthlyExport implements FromCollection,WithHeadings,WithStyles,WithEvents
{
    public function registerEvents(): array
    {
        return [
            // AfterSheet::class => function(AfterSheet $event) {
            //     $event->sheet->getDelegate()->mergeCells('B1:D1');
            //  },
             //merge column
            
              AfterSheet::class => function(AfterSheet $event) {
                  //Merge Row
                  $event->sheet->getDelegate()->mergeCells('J1:K1');
                  $event->sheet->getDelegate()->mergeCells('B1:D1');
                  $event->sheet->getDelegate()->mergeCells('X1:Z1');
                  //Merge Column
                 $event->sheet->getDelegate()->mergeCells('A1:A2');
                 $event->sheet->getDelegate()->mergeCells('E1:E2');
                 $event->sheet->getDelegate()->mergeCells('F1:F2');
                 $event->sheet->getDelegate()->mergeCells('G1:G2');
                 $event->sheet->getDelegate()->mergeCells('H1:H2');
                 $event->sheet->getDelegate()->mergeCells('I1:I2');

                 $event->sheet->getDelegate()->mergeCells('L1:L2');
                 $event->sheet->getDelegate()->mergeCells('M1:M2');
                 $event->sheet->getDelegate()->mergeCells('N1:N2');
                 $event->sheet->getDelegate()->mergeCells('O1:O2');
                 $event->sheet->getDelegate()->mergeCells('P1:P2');
                 $event->sheet->getDelegate()->mergeCells('Q1:Q2');
                 $event->sheet->getDelegate()->mergeCells('R1:R2');
                 $event->sheet->getDelegate()->mergeCells('S1:S2');
                 $event->sheet->getDelegate()->mergeCells('T1:T2');
                 $event->sheet->getDelegate()->mergeCells('U1:U2');
                 $event->sheet->getDelegate()->mergeCells('V1:V2');
                 $event->sheet->getDelegate()->mergeCells('W1:W2');
                 $event->sheet->getDelegate()->mergeCells('AA1:AA2');
                 $event->sheet->getDelegate()->mergeCells('AB1:AB2');
                 $event->sheet->getDelegate()->mergeCells('AC1:AC2');
                 $event->sheet->getDelegate()->mergeCells('AD1:AD2');
                
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
    public function headings():array{
        return [
            [
                '-','Period of Agreement','-','-','Owner','New Site ID','Old Site ID','Deposit','Net Fee','Payment Term','-','Jan21','Feb21','March21','April21',
                'May21','Jun21','Jul21','Aug21','Sep21','Oct21','Nov21','Dec21','Bank Information','-','-','Contact','Remark','Status','Comment',
            ],
            [
                '-', 'Start','End','No. Year','-','New Site ID','Old Site ID','Deposit','Net Fee','Pmy Method','Due Date','Jan21','Feb21','March21','April21',
                'May21','Jun21','Jul21','Aug21','Sep21','Oct21','Nov21','Dec21','Bank Name','Acc. Name','Acc- No-','Contact','Remark','Status','Comment',
            ]
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('B1')->getAlignment()->applyFromArray(
            array('horizontal' => 'center')
        );
        $sheet->getStyle('J1')->getAlignment()->applyFromArray(
            array('horizontal' => 'center')
        );
        $sheet->getStyle('X1')->getAlignment()->applyFromArray(
            array('horizontal' => 'center')
        );
        
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public static function afterSheet(AfterSheet $event)
    {
        try {
            $workSheet = $event
                ->sheet
                ->getDelegate()
                ->setMergeCells([
                    'B1:D1',  
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
    public function collection()
    {
        //return MonthlyPayment::all();
        return collect(MonthlyPayment::getMonthlyPayment());
    }
}
