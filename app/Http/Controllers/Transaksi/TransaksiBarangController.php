<?php

namespace App\Http\Controllers\Transaksi;

use App\Transaksi;
use App\Barang;
use App\Kategori;
use App\Utils;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Controllers\TransaksiController;

class TransaksiBarangController extends Controller
{
    use TransaksiController;

    /**
     * @var string
     */
    protected $resourceAlias = 'transaksi.barang';

    /**
     * @var string
     */
    protected $resourceRoutesAlias = 'transaksi::barang';

    /**
     * Fully qualified class name
     *
     * @var string
     */
    protected $resourceModel = Transaksi::class;
    protected $primaryKey = 'idtransaksi';
    protected $hakAkses = Array(
        'index'=>'inventory-view',
        'add'=>'inventory-entry',
        'edit'=>'inventory-entry',
        'delete'=>'inventory-entry',
    );

    /**
     * @var string
     */
    protected $resourceTitle = 'Transaksi Barang';

    /**
     * Used to validate store.
     *
     * @return array
     */
    private function resourceStoreValidationData()
    {
        return [
            'rules' => [
                'idkategori' => 'required',
                'kode' => 'required|max:255',
                'namabarang' => 'required|max:255|unique:barang,namabarang',
            ],
            'messages' => [],
            'attributes' => [],
        ];
    }

    /**
     * Used to validate update.
     *
     * @param $record
     * @return array
     */
    private function resourceUpdateValidationData($record)
    {
        return [
            'rules' => [
                'idkategori' => 'required',
                'kode' => 'required|max:255',
                'namabarang' => 'required|max:255|unique:barang,namabarang,'.$record->idkategori.',idkategori',
            ],
            'messages' => [],
            'attributes' => [],
        ];
    }

    /**
     * Show the form for creating a new resource.
     * override
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->hakAkses($this->hakAkses['add'])){
            $this->authorize('forceFail');
        }
        $class = $this->getResourceModel();
        $kategori = Kategori::get();
        return view($this->filterCreateView('_resources.create'), $this->filterCreateViewData([
            'kategoriList' => $kategori,
            'record' => new $class(),
            'resourceAlias' => $this->getResourceAlias(),
            'resourceRoutesAlias' => $this->getResourceRoutesAlias(),
            'resourceTitle' => $this->getResourceTitle(),
        ]));
    }

    /**
     * Show the form for edit
     * override
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = $this->getResourceModel()::findOrFail($id);

        if(!Auth::user()->hakAkses($this->hakAkses['edit'])){
            $this->authorize('forceFail');
        }
        $pkey='id';
        if(isset($this->primaryKey)){
            $pkey=$this->primaryKey;
        }
        $kategori = Kategori::get();
        return view($this->filterEditView('_resources.edit'), $this->filterEditViewData($record, [
            'kategoriList' => $kategori,
            'primaryKey' => $pkey,
            'record' => $record,
            'resourceAlias' => $this->getResourceAlias(),
            'resourceRoutesAlias' => $this->getResourceRoutesAlias(),
            'resourceTitle' => $this->getResourceTitle(),
        ]));
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @param null $record
     * @return array
     */
    private function getValuesToSave(Request $request, $record = null)
    {
        $creating = is_null($record);
        $values = [];
        $values['idkategori'] = $request->input('idkategori', '');
        $values['kode'] = $request->input('kode', '');
        $values['namabarang'] = $request->input('namabarang', '');

        return $values;
    }

    // private function alterValuesToSave(Request $request, $values)
    // {
    //     if (array_key_exists('password', $values)) {
    //         if (!empty($values['password'])) {
    //             $values['password'] = Hash::make($values['password']);
    //         } else {
    //             unset($values['password']);
    //         }
    //     }

    //     return $values;
    // }

    /**
     * @param $record
     * @return bool
     */
    private function checkDestroy($record)
    {
        // if (Auth::user()->iduser == $record->iduser) {
        //     flash()->error('You can not delete your own user.');

        //     return false;
        // }

        return true;
    }

    /**
     * Retrieve the list of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $perPage
     * @param string|null $search
     * @return \Illuminate\Support\Collection
     */
    private function getSearchRecords(Request $request, $perPage = 15, $search = null)
    {
        // return $this->getResourceModel()::when(! empty($search), function ($query) use ($search) {
        //     $query->where(function ($query) use ($search) {
        //         $query->where('tanggal', 'like', "%$search%")
        //             ->orWhere('catatan', 'like', "%$search%");
        //     });
        // })->paginate($perPage);
        
        return $this->getResourceModel()::when(! empty($search), function ($query) use ($search) {
            $query->join('barang','transaksi.idbarang','=','barang.idbarang')->where(function ($query) use ($search) {
                $query->where('transaksi.tanggal', 'like', "%$search%")
                    ->orWhere('transaksi.catatan', 'like', "%$search%")
                    ->orWhere('barang.namabarang', 'like', "%$search%")
                    ->orWhere('transaksi.lokasi', 'like', "%$search%");
            });
        })->when(isset($request->filter),function($query) use ($request){
            if(isset($request->filter) && $request->filter != 'all'){
                $query->where('jenis','=',$request->filter);
            }
        })->paginate($perPage);
    }

}
