<?php

namespace App\Http\Controllers;

use App\Penerima;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PenerimaController extends Controller
{
    
    public function __construct()
    {
        //
    }

    public function showAllPenerima()
    {
        return response()->json(Penerima::all());
    }

    public function showPenerimaByStatus($status)
    {
        $penerima = Penerima::where('status', $status);
        return response()->json($penerima->get(), 200);
    }

    public function insertPenerima(Request $request)
    {  
        $length = 6;    
        $id = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'alamat' => 'required',
            'gaji' => 'required',
            'pekerjaan' => 'required',
            'tanggungan' => 'required',
            'umur' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->all()], 401
            );
        }else {
            $penerimas = Penerima::create([
                'id'=> $id,
                'nama'   => $request->input('nama'),
                'alamat'   => $request->input('alamat'),
                'gaji'   => $request->input('gaji'),
                'pekerjaan'   => $request->input('pekerjaan'),
                'tanggungan'   => $request->input('tanggungan'),
                'umur'   => $request->input('umur'),
                'status'   => $request->input('status')
            ]);

            if ($penerimas) {
                return response()->json([
                    'success' => true,
                    'message' => 'Data berhasil disimpan!',
                    'data' => $penerimas
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Gagal Disimpan!',
                ], 400);
            }
        }
    }

    public function updateStatusPenerima($id, Request $request)
    {
        $penerima = Penerima::findOrFail($id);
        $penerima->status = $request->status;
        $penerima->save();


        if ($penerima) {
            return response()->json([
                'success' => true,
                'message' => 'Status berhasil diubah!',
                'data' => $penerima
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