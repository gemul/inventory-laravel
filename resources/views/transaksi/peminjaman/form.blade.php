<div class="col-md-7">
    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('kategori') ? ' has-error' : '' }}">
            <label for="idkategori">Kategori</label>
            <select class='form-control' name='idkategori' onchange="updateBarang(this);">
                <option value="" >Pilih Salah Satu</option>
                @foreach ($kategoriList as $kategori)
                    @if (old('idkategori', $record->idkategori) == $kategori->idkategori)
                        <option value="{{ $kategori->idkategori }}" selected>{{ $kategori->nama }}</option>
                    @else
                        <option value="{{ $kategori->idkategori }}" >{{ $kategori->nama }}</option>
                    @endif
                @endforeach
            </select>
            @if ($errors->has('kategori'))
                <span class="help-block">
                    <strong>{{ $errors->first('kategori') }}</strong>
                </span>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5">
            <label for="idbaran">Barang</label>
            <select class='form-control' name='idbarang' required='required' id='input-barang' style="display:none;">
            </select>

            <span class="help-block" id='input-barang-status' style="display:none;">
                Pilih kategori barang.
            </span>
        </div>
        <!-- /.form-group -->
    </div>
    <script>
    var listBarang;
    function updateBarang(kategori){
        if(kategori.value==''){
            $('#input-barang-status').show().html("Pilih kategori barang.");
            $('#input-barang').hide();
        }else{
            $.ajax({
                url:'listbarang/'+kategori.value,
                type:'get',
                dataType:'json',
                data:{'idkategori':kategori.value},
                beforeSend:function(){
                    $('#input-barang').hide();
                    $('#input-barang-status').show().html("<strong><i class='fa fa-spinner fa-spin'></i> Memuat List Barang</strong>");
                    console.log("beforesend triggered");
                },
                success:function(result){
                    listBarang=result;
                    if(listBarang.length >= 1){
                        var options="";
                        listBarang.forEach(function(item){
                            options+="<option value='"+item.idbarang+"'>"+item.kode+"-"+item.namabarang+"</option>"
                        });
                        $('#input-barang').html(options).show();
                        $('#input-barang-status').hide();
                    }else{
                        $('#input-barang-status').show().html("<strong>Tidak ada barang didalam kategori ini.</strong>");
                        $('#input-barang').hide();
                    }
                },
                error:function(err){
                    console.log(err);
                    $('#input-barang-status').show().html("<strong>Kesalahan saat memuat data</strong>");
                    $('#input-barang').hide();
                },
                complete:function(){

                }
            });

        }
        
    }
    </script>
    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('nama') ? ' has-error' : '' }}">
            <label for="nama">Nama Peminjam</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Peminjam" value="{{ old('nama', $record->nama) }}" required>

            @if ($errors->has('nama'))
                <span class="help-block">
                    <strong>{{ $errors->first('nama') }}</strong>
                </span>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('tgl_pinjam') ? ' has-error' : '' }}">
            <label for="tgl_pinjam">Tanggal Pinjam</label>
            <input type="text" class="form-control" name="tgl_pinjam" id="datepicker" placeholder="tgl_pinjam" value="{{ old('tgl_pinjam', $record->tgl_pinjam) }}" required>

            @if ($errors->has('tgl_pinjam'))
                <span class="help-block">
                    <strong>{{ $errors->first('tgl_pinjam') }}</strong>
                </span>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('bukti') ? ' has-error' : '' }}">
            <label for="bukti">Bukti</label>
            <select class='form-control' name='bukti'>
                <option value="Kartu Peminjaman" >Kartu Peminjaman</option>
                <option value="KTP" >KTP</option>
                <option value="SIM" >SIM</option>
                <option value="KTM" >KTM</option>
                <option value="Kartu Pelajar" >Kartu Pelajar</option>
                <option value="Lain" >Lain</option>
            </select>

            @if ($errors->has('bukti'))
                <span class="help-block">
                    <strong>{{ $errors->first('bukti') }}</strong>
                </span>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('nomorbukti') ? ' has-error' : '' }}">
            <label for="nomorbukti">Nomor Bukti</label>
            <input type="text" class="form-control" name="nomorbukti" placeholder="nomorbukti" value="{{ old('nomorbukti', $record->nomorbukti) }}">

            @if ($errors->has('nomorbukti'))
                <span class="help-block">
                    <strong>{{ $errors->first('nomorbukti') }}</strong>
                </span>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('catatan') ? ' has-error' : '' }}">
            <label for="catatan">catatan</label>
            <input type="text" class="form-control" name="catatan" placeholder="catatan" value="{{ old('catatan', $record->catatan) }}">

            @if ($errors->has('catatan'))
                <span class="help-block">
                    <strong>{{ $errors->first('catatan') }}</strong>
                </span>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <script>
        $(document).ready(function(){
             $('#datepicker').datetimepicker({
                 format:'YYYY-MM-DD HH:mm:ss'
             });
        });
    </script>

</div>
<!-- /.col-md-7 -->


</div>
<!-- /.col-md-5 -->
