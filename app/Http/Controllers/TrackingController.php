<?php

namespace App\Http\Controllers;

use App\Tracking;
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
        return response()->json(Tracking::all());
    }

    public function showTrackingByStatus($status)
    {
        $tracking = Tracking::where('status', $status);
        return response()->json($tracking->get(), 200);
    }

    public function insertTracking(Request $request)
    {
        $length = 6;
        $id_detail_tracking = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, $length);
        $validator = Validator::make($request->all(), [
            'id_track' => 'required',
            'jam' => 'required',
            'tanggal' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'success' => false,
                    'message' => $validator->errors()->all()
                ],
                401
            );
        } else {
            $trackings = Tracking::create([
                'id' => $id_detail_tracking,
                'jam'   => $request->input('jam'),
                'tanggal'   => $request->input('tanggal'),
                'status'   => $request->input('status')
            ]);

            if ($trackings) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil disimpan!',
                    'data' => $trackings
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Disimpan!',
                ], 400);
            }
        }
    }

    public function updateStatusTracking($id, Request $request)
    {
        $tracking = Tracking::findOrFail($id);
        $tracking->status = $request->status;
        $tracking->save();


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

    // public function delete($id)
    // {
    //     Author::findOrFail($id)->delete();
    //     return response('Deleted Successfully', 200);
    // }
}
