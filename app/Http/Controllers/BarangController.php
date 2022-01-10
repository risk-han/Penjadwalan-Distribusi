<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $collection = Barang::paginate(5);
            return view('barang.list',compact('collection'));
        }
        return view('barang.main');
    }

    public function create(Barang $barang)
    {
        return view('barang.input',["barang"=> new Barang]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(Barang $barang)
    {
        return view('barang.input',compact('barang'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
