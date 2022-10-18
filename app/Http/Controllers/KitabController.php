<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KitabController extends Controller
{
    public function index()
    {
        $activekitab = 'active';
        $dataKitab = DB::table('data_kitab')->paginate(10);
        // dd($dataKitab);
        return view('kitab.index_kitab', compact('dataKitab', 'activekitab'));
    }

    public function create()
    {

        $activeKitab = 'active';
        return view('kitab.create_kitab', compact('activeKitab'));
    }

    public function store(Request $request)
    {
        $kitab = $request->all();
        $rules = [
            'name_kitab' => 'required|min:2',
            'capter' => 'required',

        ];
        $kitab = DB::table('data_kitab')->insert([
            'name_kitab' => $request->name_kitab,
            'capter' => $request->capter,
        ]);
        return redirect()->route('kitab.index', compact('kitab'));
    }


    public function edit($id)
    {
        $data = DB::table('data_kitab')->get();
        $activeKitab = 'active';
        return view('kitab.edit_kitab', compact('data', 'activeKitab',));
    }
}
