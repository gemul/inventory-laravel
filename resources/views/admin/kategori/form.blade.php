<div class="col-md-7">
    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('kode') ? ' has-error' : '' }}">
            <label for="kode">Kode</label>
            <input type="text" class="form-control" name="kode" placeholder="Kode" value="{{ old('kode', $record->kode) }}" required>

            @if ($errors->has('kode'))
                <span class="help-block">
                    <strong>{{ $errors->first('kode') }}</strong>
                </span>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <!-- /.col-md-12 -->
    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('nama') ? ' has-error' : '' }}">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ old('nama', $record->nama) }}" required>

            @if ($errors->has('nama'))
                <span class="help-block">
                    <strong>{{ $errors->first('nama') }}</strong>
                </span>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <!-- /.col-md-12 -->

</div>
<!-- /.col-md-7 -->


</div>
<!-- /.col-md-5 -->
