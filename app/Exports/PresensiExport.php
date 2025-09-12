<?php
// app/Exports/PresensiExport.php

namespace App\Exports;

use App\Models\Presensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PresensiExport implements FromCollection, WithHeadings, WithMapping, WithStyles
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

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $query = Presensi::with(['user', 'ekskul'])
            ->whereBetween('tanggal', [$this->tanggalMulai, $this->tanggalSelesai]);

        if ($this->ekskulId) {
            $query->where('ekskul_id', $this->ekskulId);
        }

        return $query->orderBy('tanggal', 'desc')->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Siswa',
            'Kelas',
            'Ekstrakurikuler',
            'Tanggal',
            'Jam',
            'Status',
            'Keterangan',
        ];
    }

    public function map($presensi): array
    {
        static $no = 0;
        $no++;

        return [
            $no,
            $presensi->user->name,
            $presensi->user->kelas,
            $presensi->ekskul->nama,
            $presensi->tanggal->format('d/m/Y'),
            date('H:i', strtotime($presensi->jam)),
            $this->getStatusText($presensi->status),
            $presensi->keterangan ?? '-',
        ];
    }

    private function getStatusText($status)
    {
        switch ($status) {
            case 'hadir':
                return 'Hadir';
            case 'izin':
                return 'Izin';
            case 'tidak_hadir':
                return 'Tidak Hadir';
            default:
                return 'Unknown';
        }
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1 => ['font' => ['bold' => true]],
        ];
    }
}