<?php

namespace App\Http\Controllers\Admin;

use App\Kategori;
use App\Utils;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Controllers\ResourceController;

class KategoriController extends Controller
{
    use ResourceController;

    /**
     * @var string
     */
    protected $resourceAlias = 'admin.kategori';

    /**
     * @var string
     */
    protected $resourceRoutesAlias = 'admin::kategori';

    /**
     * Fully qualified class name
     *
     * @var string
     */
    protected $resourceModel = Kategori::class;
    protected $primaryKey = 'idkategori';
    protected $hakAkses = Array(
        'index'=>'inventory-view',
        'add'=>'inventory-entry',
        'edit'=>'inventory-entry',
        'delete'=>'inventory-entry',
    );

    /**
     * @var string
     */
    protected $resourceTitle = 'Kategori Barang';

    /**
     * Used to validate store.
     *
     * @return array
     */
    private function resourceStoreValidationData()
    {
        return [
            'rules' => [
                'kode' => 'required|max:255|unique:kategori,nama',
                'nama' => 'required|max:255|unique:kategori,nama',
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
                'kode' => 'required|max:255|unique:kategori,nama',
                'nama' => 'required|max:255|unique:kategori,nama'.$record->idkategori,
            ],
            'messages' => [],
            'attributes' => [],
        ];
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
        $values['kode'] = $request->input('kode', '');
        $values['nama'] = $request->input('nama', '');

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
        return $this->getResourceModel()::when(! empty($search), function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('kode', 'like', "%$search%")
                    ->orWhere('nama', 'like', "%$search%");
            });
        })->paginate($perPage);
    }
}
