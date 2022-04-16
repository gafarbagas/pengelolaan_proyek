<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
// use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
// use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Events\BeforeSheet;

class UsersExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    // public function drawings()
    // {
    //     $drawing = new Drawing();
    //     $drawing->setName('Logo');
    //     $drawing->setDescription('This is my logo');
    //     $drawing->setPath(public_path('backend/img/logo1.png'));
    //     $drawing->setHeight(90);

    //     return $drawing;
    // }

    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function(BeforeSheet $event) {
                $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
                $drawing->setName('Logo');
                $drawing->setDescription('Logo');
                $drawing->setPath(public_path('backend/img/logo1.png'));
                $drawing->setCoordinates('A1','A8');

                $drawing->setWorksheet($event->sheet->getDelegate());
            },
        ];
    }

    public function map($user): array
    {
        return [
            $user->name,
            $user->email,
            $user->role,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Email',
            'Hak Akses',
        ];
    }

}
