<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KlubController extends Controller
{
    public function indexPage()
    {
        $data['list']=Club::orderBy('name','asc')->get();
        return view('admin.pages.klub.index',$data);
    }

    public function addPage()
    {
        return view('admin.pages.klub.add');
    }

    public function add(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required','unique:club,name'],
        ]);
        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $user = new Club();
        $user->name = ucwords($request->name);
        $user->city = ucwords($request->city);
        $user->save();

        return redirect('/klub')->with(['success' => 'User ' . $request->name . ' berhasil ditambahkan']);
    }
}
