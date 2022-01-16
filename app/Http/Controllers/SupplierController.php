<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\Province;
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
            $keywords = $request->keywords;
            $supplier = Supplier::where('nama_supplier','like','%' . $keywords.'%')->get();
            return view('supplier.list', compact('supplier'));
        }
        return view('supplier.main');
    }

    public function create(Supplier $supplier)
    {
        $province = Province::get();
        return view('supplier.input', ["supplier" => new Supplier, "province" => $province]);
    }

    public function store(Request $request, Supplier $supplier)
    {
        $validator = Validator::make($request->all(), [
            'nama_supplier' => 'required',
            'city_id' => 'required',
            'province_id' => 'required',
        ]);
        if($validator->fails()) {
            $errors = $validator->errors();
            if($errors->has('nama_supplier')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_supplier'),
                ]);
            } else if($errors->has('city_id')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('city_id'),
                ]);
            } else if($errors->has('province_id')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('province_id'),
                ]);
            } 
        }
        $supplier = new Supplier;
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->city_id = $request->city_id;
        $supplier->province_id = $request->province_id;

        $supplier->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Supplier ' . $request->nama_supplier . ' Berhasil ditambah',
        ]);
    }

    public function edit(Supplier $supplier)
    {
        $province = Province::get();
        return view('supplier.input', compact('supplier','province'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validator = Validator::make($request->all(), [
            'nama_supplier' => 'required',
            'city_id' => 'required',
            'province_id' => 'required',
        ]);
        if($validator->fails()) {
            $errors = $validator->errors();
            if($errors->has('nama_supplier')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_supplier'),
                ]);
            } else if($errors->has('city_id')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('city_id'),
                ]);
            } else if($errors->has('province_id')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('province_id'),
                ]);
            } 
        }
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->city_id = $request->city_id;
        $supplier->province_id = $request->province_id;

        $supplier->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Supplier ' . $request->nama_supplier . ' Berhasil ditambah',
        ]);
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Supplier ' . $supplier->nama_supplier . ' Terhapus',
        ]);
    }
}
