<div class="table-responsive list-records">
    <table class="table table-hover table-bordered">
        <thead>
            <th style="width:50px;"></th>
            <th>Barang</th>
            <th>Peminjam</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th style="width: 120px;">Aksi</th>
        </thead>
        <tbody>
        @foreach ($records as $record)
            <?php
            $tableCounter++;
            $editLink = route($resourceRoutesAlias.'.edit', $record->$primaryKey);
            $deleteLink = route($resourceRoutesAlias.'.destroy', $record->$primaryKey);
            $formId = 'formDeleteModel_'.$record->$primaryKey;
            $formIdImpersonate = 'impersonateForm_'.$record->$primaryKey;

            $canUpdate = Auth::user()->hakAkses('inventory-alter');
            $canDelete = Auth::user()->hakAkses('inventory-delete');
            $canImpersonate = Auth::user()->can('impersonate', $record);
            ?>
            <tr>
            <!--<td><input type="checkbox" name="ids[]" value="{{ $record->$primaryKey }}" class="square-blue"></td>-->
                <td>
                    @if ($record->kembali == "")
                        <label class="label bg-red">Pinjam</label>
                    @else
                        <label class="label bg-blue">Kembali</label>
                    @endif
                </td>
                <td class="table-text">
                    {{ $record->barang->namabarang }}
                </td>
                <td class="table-text">
                    {{ $record->nama }}
                </td>
                <td>{{ $record->tgl_pinjam }}</td>
                <td>{{ $record->kembali }}</td>
                <!-- we will also add show, edit, and delete buttons -->
                <td>
                    <div class="btn-group">
                        @if ($canUpdate)
                            <a href="{{ $editLink }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                        @endif
                        @if ($canDelete)
                            <a href="#" class="btn btn-danger btn-sm btnOpenerModalConfirmModelDelete"
                            data-form-id="{{ $formId }}"><i class="fa fa-trash-o"></i></a>
                        @endif
                            <a href="" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                    </div>
                    @if ($canDelete)
                        <!-- Delete Record Form -->
                        <form id="{{ $formId }}" action="{{ $deleteLink }}" method="POST"
                              style="display: none;" class="hidden form-inline">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
