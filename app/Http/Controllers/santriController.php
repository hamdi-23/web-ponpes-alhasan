<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\jobModel;
use App\Models\ortuModel;
use App\Models\datasantri;
use App\Models\santriModel;
use Illuminate\Http\Request;
use PHPUnit\Util\Xml\Validator;
use Illuminate\Support\Facades\DB;


class santriController extends Controller
{
    public function index(Request $request)
    {
        $paginate = 10;
        $dataSantri = DB::table('santri_models')->paginate($paginate);
        $activeSantri = 'active';
        return view('santri.index_santri', [
            'dataSantri' => $dataSantri,
            'activeSantri' => $activeSantri
        ]);
    }

    public function create()
    {
        $datajobs = DB::table('data_jobs')->get();
        $activeSantri = 'active';

        return view('santri.create_santri', compact('activeSantri', 'datajobs'));
    }

    public function store(Request $request)
    {
        $santri = $request->all();
        $rules = [
            'name' => 'required|min:2',
            'gender' => 'required',
            'date_born' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'size_jas' => 'required',
        ];

        $santri = new santriModel();
        $santri->name = $request->name;
        $santri->date_born = $request->date_born;
        $santri->gender = $request->gender;
        $santri->phone = $request->phone;
        $santri->size_jas = $request->size_jas;
        // return $santri;
        $santri->save();

        return redirect()->route('santri.index');
    }

    public function edit($id)
    {

        $edit = santriModel::findOrFail($id);
        $activeSantri = 'active';
        return view('santri.edit_santri', compact('edit', 'activeSantri'));
    }
    public function update(Request $request, $id)
    {
        $data = santriModel::find($id);
        $data->update($request->all());

        return redirect()->route('santri.index');
    }
    public function delete($id)
    {
        $data = santriModel::find($id);
        $data->delete();

        return redirect()->route('santri.index');
    }
}
