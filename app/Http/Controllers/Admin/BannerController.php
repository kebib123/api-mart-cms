<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BannerModel;

class BannerController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = BannerModel::orderBy('id', 'desc')->get();
        return view($this->backendPagePath . 'banner/index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->backendPagePath . 'banner/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'picture' => 'required',
        ]);


        $req = $request->all();

        if ($request->hasFile('picture')) {
            $image = $request->file('picture');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/banner/');

            $image->move($destinationPath, $name);
            $req['picture'] = $name;
        }
        $data = BannerModel::create($req);
        if ($data) {
            return redirect()->back()->with('success', 'Successfully added.');
        } else {
            return "Error";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BannerModel $bannerModel, $id)
    {
        $data = BannerModel::find($id);
        return view($this->backendPagePath . 'banner/edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $data = BannerModel::find($id);
        $file = $request->file('picture');

        if ($request->hasFile('picture')) {
            // Remove old file if exists
            $data = BannerModel::find($id);
            if (file_exists(public_path('images/banner/' . $data->picture))) {
                unlink('images/banner/' . $data->picture);
            }

            // Upload new file
            $image = $request->file('picture');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/banner/');
            $image->move($destinationPath, $name);
            $data['picture'] = $name;
        }

        $data->title = $request->title;
        $data->caption = $request->caption;
//        $data->content = $request->content;
        $data->link = $request->link;

        $data->save();
        if ($data->save()) {
            return redirect()->back()->with('success', 'Update Successful.');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $data = BannerModel::find($id);

        if (file_exists(public_path('images/banner/' . $data->picture))) {
            unlink('images/banner/' . $data->picture);
        }
        $data->delete();
        return redirect()->back()->with('success', 'Banner Deleted.');
    }
}
