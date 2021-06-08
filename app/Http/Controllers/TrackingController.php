<?php

namespace App\Http\Controllers;

use App\Tracking;
use App\DetailTracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrackingController extends Controller
{

    public function __construct()
    {
        //
    }

    public function showAllTracking()
    {
        $tracking = Tracking::all();
        return response()->json([
            'success' => true,
            'data' => $tracking
        ], 200);
    }

    public function showTrackingByNik($nik)
    {
        $tracking = Tracking::where('nik_penerima', $nik);
        return response()->json([
            'success' => true,
            'data' => $tracking->get()
        ], 200);
    }

    public function showDetailTracking($id)
    {
        $tracking = DetailTracking::where('id_track', $id);
        return response()->json([
            'success' => true,
            'data' => $tracking->get()
        ], 200);
    }

    public function updateTrack($id,Request $request)
    {
        $tracking = Tracking::where('id',$id)->first();

        if($tracking->status != "Selesai") {
            $detailtrack = DetailTracking::create([
                'lokasi' => $request->lokasi,
                'waktu' => $request->waktu,
                'id_track' => $tracking->id
            ]);

            if ($detailtrack) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data track berhasil diupdate!',
                    'data' => $detailtrack
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data track gagal diupdate!',
                ], 400);
            }
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Paket sudah diantar sesuai alamat!',
            ], 400);
        }
        
    }

    public function finishTrack($nik,$id,Request $request)
    {
        $tracking = Tracking::where('nik_penerima',$nik)->first();
        $tracking = Tracking::where('id',$id)->first();

        if($tracking->status != "Selesai") {
            $tracking->status = $request->status;
            $tracking->save();

        }else {
            return response()->json([
                'success' => false,
                'message' => 'Anda sudah menyelesaikan paket ini!',
            ], 400);
        }

        if ($tracking) {
            return response()->json([
                'success' => true,
                'message' => 'Status berhasil diubah!',
                'data' => $tracking
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Status gagal diubah!',
            ], 400);
        }
        
    }

    public function deleteTrackById($id)
    {
        $tracking = Tracking::where('id',$id)->first();
        if($tracking != null){
            $tracking->delete();
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Data Tracking tidak ada!',
            ], 400);
        }

        if ($tracking) {
            return response()->json([
                'success' => true,
                'message' => 'Data Tracking dihapus!',
                'data' => $tracking
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Tracking gagal dihapus!',
            ], 404);
        }
    }

    public function deleteDetailTracking($id)
    {
        $tracking = DetailTracking::where('id_track',$id);
        if ($tracking != null) {
            $tracking->delete();
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Tracking tidak ada!',
            ], 400);
        }

        if ($tracking) {
            return response()->json([
                'success' => true,
                'message' => 'Data Tracking dihapus!',
                'data' => $tracking
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data Tracking gagal dihapus!',
            ], 404);
        }
    }
}
