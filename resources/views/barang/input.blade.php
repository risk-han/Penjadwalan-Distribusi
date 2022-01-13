<div class="container">
    <form class="form-horizontal mt-5" id="form-tambah">
        <div class="row justify-content-center">
            <div class="card">
                <h4 class="modal-title">Tambah Pesanan Baru</h4>
                    <div class="form-group">
                        <label class="form-label"for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control form-control-solid" name="nama_barang" id="nama_barang" value="{{$barang->nama_barang}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label"for="berat_barang">Berat Barang</label>
                        <input type="number" class="form-control form-control-solid" name="berat_barang" id="berat_barang" value="{{$barang->berat_barang}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label"for="stok">Stok Barang</label>
                        <input type="number" class="form-control form-control-solid" name="stok" id="stok" value="{{$barang->stok}}">
                    </div>
                    <div class="form-group">
                        <label  class="form-label"for="kategori_barang">Kategori Barang</label>
                        <select name="kategori_barang" name="kategori_barang" class="form-select" aria-label="Default select example">
                            <option>Pilih Kategori Barang</option>
                            @foreach($kategori as $kt)
                            <option value="{{$kt->id}}" {{$kt->id==$barang->id_kategori ? 'selected' : ''}}>{{ $kt->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label  class="form-label"for="supplier_barang">Supplier Barang</label>
                        <select name="supplier_barang" name="supplier_barang" class="form-select" aria-label="Default select example">
                            <option>Pilih Supplier Barang</option>
                            @foreach($supplier as $s)
                            <option value="{{$s->id}}" {{$s->id==$barang->id_supplier ? 'selected' : ''}}>{{ $s->nama_supplier }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
        </div>
            @if($barang->id)
            <button type="button" class="btn btn-success" onclick="handle_save('#SubmitCreateArticleForm','#form-tambah','{{route('barang.update',$barang->id)}}','PUT','Update')" id="SubmitCreateArticleForm">Ubah</button>
            @else
            <div class="mb-0">
            <button type="button" class="btn btn-success" onclick="handle_save('#SubmitCreateArticleForm','#form-tambah','{{route('barang.store')}}','POST','Kirim')" id="SubmitCreateArticleForm">Simpan</button>
            @endif
            <button type="button" class="btn btn-danger" onclick="load_list(1);">Kembali</button>
            </div>
    </form>
</div>