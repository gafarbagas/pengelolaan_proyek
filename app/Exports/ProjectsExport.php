<?php

namespace App\Exports;

use App\Project;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithDrawings;

class ProjectsExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize, WithDrawings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Project::all();
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('backend/img/logo1.png'));
        $drawing->setHeight(90);

        return $drawing;
    }

    public function map($project): array
    {
        return [
            $project->project_code,
            $project->project_name,
            $project->client_name,
            $project->project_start,
            $project->project_finish,
            $project->price,
            $project->pj,
        ];
    }

    public function headings(): array
    {
        return [
            'Kode Proyek',
            'Nama Proyek',
            'Nama Klien',
            'Tanggal Mulai',
            'Tanggal Selesai',
            'Nilai Kontrak',
            'Penanggung Jawab',
        ];
    }

}
