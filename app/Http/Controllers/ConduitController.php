<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conduit;

class ConduitController extends Controller
{
    public function index()
    {

        dd('test');

        //Eloquent（エロクアント）
        $values = Conduit::all();//全権取得

        //dd($values);

        return view('conduits.conduit', compact('values'));
    }

}
