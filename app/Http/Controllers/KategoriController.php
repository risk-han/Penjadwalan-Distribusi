<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $keywords = $request->keywords;
            $kategori = Kategori::where('nama_kategori','like','%' . $keywords.'%')->get();
            return view('kategori.list', compact('kategori'));
        }
        return view('kategori.main');
    }

    public function create(Kategori $kategori)
    {
        return view('kategori.input', ["kategori" => new Kategori]);
    }

    public function store(Request $request, Kategori $kategori)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required',
        ]);
        if($validator->fails()) {
            $errors = $validator->errors();
            if($errors->has('nama_kategori')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_kategori'),
                ]);
            }
        }
        $kategori = new Kategori;
        $kategori->nama_kategori = $request->nama_kategori;

        $kategori->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Kategori ' . $request->nama_kategori . ' Berhasil ditambah',
        ]);
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.input', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validator = Validator::make($request->all(), [
            'nama_kategori' => 'required',
        ]);
        if($validator->fails()) {
            $errors = $validator->errors();
            if($errors->has('nama_kategori')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('nama_kategori'),
                ]);
            }
        }
        $kategori->nama_kategori = $request->nama_kategori;

        $kategori->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Kategori ' . $request->nama_kategori . ' Berhasil diubah',
        ]);
    }
}
