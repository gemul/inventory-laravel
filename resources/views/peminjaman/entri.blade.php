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
                            <div class="form-group margin-b-5 margin-t-5{{ $errors->has('kategori') ? ' has-error' : '' }}">
                                <label for="idkategori" class="col-sm-4">Kategori</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name='idkategori' onchange="updateBarang(this);">
                                        <option value="" >Pilih Salah Satu</option>
                                        @foreach ($kategoriList as $kategori)
                                            <option value="{{ $kategori->idkategori }}" >{{ $kategori->nama }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('kategori'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('kategori') }}</strong>
                                        </span>
                                    @endif
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
    </script>
@endsection

{{-- Footer Extras to be Included --}}
@section('footer-extras')
    
@endsection
