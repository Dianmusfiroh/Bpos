<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class home extends Controller
{
    
    public function index()
    {
        // $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        // $booths = $this->repository->all();
        // $modul = $this->modul;
        // if (request()->wantsJson()) {

        //     return response()->json([
        //         'data' => $booths,
        //     ]);
        // }

        $bio = DB::select(DB::raw('SELECT COUNT(id_biodata) id FROM `t_biodata`'));
        $user = DB::select(DB::raw('SELECT COUNT(id_user) id FROM `t_user`'));
        // dd($booths);
        return view('dashboard', compact('bio','user'));
    }

}
