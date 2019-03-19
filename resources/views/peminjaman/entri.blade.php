<?php
$_pageTitle = "Peminjaman";
$_pageSubtitle = "Entri Peminjaman Barang";
$_formFiles = false;
$_listLink = 'peminjaman.index';
$_createLink = 'peminjaman.index';
$_storeLink = 'peminjaman.index';
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

                <form class="form form-horizontal" role="form" method="POST" action="{{ $_storeLink }}" {!! $_formFiles === true ? 'enctype="multipart/form-data"' : '' !!}>
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
                                    <input type="text" class="form-control" name="namapeminjam" id="nama-peminjam" data-provide="typeahead" placeholder="Nama Peminjam" value="" autocomplete="off" required>
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
                                    <input type="text" class="form-control" name="tgl_pinjam" id="tgl_pinjam" value="" autocomplete="off" required>
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
                            <div class="text-center margin-b-5 margin-t-5">
                                <button class="btn btn-info">
                                    <i class="fa fa-save"></i> <span>Save</span>
                                </button>
                            </div>
                        </div>
                        <!-- /.col-xs-6 -->
                        <div class="col-xs-6">
                            <div class="text-center margin-b-5 margin-t-5">
                                <a href="{{ $_listLink }}" class="btn btn-default">
                                    <i class="fa fa-ban"></i> <span>Cancel</span>
                                </a>
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

                <form class="form" role="form" method="POST" action="{{ $_storeLink }}" {!! $_formFiles === true ? 'enctype="multipart/form-data"' : '' !!}>
                    {{ csrf_field() }}

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
                </form>
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
    });
    
    function loadTabelPeminjaman(){
        $.ajax({
            'url':"{{ route('peminjaman::ajax','tabel-peminjaman') }}",
            'beforesend': function(){
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
    </script>
@endsection

{{-- Footer Extras to be Included --}}
@section('footer-extras')
    
@endsection
