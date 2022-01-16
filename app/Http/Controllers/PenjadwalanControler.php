<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Penjadwalan;
use App\Models\StatusPenjadwalan;
use Illuminate\Support\Facades\Validator;


class PenjadwalanControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {   
        if($request->ajax()){
            $jenis = $request->jenis;
            $collection = Penjadwalan::where('id_status','=',$jenis)->orderBy('created_at','desc')->paginate(5);
            if($jenis == 'semua'){
                $collection = Penjadwalan::orderBy('created_at','desc')->paginate(5);
            }else if($jenis == 1)
            {
                $collection = Penjadwalan::where('id_status','=',1)->orderBy('created_at','desc')->paginate(5);
            }else if($jenis == 2)
            {
                $collection = Penjadwalan::where('id_status','=',2)->orderBy('created_at','desc')->paginate(5);
            }
            return view('penjadwalan.list', compact('collection'));
        }
        return view('penjadwalan.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Penjadwalan $penjadwalan)
    {
        $barang = Barang::get();
        return view('penjadwalan.input', ["penjadwalan" => new Penjadwalan, "barang" => $barang]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Penjadwalan $penjadwalan)
    {
        $validator = Validator::make($request->all(), [
            'id_barang' => 'required',
            'jadwal_penjadwalan' => 'required',
        ]);

        if($validator->fails()){
            $errors = $validator->errors();
            if($errors->has('id_barang')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('id_barang')
                ]);
            }else if($errors->has('jadwal_penjadwalan')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('jadwal_penjadwalan')
                ]);
            }
        }
        $penjadwalan = new Penjadwalan;
        $penjadwalan->id_barang = $request->id_barang;
        $penjadwalan->jadwal_penjadwalan = $request->jadwal_penjadwalan;
        $penjadwalan->id_status = 1; 

        $penjadwalan->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Penjadwalan untuk tanggal ' . $request->jadwal_penjadwalan . ' Berhasil dijadwalkan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjadwalan $penjadwalan)
    {
        $status = StatusPenjadwalan::get();
        $barang = Barang::get();
        return view('penjadwalan.input', compact('penjadwalan', 'barang', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjadwalan $penjadwalan)
    {
        $validator = Validator::make($request->all(), [
            'id_barang' => 'required',
            'jadwal_penjadwalan' => 'required',
        ]);

        if($validator->fails()){
            $errors = $validator->errors();
            if($errors->has('id_barang')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('id_barang')
                ]);
            }else if($errors->has('jadwal_penjadwalan')){
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('jadwal_penjadwalan')
                ]);
            }
        }

        $penjadwalan->id_barang = $request->id_barang;
        $penjadwalan->jadwal_penjadwalan = $request->jadwal_penjadwalan;
        $penjadwalan->id_status = $request->status; 

        $penjadwalan->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Penjadwalan untuk tanggal ' . $request->jadwal_penjadwalan . ' Berhasil diubah'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjadwalan $penjadwalan)
    {
        $penjadwalan->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Supplier ' . $penjadwalan->jadwal_penjadwalan . ' Terhapus',
        ]);
    }
}
