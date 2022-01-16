<div class="container">
    <form class="form-horizontal mt-5" id="form-tambah">
        <div class="row justify-content-center">
            <div class="card">
                <h4 class="modal-title">@if($penjadwalan->id)Ubah @else Tambah @endif Penjadwalan Distribusi Baru</h4>
                    <div class="form-group">
                        <label  class="form-label "for="id_barang">Nama Barang</label>
                        <select name="id_barang" name="id_barang" class="form-select" aria-label="Default select example">
                            <option value="">Pilih Barang</option>
                            @foreach($barang as $b)
                            <option value="{{$b->id}}" {{ $b->id==$penjadwalan->id_barang ? 'selected' : '' }} >{{ $b->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label"for="jadwal_penjadwalan">Tanggal Distribusi Barang</label>
                        <input type="date" class="form-control form-control-solid" name="jadwal_penjadwalan" id="jadwal_penjadwalan" value="{{$penjadwalan->jadwal_penjadwalan}}">
                    </div>
                    @if ($penjadwalan->id)
                    <div class="form-group">
                        <label  class="form-label"for="status">Nama Barang</label>
                        <select name="status" name="status" class="form-select" aria-label="Default select example">
                            <option>Pilih Barang</option>
                            @foreach($status as $s)
                            <option value="{{$s->id}}" {{ $s->id==$penjadwalan->id_status ? 'selected' : '' }} >{{ $s->status }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                </div>
        </div>
            @if($penjadwalan->id)
            <button type="button" class="btn btn-success" onclick="handle_save('#SubmitCreateArticleForm','#form-tambah','{{route('penjadwalan.update',$penjadwalan->id)}}','PATCH','Update')" id="SubmitCreateArticleForm">Ubah</button>
            @else
            <div class="mb-0">
            <button type="button" class="btn btn-success" onclick="handle_save('#SubmitCreateArticleForm','#form-tambah','{{route('penjadwalan.store')}}','POST','Kirim')" id="SubmitCreateArticleForm">Simpan</button>
            @endif
            <button type="button" class="btn btn-danger" onclick="load_list(1);">Kembali</button>
            </div>
    </form>
</div>