<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Supplier;
use App\Models\Kategori;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $collection = Barang::get();
            return view('barang.list',compact('collection'));
        }
        return view('barang.main');
    }

    public function create(Barang $barang)
    {
        $kategori = Kategori::get();
        $supplier = Supplier::get();
        return view('barang.input',["barang"=> new Barang, 'kategori' => $kategori, 'supplier' => $supplier]);
    }

    public function store(Request $request, Barang $barang)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'berat_barang' => 'required',
            'stok' => 'required',
            'kategori_barang' => 'required',
            'supplier_barang' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama_barang')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_barang'),
                ]);
            } elseif ($errors->has('berat_barang')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('berat_barang'),
                ]);
            } elseif ($errors->has('stok')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('stok'),
                ]);
            } elseif ($errors->has('kategori_barang')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kategori_barang'),
                ]);
            } elseif ($errors->has('supplier_barang')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('supplier_barang'),
                ]);
            }
        }
        $barang = new Barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->berat_barang= $request->berat_barang;
        $barang->stok= $request->stok;
        $barang->id_kategori= $request->kategori_barang;
        $barang->id_supplier= $request->supplier_barang;
     
        $barang->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Barang ' . $request->nama_barang . ' Disimpan',
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit(Barang $barang)
    {
        $kategori = Kategori::get();
        $supplier = Supplier::get();
        return view('barang.input',compact('barang', 'kategori', 'supplier'));
    }

    public function update(Request $request, Barang $barang)
    {
        $validator = Validator::make($request->all(), [
            'nama_barang' => 'required',
            'berat_barang' => 'required',
            'stok' => 'required',
            'kategori_barang' => 'required',
            'supplier_barang' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('nama_barang')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_barang'),
                ]);
            } elseif ($errors->has('berat_barang')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('berat_barang'),
                ]);
            } elseif ($errors->has('stok')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('stok'),
                ]);
            } elseif ($errors->has('kategori_barang')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kategori_barang'),
                ]);
            } elseif ($errors->has('supplier_barang')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('supplier_barang'),
                ]);
            }
        }
        $barang->nama_barang = $request->nama_barang;
        $barang->berat_barang= $request->berat_barang;
        $barang->stok= $request->stok;
        $barang->id_kategori= $request->kategori_barang;
        $barang->id_supplier= $request->supplier_barang;
     
        $barang->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Barang ' . $request->nama_barang . ' Diubah',
        ]);
    }

    public function destroy($id)
    {
        
    }
}
