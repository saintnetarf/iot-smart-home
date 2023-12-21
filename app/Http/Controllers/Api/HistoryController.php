<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index()
    {
        //get periode
        $periode = request()->query('periode') ? request()->query('periode') : 1;

        //query data
        $lampsData = DB::table('lamps as a')
            ->join('histories as b', 'a.id', '=', 'b.lamp_id')
            ->select(DB::raw('COUNT(b.lamp_id) as total'), 'a.name', 'b.status',
              DB::raw('DATE(b.created_at) as tanggal'))
            ->whereBetween('b.created_at', [now()->subDays($periode), now()])
            ->groupBy('tanggal', 'a.name', 'b.lamp_id', 'b.status')
            ->orderBy('tanggal', 'asc')
            ->get();

        //init variable array
        $chartData = [
            'labels' => [],
            'total' => []
        ];

        //loop data
        foreach ($lampsData as $data) {
            $chartData['labels'][] = $data->name . ' ' . $data->status . ' (' . $data->tanggal . ')';
            $chartData['total'][] = $data->total;
        }

        //return response
        return response()->json([
            'success' => true,
            'message' => 'List History Lamps',
            'data' => $chartData
        ]);
    }
}
