<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bio = DB::select(DB::raw('SELECT COUNT(id_biodata) id FROM `t_biodata`'));
        $user = DB::select(DB::raw('SELECT COUNT(id_user) id FROM `t_user`'));
        return view('dashboard', compact('bio','user'));
    }
}
