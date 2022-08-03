<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Size;
use Illuminate\Http\Request;

class SizeController extends BackendController
{

    public function view()
    {
        $sizes = Size::all();
        return view($this->backendsetupPath.'add_size',compact('sizes'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
//        $request->validate([
//        'size' => 'required|unique:sizes',
//    ]);
        $size=new Size();
        $size->title=$request->size;
        $size->save();
        return redirect()->back()->with('success','Size Added Successfully');
    }

    public function delete($id){
        $size = Size::findOrFail($id);
        $size->delete();
        return redirect()->back()->with('success','Size Deleted Successfully');
    }
}
