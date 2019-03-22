<?php
$delta = time() - strtotime($peminjaman->tgl_pinjam) ;
$hari = floor( $delta / (60*60*24) ) ;
$sisaDetik = $delta % (60*60*24) ;
$jam = round( $sisaDetik / (60*60) );
$sisaDetik = $sisaDetik % (60*60) ;
$menit = round( $sisaDetik/60 );
if($hari==0 && $jam==0){
    $lama=$menit ." Menit " ;
}elseif($hari==0 && $jam!=0){
    $lama=$jam." Jam " . $menit ." Menit ";
}else{
    $lama=$hari." Hari, ".$jam." Jam ";
}
?>
<div class="form form-horizontal">
    <form onsubmit="return false;" id="form-pengembalian">
        {{ csrf_field() }}
        <input type='hidden' name='idpeminjaman' id='idpeminjaman' value="{{ $peminjaman->idpeminjaman }}" >
        <div class="form-group margin-b-5 margin-t-5 ">
            <label for="idbarang" class="col-sm-4">Barang</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <input type="text" class="form-control input-pengembalian" name="kembali" id="kembali" value="" autocomplete="off" required>
                    <div class="input-group-btn">
                        <button class="btn btn-info btn-flat input-pengembalian" type="button" onclick="sekarangKembali()">Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.form-group -->
        <div class="form-group margin-b-5 margin-t-5">
            <label for="nama" class="col-sm-4">Catatan Pengembalian</label>
            <div class="col-sm-8">
                <textarea class="form-control input-pengembalian" name="kembali_catatan" id="kembali_catatan" placeholder="Catatan pengembalian" value="" autocomplete="off"></textarea>
            </div>
        </div>
        <!-- /.form-group -->
    </form>
</div>
<div style="border-bottom:1px solid #00c0ef;margin:8px 0px;"></div>
<div>
    <div class='row'>
        <div class='col-md-4 text-right'><b>Barang</b></div>
        <div class='col-md-8'>: <b>{{$barang->namabarang}}</b></div>
    </div>
    <div class='row'>
        <div class='col-md-4 text-right'>Nama Peminjam</div>
        <div class='col-md-8'>: {{$peminjaman->nama}}</div>
    </div>
    <div class='row'>
        <div class='col-md-4 text-right'>Tanggal Peminjaman</div>
        <div class='col-md-8'>: {{$peminjaman->tgl_pinjam}}</div>
    </div>
    <div class='row'>
        <div class='col-md-4 text-right'>Durasi Peminjaman</div>
        <div class='col-md-8'>: {{$lama}}</div>
    </div>
    <div class='row'>
        <div class='col-md-4 text-right'>Bukti</div>
        <div class='col-md-8'>: {{$peminjaman->bukti}} ({{$peminjaman->nomorbukti}})</div>
    </div>
    <div class='row'>
        <div class='col-md-4 text-right'>Label</div>
        <div class='col-md-8'>: {{$peminjaman->label}}</div>
    </div>
    <div class='row'>
        <div class='col-md-4 text-right'>Catatan</div>
        <div class='col-md-8'>: {{$peminjaman->catatan}}</div>
    </div>
</div>
<script>
$(document).ready(function(){
    $('#kembali').datetimepicker({
        locale: 'id',
        format:"YYYY-MM-DD HH:mm:ss"
    });
});
</script>