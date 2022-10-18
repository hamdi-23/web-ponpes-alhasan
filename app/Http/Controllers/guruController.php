<?php

namespace App\Http\Controllers;


use Exception;
use App\Models\jobModel;
use App\Models\guruModel;

use Illuminate\Http\Request;
use PHPUnit\Util\Xml\Validator;
use Illuminate\Support\Facades\DB;


class guruController extends Controller
{

    public function index()
    {
        $datajob =  jobModel::select('id', 'name_job')->get();
        $activeGuru = 'active';
        // $dataGuru = DB::table('data_guru')->paginate(10);
        $dataGuru = DB::select("select dg.*, jm.name_job from data_guru dg left join job_models jm on dg.job_id=jm.id");
        // dd($dataGuru);
        return view('guru.index_guru', compact('datajob', 'dataGuru', 'activeGuru'));
    }


    public function create()
    {
        $datajobs = DB::table('job_models')->get();
        $activeGuru = 'active';
        return view('guru.create_guru', compact('activeGuru', 'datajobs'));
    }



    public function store(Request $request)
    {
        $guru = $request->all();
        $rules = [
            'name' => 'required|min:2',
            'gender' => 'required',
            'job' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ];
        $guru = DB::table('data_guru')->insert([
            'name' => $request->name,
            'job_id' => $request->job,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect()->route('guru.index', compact('guru'));
    }



    public function edit($id)
    {
        $datajobs = DB::table('job_models')->get();
        $data = DB::table('data_guru')->where('id', $id)->first();
        // dd($data);
        $activeGuru = 'active';
        return view('guru.edit_guru', compact('data', 'activeGuru', 'datajobs',));
    }


    public function update(Request $request, $id)
    {
        DB::table('data_guru')
            ->where(
                "id",
                $request->id,
            )
            ->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'job_id' => $request->iob,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
        with('Berhasil!!!', 'Cabang Berhasil DI Ubah')->success('Berhasil!!!', 'Cabang Berhasil DI Ubah');
        return redirect()->route('guru.index');
    }




    public function delete($id)
    {
        $data = DB::table('data_guru')->where('id', $id);
        $data->delete();
        return redirect()->route('guru.index');
    }
}
