<?php

namespace App\Http\Controllers;

use Mapper;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Mapper::map(53.381128999999990000, -1.470085000000040000);

        return view('welcome');
    }
}
