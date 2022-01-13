<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;


class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $supplier = Supplier::get();
            return view('supplier.list', compact('supplier'));
        }
        return view('supplier.main');
    }

    public function create(Supplier $supplier)
    {
        return view('supplier.input', ["supplier" => new Supplier]);
    }

    public function store(Request $request, Supplier $supplier)
    {
        $validator = Validator::make($request->all(), [
            'nama_supplier' => 'required',
            'kota_supplier' => 'required',
            'provinsi_supplier' => 'required',
        ]);
        if($validator->fails()) {
            $errors = $validator->errors();
            if($errors->has('nama_supplier')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_supplier'),
                ]);
            } else if($errors->has('kota_supplier')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kota_supplier'),
                ]);
            } else if($errors->has('provinsi_supplier')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('provinsi_supplier'),
                ]);
            } 
        }
        $supplier = new Supplier;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->kota_supplier = $request->kota_supplier;
        $supplier->provinsi_supplier = $request->provinsi_supplier;

        $supplier->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Supplier ' . $request->nama_supplier . ' Berhasil ditambah',
        ]);
    }

    public function edit(Supplier $supplier)
    {
        return view('supplier.input', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validator = Validator::make($request->all(), [
            'nama_supplier' => 'required',
            'kota_supplier' => 'required',
            'provinsi_supplier' => 'required',
        ]);
        if($validator->fails()) {
            $errors = $validator->errors();
            if($errors->has('nama_supplier')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_supplier'),
                ]);
            } else if($errors->has('kota_supplier')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('kota_supplier'),
                ]);
            } else if($errors->has('provinsi_supplier')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('provinsi_supplier'),
                ]);
            } 
        }
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->kota_supplier = $request->kota_supplier;
        $supplier->provinsi_supplier = $request->provinsi_supplier;

        $supplier->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Supplier ' . $request->nama_supplier . ' Berhasil ditambah',
        ]);
    }
}
