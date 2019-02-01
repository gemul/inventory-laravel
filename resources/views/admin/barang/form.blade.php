<div class="col-md-7">
    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('kategori') ? ' has-error' : '' }}">
            <label for="kode">Kategori</label>
            <select class='form-control' name='idkategori' >
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
    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('namabarang') ? ' has-error' : '' }}">
            <label for="namabarang">Namabarang</label>
            <input type="text" class="form-control" name="namabarang" placeholder="Namabarang" value="{{ old('namabarang', $record->namabarang) }}" required>

            @if ($errors->has('namabarang'))
                <span class="help-block">
                    <strong>{{ $errors->first('namabarang') }}</strong>
                </span>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('spesifikasi') ? ' has-error' : '' }}">
            <label for="spesifikasi">spesifikasi</label>
            <textarea class="form-control" name="spesifikasi" placeholder="spesifikasi">{{ old('spesifikasi', $record->spesifikasi) }}</textarea>

            @if ($errors->has('spesifikasi'))
                <span class="help-block">
                    <strong>{{ $errors->first('spesifikasi') }}</strong>
                </span>
            @endif
        </div>
        <!-- /.form-group -->
    </div>
    <div class="col-md-12">
        <div class="form-group margin-b-5 margin-t-5{{ $errors->has('catatan') ? ' has-error' : '' }}">
            <label for="catatan">catatan</label>
            <textarea class="form-control" name="catatan" placeholder="catatan">{{ old('catatan', $record->catatan) }}</textarea>

            @if ($errors->has('catatan'))
                <span class="help-block">
                    <strong>{{ $errors->first('catatan') }}</strong>
                </span>
            @endif
        </div>
        <!-- /.form-group -->
    </div>

</div>
<!-- /.col-md-7 -->


</div>
<!-- /.col-md-5 -->
