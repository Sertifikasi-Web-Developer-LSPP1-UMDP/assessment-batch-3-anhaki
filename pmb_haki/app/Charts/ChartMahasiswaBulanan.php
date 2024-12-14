<?php

namespace App\Charts;

use App\Http\Controllers\AdmHomeController;
use marineusde\LarapexCharts\Charts\AreaChart AS OriginalAreaChart;
use marineusde\LarapexCharts\Options\XAxisOption;

class ChartMahasiswaBulanan
{
    public function build(): OriginalAreaChart
    {
        // Ambil data bulanan
        $data = (new AdmHomeController)->getMonthlyMahasiswaData();

        return (new OriginalAreaChart)
            ->setTitle('Mahasiswa Mendaftar per Bulan.')
            ->setSubtitle('Mahasiswa diterima vs ditolak.')
            ->addData('Diterima', $data['accepted'])
            ->addData('Ditolak', $data['rejected'])
            ->setColors(['#057a55', '#9b1c1c'])
            ->setXAxisOption(new XAxisOption($data['months']));
            
    }
}
