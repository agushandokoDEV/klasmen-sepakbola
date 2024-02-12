<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Klasmen;

class KlasmenController extends Controller
{
    public function indexPage()
    {
        $data['list']=Klasmen::with(['club'])->orderBy('total_point','desc')->get();
        return view('admin.pages.klasmen.index',$data);
    }
}
