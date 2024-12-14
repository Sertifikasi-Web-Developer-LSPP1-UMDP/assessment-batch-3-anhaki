<?php

namespace App\Http\Controllers;

use App\Charts\ChartMahasiswaBulanan;
use Illuminate\Http\Request;
use marineusde\LarapexCharts\Facades\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdmHomeController extends Controller
{
    public function getMonthlyMahasiswaData()
    {
        $currentYear = Carbon::now()->year;

        // Query untuk mahasiswa diterima
        $acceptedData = DB::table('mahasiswas')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
            ->whereYear('created_at', $currentYear)
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('users')
                    ->whereRaw('users.id = mahasiswas.user_id')
                    ->where('users.mhs_status', 'accepted');
            })
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('count', 'month')
            ->toArray();

        // Query untuk mahasiswa ditolak
        $rejectedData = DB::table('mahasiswas')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
            ->whereYear('created_at', $currentYear)
            ->whereExists(function ($query) {
                $query->select(DB::raw(1))
                    ->from('users')
                    ->whereRaw('users.id = mahasiswas.user_id')
                    ->where('users.mhs_status', 'rejected');
            })
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('count', 'month')
            ->toArray();

        // Format data bulan
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        $formattedAccepted = [];
        $formattedRejected = [];

        for ($i = 1; $i <= 12; $i++) {
            $formattedAccepted[] = $acceptedData[$i] ?? 0;
            $formattedRejected[] = $rejectedData[$i] ?? 0;
        }

        return [
            'months' => $months,
            'accepted' => $formattedAccepted,
            'rejected' => $formattedRejected,
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(ChartMahasiswaBulanan $chart)
    {
        return view('dashboard', ['chart' => $chart->build()]);
    }

}
