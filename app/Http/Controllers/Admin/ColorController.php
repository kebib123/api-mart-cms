<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Color;
use Illuminate\Http\Request;

class ColorController extends BackendController
{
    public function view()
    {
        $colors = Color::all();
        return view($this->backendsetupPath.'add_color',compact('colors'));
    }

    public function store(Request $request)
    {
        $size=new Color();
        $size->title=$request->color;
        $size->save();
        return redirect()->back()->with('success','Color Added Successfully');
    }

    public function delete($id){
        $size = Color::findOrFail($id);
        $size->delete();
        return redirect()->back()->with('success','Color Deleted Successfully');
    }
}
