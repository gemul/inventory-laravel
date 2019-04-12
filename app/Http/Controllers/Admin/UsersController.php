<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Utils;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\Controllers\ResourceController;

class UsersController extends Controller
{
    use ResourceController;

    /**
     * @var string
     */
    protected $resourceAlias = 'admin.users';

    /**
     * @var string
     */
    protected $resourceRoutesAlias = 'admin::users';

    /**
     * Fully qualified class name
     *
     * @var string
     */
    protected $resourceModel = User::class;
    protected $primaryKey = 'iduser';
    protected $hakAkses = Array(
        'index'=>'admin',
        'add'=>'user-entry',
        'edit'=>'user-entry',
        'delete'=>'user-entry',
    );

    /**
     * @var string
     */
    protected $resourceTitle = 'Pengguna';

    /**
     * Used to validate store.
     *
     * @return array
     */
    private function resourceStoreValidationData()
    {
        return [
            'rules' => [
                'nama' => 'required|min:3|max:255',
                'username' => 'required|max:255|unique:user,username',
                'password' => 'required|confirmed|min:6',
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
                'nama' => 'required|min:3|max:255',
                'username' => 'required|max:255|unique:user,username,'.$record->iduser,
                'password' => 'nullable|confirmed|min:6',
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
        $values['nama'] = $request->input('nama', '');
        $values['username'] = $request->input('username', '');
        //$values['is_admin'] = $request->input('is_admin', '0');
        // if ($record && Auth::user()->iduser == $record->iduser) {
        //     $values['is_admin'] = Auth::user()->is_admin;
        // }
        // If creating user or providing password.
        $password = $request->input('password', null);
        if ($creating || !empty($password)) {
            $values['password'] = $password;
        }

        return $values;
    }

    private function alterValuesToSave(Request $request, $values)
    {
        if (array_key_exists('password', $values)) {
            if (!empty($values['password'])) {
                $values['password'] = Hash::make($values['password']);
            } else {
                unset($values['password']);
            }
        }

        return $values;
    }

    /**
     * @param $record
     * @return bool
     */
    private function checkDestroy($record)
    {
        if (Auth::user()->iduser == $record->iduser) {
            flash()->error('You can not delete your own user.');

            return false;
        }

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
                $query->where('nama', 'like', "%$search%")
                    ->orWhere('username', 'like', "%$search%");
            });
        })->paginate($perPage);
    }
}
