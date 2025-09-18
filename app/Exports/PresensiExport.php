<?php
// app/Exports/PresensiExport.php

namespace App\Exports;

use App\Models\Presensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class PresensiExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths
{
    protected $tanggalMulai;
    protected $tanggalSelesai;
    protected $ekskulId;

    public function __construct($tanggalMulai, $tanggalSelesai, $ekskulId = null)
    {
        $this->tanggalMulai = $tanggalMulai;
        $this->tanggalSelesai = $tanggalSelesai;
        $this->ekskulId = $ekskulId;
    }

    public function collection()
    {
        $query = Presensi::with(['user', 'ekskul'])
            ->whereBetween('tanggal', [$this->tanggalMulai, $this->tanggalSelesai]);

        if ($this->ekskulId) {
            $query->where('ekskul_id', $this->ekskulId);
        }

        return $query->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Murid',
            'Kelas',
            'Ekstrakurikuler',
            'Tanggal',
            'Jam',
            'Status',
            'Keterangan',
            'Foto Tersedia'
        ];
    }

    public function map($presensi): array
    {
        static $no = 1;

        return [
            $no++,
            $presensi->user->name,
            $presensi->user->kelas,
            $presensi->ekskul->nama,
            $presensi->tanggal->format('d/m/Y'),
            date('H:i', strtotime($presensi->jam)),
            ucfirst($presensi->status),
            $presensi->keterangan ?? '-',
            $presensi->foto_presensi ? 'Ya' : 'Tidak'
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style for header row
            1 => [
                'font' => [
                    'bold' => true,
                    'size' => 12,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => [
                        'rgb' => 'E2E8F0'
                    ]
                ]
            ],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,   // No
            'B' => 20,  // Nama Murid
            'C' => 10,  // Kelas
            'D' => 25,  // Ekstrakurikuler
            'E' => 12,  // Tanggal
            'F' => 8,   // Jam
            'G' => 12,  // Status
            'H' => 30,  // Keterangan
            'I' => 12,  // Foto Tersedia
        ];
    }
}