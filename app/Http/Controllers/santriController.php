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
        $dataSantri = DB::select("  SELECT sm.*, do.id AS id_ortu, do.father,do.mother, do.father_job, do.mother_job, 
        do.address1, do.phone_number FROM santri_models sm
        LEFT JOIN data_ortu DO ON sm.nis=do.nis");
        $activeSantri = 'active';
        return view('santri.index_santri', compact('dataSantri', 'activeSantri'));
    }


    public function create()
    {
        $datajobs = DB::table('job_models')->get();
        $activeSantri = 'active';
        return view('santri.create_santri', compact('activeSantri', 'datajobs'));
    }


    public function store(Request $request)
    {
        $date = date('Y');
        $nis = rand(00, 99) . preg_replace('[-]', "", $request->date_born) . substr($date, -2);
        $request->validate([
            'name' => 'required|min:2',
            'gender' => 'required',
            'date_born' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'size_jas' => 'required',
            'father' => 'required|min:2',
            'mother' => 'required|min:2',
            'address1' => 'required',
            'phone_number' => 'required',
        ]);
        $name = $request->name;
        $date_born = $request->date_born;
        $gender = $request->gender;
        $phone = $request->phone;
        $school = $request->school;
        $size_jas = $request->size_jas;
        $address = $request->address;

        DB::table('santri_models')->insert([
            'nis' => $nis,
            'name' => strtoupper($name),
            'date_born' => $date_born,
            'gender' => $gender,
            'phone' => $phone,
            'school' => $school,
            'size_jas' => $size_jas,
            'address' => $address,
        ]);

        $data = DB::table('data_ortu')->insert([
            'nis' => $nis,
            'father' => $request->father,
            'mother' => $request->mother,
            'father_job' => $request->father_job,
            'mother_job' => $request->mother_job,
            'phone_number' => $request->phone_number,
            'address1' => $request->address1,
        ]);


        return redirect()->route('santri.index');
    }


    public function edit($nis)
    {
        // dd($nis);
        $datajobs = DB::table('job_models')->get();
        $data = DB::select("SELECT sm.nis,sm.name,sm.date_born,sm.gender,sm.school,sm.phone,sm.size_jas,sm.address
        ,do.id AS id_ortu, do.father,do.mother, do.father_job, do.mother_job, 
        do.address1, do.phone_number FROM santri_models sm
        LEFT JOIN data_ortu DO ON sm.nis=do.nis where sm.nis = '$nis'");
        $activeSantri = 'active';
        return view('santri.edit_santri', compact('data', 'activeSantri', 'datajobs'));
    }


    public function update(Request $request, $nis)

    {
        dd($request);
        DB::table('santri_models')
            ->where(
                "nis",
                $request->nis,
            )
            ->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'date_born' => $request->date_born,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);


        return redirect()->route('santri.index');
    }


    public function delete($nis)
    {
        DB::table('santri_models')->where('nis', $nis)->delete();
        DB::table('data_ortu')->where('nis', $nis)->delete();
        return redirect()->route('santri.index');
    }
}
