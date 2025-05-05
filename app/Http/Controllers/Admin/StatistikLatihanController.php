<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StatistikLatihan;
use App\Models\StrukturOrganisasi;
use Illuminate\Support\Facades\Validator;

class StatistikLatihanController extends Controller
{
    public function show($id)
    {
        $statistik = StatistikLatihan::where('struktur_organisasi_id', $id)
            ->latest()
            ->first();

        if (!$statistik) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada data statistik'
            ]);
        }

        // Hitung nilai radar chart
        $skillData = [
            'accuracy' => min(100, $statistik->on_target * 2),
            'power' => min(100, $statistik->push_up * 2),
            'focus' => min(100, $statistik->latihan_konsentrasi * 2),
            'technique' => min(100, $statistik->off_target > 0 ? 100 - $statistik->off_target * 5 : 90),
            'strength' => min(100, $statistik->push_up * 2),
            'endurance' => min(100, $statistik->tahan_nafas * 2),
            'stamina' => min(100, $statistik->waktu_latihan * 2),
        ];

        return response()->json([
            'success' => true,
            'skillData' => $skillData,
            'rawData' => $statistik
        ]);
    }

    public function store(Request $request, $strukturId)
    {
        $validator = Validator::make($request->all(), [
            'push_up' => 'required|integer|min:0|max:100',
            'tahan_nafas' => 'required|integer|min:0|max:100',
            'on_target' => 'required|integer|min:0|max:100',
            'off_target' => 'required|integer|min:0|max:100',
            'latihan_konsentrasi' => 'required|integer|min:0|max:100',
            'waktu_latihan' => 'required|integer|min:0|max:100'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $statistik = StatistikLatihan::create([
            'struktur_organisasi_id' => $strukturId,
            'push_up' => $request->push_up,
            'tahan_nafas' => $request->tahan_nafas,
            'on_target' => $request->on_target,
            'off_target' => $request->off_target,
            'latihan_konsentrasi' => $request->latihan_konsentrasi,
            'waktu_latihan' => $request->waktu_latihan
        ]);

        // Hitung nilai radar chart
        $skillData = [
            'accuracy' => min(100, $statistik->on_target * 2),
            'power' => min(100, $statistik->push_up * 2),
            'focus' => min(100, $statistik->latihan_konsentrasi * 2),
            'technique' => min(100, $statistik->off_target > 0 ? 100 - $statistik->off_target * 5 : 90),
            'strength' => min(100, $statistik->push_up * 2),
            'endurance' => min(100, $statistik->tahan_nafas * 2),
            'stamina' => min(100, $statistik->waktu_latihan * 2),
        ];

        return response()->json([
            'success' => true,
            'message' => 'Data statistik berhasil disimpan',
            'skillData' => $skillData
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'push_up' => 'required|numeric|min:0|max:100',
            'tahan_nafas' => 'required|numeric|min:0|max:100',
            'on_target' => 'required|numeric|min:0|max:100',
            'off_target' => 'required|numeric|min:0|max:100',
            'latihan_konsentrasi' => 'required|numeric|min:0|max:100',
            'waktu_latihan' => 'required|numeric|min:0|max:100',
        ]);

        $statistik = StatistikLatihan::findOrFail($id);
        $statistik->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data statistik berhasil diperbarui'
        ]);
    }
}
