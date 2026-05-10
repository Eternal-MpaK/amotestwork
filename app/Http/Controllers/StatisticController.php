<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stevebauman\Location\Facades\Location;
use Jenssegers\Agent\Agent;

class StatisticController extends Controller
{
    public function saveStatistic(Request $request) {
        $agent = new Agent();
        $device = $agent->platform();
        if ($agent->isMobile() || $agent->isTablet()) {
            $device = $agent->device();
        }

        $testIP = '95.78.200.77';

        $position = Location::get($testIP);

        if ($position && $position->cityName) {
            $city = $position->cityName;
        } else if ($position->countryName) {
            $city = $position->countryName;
        } else {
            $city = 'unknown';
        }

        $newStat = ['ip' => $request->ip(), 'city' => $city, 'device' => $device];
        Statistic::create($newStat);
        return response()->json(['success' => true]);
    }

    public function getStatistic(Request $request) {
        $range = $request->all();


        $stats = DB::table('visited_statistic')
            ->select('ip', 'city', 'created_at')
            ->whereDate('created_at', '>=', $range['from'])
            ->whereDate('created_at', '<=', $range['to'])
            ->get();

        $hourlyStats = $stats
            ->groupBy(function ($item) {
                return Carbon::parse($item->created_at)->format('d.m.Y H:00');
            })
            ->map(function ($group) {
                return $group->pluck('ip')->unique()->count();
            })
            ->sortKeys() // Сортируем по времени
            ->toArray();
        $cityStats = $stats
            ->filter(fn($item) => !empty($item->city)) // Убираем пустые значения
            ->groupBy('city')
            ->map(function ($group) {
                // Считаем уникальные IP в каждом городе
                return $group->pluck('ip')->unique()->count();
            })
            ->sortKeysDesc()
            ->toArray();

        return response()->json([
            'lineChart' => [
                'labels' => array_keys($hourlyStats),
                'datasets' => [[
                    'label' => 'Уникальные посещения',
                    'data' => array_values($hourlyStats),
                ]]
            ],
            'pieChart' => [
                'labels' => array_keys($cityStats),
                'datasets' => [[
                    'data' => array_values($cityStats),
                ]]
            ]
        ]);
    }
}
