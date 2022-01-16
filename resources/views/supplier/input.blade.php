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
                        <label class="form-label"for="province">Provinsi Supplier</label>
                        <select class="form-control form-control-solid" name="province_id" id="province">
                            <option value="">Pilih Provinsi</option>
                            @foreach($province as $item)
                                <option value="{{$item->province_id}}"{{$item->province_id==$supplier->province_id?'selected':''}}>{{$item->province_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="city">Kota Supplier</label>
                        <select class="form-control form-control-solid" name="city_id" id="city">
                            <option value="">Pilih Provinsi</option>
                            @foreach($province as $item)
                                <option value="{{$item->city_id}}"{{$item->city_id==$supplier->city_id?'selected':''}}>{{$item->city_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
        </div>
            @if($supplier->id)
            <button type="button" class="btn btn-success" onclick="handle_save('#SubmitCreateArticleForm','#form-tambah','{{route('supplier.update',$supplier->id)}}','PATCH','Update')" id="SubmitCreateArticleForm">Ubah</button>
            @else
            <div class="mb-0">
            <button type="button" class="btn btn-success" onclick="handle_save('#SubmitCreateArticleForm','#form-tambah','{{route('supplier.store')}}','POST','Kirim')" id="SubmitCreateArticleForm">Simpan</button>
            @endif
            <button type="button" class="btn btn-danger" onclick="load_list(1);">Kembali</button>
            </div>
    </form>
</div>
    <script>
       @if($supplier->province_id)
    $('#province').val('{{$supplier->province_id}}');
    setTimeout(function(){ 
        $('#province').trigger('change');
        setTimeout(function(){ 
            $('#city').val('{{$supplier->city_id}}');
            $('#city').trigger('change');
        }, 2000);
    }, 1000);
    @endif
    $("#province").change(function(){
            $.ajax({
                type: "POST",
                url: "{{route('city.get_list')}}",
                data: {id_province : $("#province").val()},
                success: function(response){
                    $("#city").html(response);
                }
            });
        });
        $("#city").change(function(){
            $.ajax({
                type: "POST",
                data: {id_city : $("#city").val()},
            });
        });
    </script>