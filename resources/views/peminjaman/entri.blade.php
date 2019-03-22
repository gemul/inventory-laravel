<?php
$_pageTitle = "Peminjaman";
$_pageSubtitle = "Entri Peminjaman Barang";
$_formFiles = false;
$_listLink = 'peminjaman.index';
$_createLink = 'peminjaman.index';
$_storeLink = 'peminjaman.store';
?>

{{-- Extends Layout --}}
@extends('layouts.backend')

{{-- Page Title --}}
@section('page-title', "Peminjaman")

{{-- Page Subtitle --}}
@section('page-subtitle', "Entri Peminjaman Barang")

{{-- Header Extras to be Included --}}
@section('head-extras')

@endsection

@section('content')


    <div class="row">
        <div class="col-xs-6">

            <!-- Edit Form -->
            <div class="box box-info" id="wrap-edit-box">

                <form class="form form-horizontal" role="form" method="POST" id="formPeminjaman">
                    {{ csrf_field() }}

                    {{ redirect_back_field() }}

                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Data Peminjaman</h3>

                        <div class="box-tools">
                        </div>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="form-group margin-b-5 margin-t-5">
                                <label for="idbarang" class="col-sm-4">Barang</label>
                                <div class="col-sm-8">
                                    <select class='form-control' name='idbarang' required='required' id='idbarang'>
                                    </select>
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group margin-b-5 margin-t-5">
                                <label for="nama" class="col-sm-4">Nama Peminjam</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama" id="nama-peminjam" data-provide="typeahead" placeholder="Nama Peminjam" value="" autocomplete="off" required>
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group margin-b-5 margin-t-5">
                                <label for="bukti" class="col-sm-4">Bukti</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="bukti" id="bukti" placeholder="Bukti (KTP,KTM,Kartu Pelajar,Kartu Peminjaman)" value="" required>
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group margin-b-5 margin-t-5">
                                <label for="bukti" class="col-sm-4">No Bukti</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nomorbukti" id="nomorbukti" placeholder="No Bukti (KTP,KTM,Kartu Pelajar,Kartu Peminjaman)" value="" autocomplete="off" required>
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group margin-b-5 margin-t-5">
                                <label for="tgl_pinjam" class="col-sm-4">Tanggal</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="tgl_pinjam" id="tgl_pinjam" value="" autocomplete="off" required>
                                        <div class="input-group-btn">
                                            <button class="btn btn-info btn-flat" type="button" onclick="sekarang()">Sekarang</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group margin-b-5 margin-t-5">
                                <label for="label" class="col-sm-4">Label</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="label" id="label" placeholder="opsional" value="" autocomplete="off">
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group margin-b-5 margin-t-5">
                                <label for="Catatan" class="col-sm-4">Catatan</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="catatan" id="catatan" placeholder="opsional"></textarea>
                                </div>
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer clearfix">
                        <!-- Edit Button -->
                        <div class="col-xs-6">
                            <div class="margin-b-5 margin-t-5" id="statusSimpanPeminjaman">
                                
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="text-right margin-b-5 margin-t-5">
                                <button class="btn btn-info">
                                    <i class="fa fa-save"></i> <span>Save</span>
                                </button>
                            </div>
                        </div>
                        <!-- /.col-xs-6 -->
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
            <!-- /End Edit Form -->
        </div>

        <div class="col-xs-6">

            <!-- Edit Form -->
            <div class="box box-info" id="wrap-edit-box">

                <div class="box-header with-border">
                    <h3 class="box-title">Daftar Peminjaman</h3>

                    <div class="box-tools">
                        <button class="btn btn-sm btn-info margin-r-5 margin-l-5" type='button' onclick='loadTabelPeminjaman()'>
                            <i class="fa fa-refresh"></i> <span>Refresh</span>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nama Peminjam</th>
                                <th>Barang</th>
                                <th>Tgl Pinjam</th>
                                <th>Lama</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="dataPeminjam">
                            <tr>
                                <td colspan='5' style='text-align:center'>Tidak ada data yg ditampilkan</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->

                <div class="box-footer clearfix">
                    <!-- Edit Button -->
                    <div class="col-xs-12">
        
                    </div>
                    <!-- /.col-xs-6 -->
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
            <!-- /End Edit Form -->
        </div>
    </div>
    <!-- /.row -->
    <script>
    $(document).ready(function(){
        $('#idbarang').select2({
            ajax: {
                delay: 250, // wait 250 milliseconds before triggering the request
                quietMillis: 200,
                url: "{{ route('peminjaman::ajax','select-barang') }}",
                dataType: 'json',
                data: function (params) {
                    var query = {
                        search: params.term,
                        page: params.page || 1
                    }
                    return query;
                },
                cache: true
            },
            language: {
                noResults: function (params) {
                    return "Tidak ditemukan.";
                }
            }
        });

        //typeahead
        $('#nama-peminjam').typeahead({
            source: function (query, process) {
                return $.getJSON("{{ route('peminjaman::ajax','typeahead-nama') }}", 
                    { query: query }, 
                    function (data) {
                        return process(data.options);
                    }
                );
            },
            updater:function(data){
                $('#bukti').val(data.bukti);
                $('#nomorbukti').val(data.nomorbukti);
                return data.name;
            },
            changeInputOnSelect:true
        });
        // $('#nama-peminjam').typeahead({
        // remote: "{{ route('peminjaman::ajax','typeahead-nama') }}",
        // limit: 10                                                                   
        // });
        // $('#nama-peminjam').typeahead({
        //   source: [
        //         {id: "id1", name: "jQuery"},
        //         {id: "id2", name: "Script"},
        //         {id: "id3", name: "Net"}
        //     ]                                                                  
        // });
        $('#tgl_pinjam').datetimepicker({
            locale: 'id',
            format:"YYYY-MM-DD HH:mm:ss"
        });

        // form registration
        $('#formPeminjaman').on('submit', function(e){
            e.preventDefault();
            simpanPeminjaman(this);
        });

        loadTabelPeminjaman();
    });
    
    function loadTabelPeminjaman(){
        $.ajax({
            'url':"{{ route('peminjaman::ajax','tabel-peminjaman') }}",
            'beforeSend': function(){
                $("#dataPeminjam").html("<tr><td colspan='5' style='text-align:center'>Tidak ada data yg ditampilkan</td></tr>");
            },
            'success':function(res){
                $("#dataPeminjam").html(res);
                $('[data-toggle="tooltip"]').tooltip();
            },
            'error':function(e){
                $("#dataPeminjam").html("<tr><td colspan='' style='text-align:center'>Terjadi kesalahan. Tidak ada data yg ditampilkan</td></tr>");
            }
        });
    }
    
    //-------------------list barang
    var listBarang;
    function updateBarang(kategori){
        if(kategori.value==''){
            $('#input-barang-status').show().html("Pilih kategori barang.");
            $('#input-barang').hide();
        }else{
            $.ajax({
                url:'transaksi/peminjaman/listbarang/'+kategori.value,
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
    
    function sekarang(){
        $('#tgl_pinjam').val(moment().format("YYYY-MM-DD HH:mm:ss"));
    }
    function sekarangKembali(){
        $('#kembali').val(moment().format("YYYY-MM-DD HH:mm:ss"));
    }

    // simpan peminjaman
    function simpanPeminjaman(form){
        var formData=$(form).serialize();
        $.ajax({
            type: "POST",
            url: "{{ route('peminjaman::simpan') }}",
            data: formData,
            dataType: "json",
            beforeSend:function(){
                $('#statusSimpanPeminjaman').html("Menyimpan peminjaman");
                // disable input
                $('#formPeminjaman').find('input:text, input:password, select, textarea').prop("readonly",true);
            },
            success: function(data) {
                if(data.status === undefined){
                    //malformed json reply
                    $('#statusSimpanPeminjaman').html("Terjadi kesalahan ketika menyimpan.");
                    notifikasi("Terjadi kesalahan sistem ketika menyimpan data","danger");
                }else if(data.status == "ok"){
                    //ok
                    $('#statusSimpanPeminjaman').html("Peminjaman berhasil disimpan.");
                    notifikasi("Peminjaman berhasil disimpan.","success");
                    // clear input
                    $('#formPeminjaman').find('input:text, input:password, select, textarea').val('');
                }else if(data.status == "fail"){
                    //sum ting-wong
                    $('#statusSimpanPeminjaman').html("Kesalahan : "+data.message);
                    notifikasi("Kesalahan : "+data.message,"danger");
                }
                // enable input
                $('#formPeminjaman').find('input:text, input:password, select, textarea').prop("readonly",false);
                loadTabelPeminjaman();
            },
            error: function(xhr,status,err) {
                var result=JSON.parse(xhr.responseText);
                if(result.errors!==undefined){
                    var kesalahan=result.errors[Object.keys(result.errors)[0]][0];
                    notifikasi("Kesalahan : "+kesalahan,"danger");
                }else{
                    notifikasi("Terjadi kesalahan koneksi","danger");
                }
                $('#formPeminjaman').find('input:text, input:password, select, textarea').prop("readonly",false);
            }
        });
        return false;
    }
    function pengembalian(id){
        $.ajax({
            'url':"{{ route('peminjaman::ajax','pengembalian') }}",
            'type':'get',
            'data':{'id':id},
            'beforeSend': function(){
                $('.btn-kembali').prop('disabled',true);
                $('#modalPengembalian h4.modal-title').html("Memuat data...");
                $('#modalPengembalian div.modal-body').html("").hide();
                $('#modalPengembalian').modal('show');
                $('#button-simpan-pengembalian').hide();
            },
            'success':function(res){
                $('.btn-kembali').prop('disabled',false);
                $('#modalPengembalian h4.modal-title').html("Pengembalian");
                $('#modalPengembalian div.modal-body').html(res).slideDown(400);
                $('#button-simpan-pengembalian').html("<i class='fa fa-fw fa-save'></i>Simpan").show();
            },
            'error':function(e){
                $('.btn-kembali').prop('disabled',false);
                notifikasi("Kesalahan : Kesalahan saat komunikasi data.");
            }
        });
    }
    function simpanPengembalian(){
        var formData=$('#form-pengembalian').serialize();
        $.ajax({
            'url':"{{ route('peminjaman::simpan-pengembalian') }}",
            'type':'post',
            'data':{formData},
            'dataType':'json',
            'beforeSend': function(){
                $('.input-pengembalian').prop('disabled',true);
                $('#button-simpan-pengembalian').html("Menyimpan...");
            },
            'success':function(res){
                if(res.status===undefined){
                    //response with wrong json format
                    $('.input-pengembalian').prop('disabled',false);
                    notifikasi("Kesalahan : Kesalahan saat komunikasi data.",'danger');
                }else if(res.status==1){
                    //response success
                    //clear and hide modal
                    $('#modalPengembalian div.modal-body').html("");
                    $('#modalPengembalian').modal('hide');

                    notifikasi("Pengembalian berhasil disimpan.",'success');
                }else{
                    //response error
                    $('.input-pengembalian').prop('disabled',false);
                    notifikasi("Kesalahan : "+res.message+".");
                }
            },
            'error':function(e){
                $('.input-pengembalian').prop('disabled',false);
                notifikasi("Kesalahan : Kesalahan saat komunikasi data.",'danger');
            },
            'complete':function(){
                $('#button-simpan-pengembalian').html("<i class='fa fa-fw fa-save'></i>Simpan");
            }
        });
    }
    </script>
    <div class="modal fade" id="modalPengembalian">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Pengembalian</h4>
            </div>
            <div class="modal-body">
            
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary" id="button-simpan-pengembalian" onclick="simpanPengembalian()"><i class="fa fa-fw fa-save"></i>Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

{{-- Footer Extras to be Included --}}
@section('footer-extras')
    
@endsection
