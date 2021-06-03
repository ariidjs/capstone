<?php

namespace App\Http\Controllers;

use App\Penerima;
use App\Tracking;
use App\DetailTracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class PenerimaController extends Controller
{
    
    public function __construct()
    {
        //
    }

    public function showAllPenerima()
    {
        $penerima = Penerima::all();
        return response()->json([
            'success' => true,
            'data' => $penerima
        ], 200);
    }

    public function showPenerimaById($nik)
    {
        $penerima = Penerima::where('nik', $nik);
        return response()->json([
            'success' => true,
            'data' => $penerima->get()
        ], 200);

    }

    public function showPenerimaByStatus($status)
    {
        $penerima = Penerima::where('status', $status);
        return response()->json([
            'success' => true,
            'data' => $penerima->get()
        ], 200);
    }

    public function insertPenerima(Request $request)
    {  
        $length = 6;    
        $id = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
        $validator = Validator::make($request->all(), [
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
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

            try{
                $penerimas = Penerima::create([
                    'id'=> $id,
                    'nik' => $request->input('nik'),
                    'nama'   => $request->input('nama'),
                    'alamat'   => $request->input('alamat'),
                    'no_hp'=>$request->input('no_hp'),
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
            }catch (QueryException $e){
                $error_code = $e->errorInfo[1];
                if($error_code == 1062){
                    return response()->json([
                        'success' => false,
                        'message' => 'Anda sudah terdaftar!',
                    ], 403);
                }       
            }
            
        }
    }

    public function updateStatusPenerima($id, Request $request)
    {
        $penerima = Penerima::findOrFail($id);
        
        if($penerima != null) {
            $penerima->status = $request->status;
            $penerima->save();
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan!',
            ], 404);
        }


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


    public function createTracking($nik, Request $request)
    {
    
        $penerima = Penerima::where('nik',$nik)->first();

        if($penerima->status == 1) {
            $tracking = Tracking::create([
                'alamat' => $request->alamat,
                'status' => $request->status,
                'nik_penerima' => $penerima->nik
            ]);
        }else if{
            return response()->json([
                'success' => false,
                'message' => 'Nik yang terdaftar tidak berhak!',
            ], 400);
        }else {
            return response()->json([
                'success' => false,
                'message' => 'Data track sudah diinputkan!',
            ], 400);
        }
        


        if ($tracking) {
            return response()->json([
                'success' => true,
                'message' => 'Data track berhasil ditambah!',
                'data' => $tracking
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data track gagal ditambah!',
            ], 400);
        }
    }

    // public function delete($id)
    // {
    //     Author::findOrFail($id)->delete();
    //     return response('Deleted Successfully', 200);
    // }
}