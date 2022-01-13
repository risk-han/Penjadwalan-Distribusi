<div class="container">
    <form class="form-horizontal mt-5" id="form-tambah">
        <div class="row justify-content-center">
            <div class="card">
                <h4 class="modal-title">Tambah Kategori Baru</h4>
                    <div class="form-group">
                        <label class="form-label"for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control form-control-solid" name="nama_kategori" id="nama_kategori" value="{{$kategori->nama_kategori}}">
                    </div>
                </div>
        </div>
            @if($kategori->id)
            <button type="button" class="btn btn-success" onclick="handle_save('#SubmitCreateArticleForm','#form-tambah','{{route('kategori.update',$kategori->id)}}','PUT','Update')" id="SubmitCreateArticleForm">Ubah</button>
            @else
            <div class="mb-0">
            <button type="button" class="btn btn-success" onclick="handle_save('#SubmitCreateArticleForm','#form-tambah','{{route('kategori.store')}}','POST','Kirim')" id="SubmitCreateArticleForm">Simpan</button>
            @endif
            <button type="button" class="btn btn-danger" onclick="load_list(1);">Kembali</button>
            </div>
    </form>
</div>