<div class="container">
    <form class="form-horizontal mt-5" id="form-tambah">
        <div class="row justify-content-center">
            <div class="card">
                <h4 class="modal-title">Tambah Supplier Baru</h4>
                    <div class="form-group">
                        <label class="form-label"for="nama_supplier">Nama Supplier</label>
                        <input type="text" class="form-control form-control-solid" name="nama_supplier" id="nama_supplier" value="{{$supplier->nama_supplier}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label"for="kota_supplier">Kota Supplier</label>
                        <input type="text" class="form-control form-control-solid" name="kota_supplier" id="kota_supplier" value="{{$supplier->kota_supplier}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label"for="provinsi_supplier">Provinsi Supplier</label>
                        <input type="text" class="form-control form-control-solid" name="provinsi_supplier" id="provinsi_supplier" value="{{$supplier->provinsi_supplier}}">
                    </div>
                </div>
        </div>
            @if($supplier->id)
            <button type="button" class="btn btn-success" onclick="handle_save('#SubmitCreateArticleForm','#form-tambah','{{route('supplier.update',$supplier->id)}}','PUT','Update')" id="SubmitCreateArticleForm">Ubah</button>
            @else
            <div class="mb-0">
            <button type="button" class="btn btn-success" onclick="handle_save('#SubmitCreateArticleForm','#form-tambah','{{route('supplier.store')}}','POST','Kirim')" id="SubmitCreateArticleForm">Simpan</button>
            @endif
            <button type="button" class="btn btn-danger" onclick="load_list(1);">Kembali</button>
            </div>
    </form>
</div>