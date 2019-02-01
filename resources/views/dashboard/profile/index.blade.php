{{-- Extends Layout --}}
@extends('layouts.backend')

<?php
$_pageTitle = 'User Profile';
$_pageSubtitle = '';
?>

{{-- Breadcrumbs --}}
@section('breadcrumbs')
    {!! Breadcrumbs::render('profile') !!}
@endsection

{{-- Page Title --}}
@section('page-title', $_pageTitle)

{{-- Page Subtitle --}}
@section('page-subtitle', $_pageSubtitle)

{{-- Header Extras to be Included --}}
@section('head-extras')

@endsection

@section('content')

    <div class="row">

        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ App::make('url')->to('/') }}/img/iykwim.jpg" alt="User profile picture">

                    <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                    <p class="text-muted text-center">{{ \App\Utils::getUserRoleLabel() }}</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col-md-3 -->

        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="settings">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('dashboard::profile.update') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                                <label for="inputNama" class="col-sm-2 control-label">Nama</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputNama" placeholder="Nama" value="{{ old('nama', Auth::user()->nama) }}" name="nama">

                                    @if ($errors->has('nama'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('nama') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="inputusername" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputusername" placeholder="username" value="{{ old('username', Auth::user()->username) }}" name="username">
                                </div>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="inputPassword" class="col-sm-2 control-label">Password</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="inputConfirmPassword" class="col-sm-2 control-label">Confirm Password</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputConfirmPassword" placeholder="Confirm Password" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->

    </div>
    <!-- /.row -->
@endsection

{{-- Footer Extras to be Included --}}
@section('footer-extras')

@endsection
