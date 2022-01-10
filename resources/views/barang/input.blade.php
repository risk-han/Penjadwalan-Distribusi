<div class="container">
    <form class="form-horizontal mt-5" id="form-tambah">
        <div class="row justify-content-center">
            <div class="card">
                <h4 class="modal-title">Tambah Pesanan Baru</h4>
                    <div class="form-group">
                        <label class="form-label"for="nama_Pemesan">Nama Pemesan</label>
                        <input type="text" class="form-control form-control-solid" name="nama_Pemesan" id="nama_Pemesan" value="{{$barang->nama_Pemesan}}">
                    </div>
                    <div class="form-group">
                        <label  class="form-label"for="id_penanganan">Jenis Penanganan</label>
                        <select name="id_penanganan" name="id_penanganan" class="form-select" aria-label="Default select example">
                            <option>Pilih Jenis Penanganan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label"for="id_jenis_tempat">Jenis Tempat</label>
                        <select name="id_jenis_tempat" name="id_jenis_tempat" class="form-select" aria-label="Default select example">
                            <option>Pilih Jenis Tempat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label"for="panjang">Panjang Area</label>
                        <input type="number" class="form-control form-control-solid" name="panjang" id="panjang" value="{{$barang->panjang}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label"for="lebar">Lebar Area</label>
                        <input type="number" class="form-control form-control-solid" name="lebar" id="lebar" value="{{$barang->lebar}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label"for="alamat">Alamat Pemesan</label>
                        <input type="text" class="form-control form-control-solid" name="alamat" id="alamat" value="{{$barang->alamat}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label"for="tanggal_pengerjaan">Tanggal Pengerjaan</label>
                        <input type="date" class="form-control form-control-solid" name="tanggal_pengerjaan" value="{{$barang->tanggal_pengerjaan}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label"for="no_telp">Nomor Telepon Pemesan</label>
                        <input type="text" class="form-control form-control-solid" name="no_telp" value="{{$barang->no_telp}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label"for="email">Email</label>
                        <input type="text" class="form-control form-control-solid" name="email" value="{{$barang->email}}">
                    </div>
                    @if($barang->id)
                    <div class="form-group">
                        <label class="form-label"for="status">Status</label>
                        <select name="status" name="status" class="form-select" aria-label="Default select example">
                            @if($barang->status == 'Pending')
                            <option>Pilih Status</option>
                                <option value="{{ $barang->status }}" Selected>{{ $barang->status }}</option>
                                <option value="selesai">Selesai</option>
                                @else
                                <option value="selesai" selected>Selesai</option>
                                @endif
                        </select>
                    </div>
                    @endif
                </div>
        </div>
            @if($barang->id)
            <button type="button" class="btn btn-success" onclick="handle_save('#SubmitCreateArticleForm','#form-tambah','{{route('barang.update',$barang->id)}}','PUT','Update')" id="SubmitCreateArticleForm">Simpan</button>
            @else
            <div class="mb-0">
            <button type="button" class="btn btn-success" onclick="handle_save('#SubmitCreateArticleForm','#form-tambah','{{route('barang.store')}}','POST','Kirim')" id="SubmitCreateArticleForm">Simpan</button>
            @endif
            <button type="button" class="btn btn-danger" onclick="load_list(1);">Kembali</button>
            </div>
    </form>
</div>