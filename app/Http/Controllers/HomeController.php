<?php

namespace App\Http\Controllers;

use App\Ruangan;
use Illuminate\Http\Request;

class HomeController extends BaseController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ruangan::orderBy('updated_at','DESC')
            ->paginate(10);
        return view('app.dashboard',compact('data'));
    }
}

