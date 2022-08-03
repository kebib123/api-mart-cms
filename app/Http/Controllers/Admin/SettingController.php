<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Configuration;
use App\Model\Faq;
use Illuminate\Http\Request;

class SettingController extends BackendController
{

    public function setting_page(Request $request)
    {
        if ($request->isMethod('get')) {

            return view($this->backendPagePath . 'setting');
        }
        if ($request->isMethod('post')) {

//            dd($request->all());
            $inputs = $request->only(
                'about','refund','privacy','twitter_link', 'googleplus_link', 'instagram_link', 'facebook_link', 'contact_no', 'address', 'website', 'email', 'site_title', 'site_description','regulation','recognition','price','link'
            );

            if ($request->hasfile('about_image_1')) {
                $this->delete_file('about_image_1');
                $image = $request->file('about_image_1');
                $ext = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/about/');
                $image->move($destinationPath, $ext);
                $data = $ext;
                $aboutimage = Configuration::updateorcreate(['configuration_key' => 'about_image_1'], ['configuration_value' => $data]);
            }
//
//            if ($request->hasfile('regulation_image')) {
//                $this->delete_regulation('regulation_image');
//                $image = $request->file('regulation_image');
//                $ext = time() . '.' . $image->getClientOriginalExtension();
//                $destinationPath = public_path('images/');
//                $makefile = Image::make($image);
//                $save = $makefile->resize(500, '500', function ($ar) {
//                    $ar->aspectRatio();
//                })->save($destinationPath . '/' . $ext);
//                $data = $ext;
//                $reg_image = Configuration::updateorcreate(['configuration_key' => 'regulation_image'], ['configuration_value' => $data]);
//            }
//
//            if ($request->hasfile('recognition_image')) {
//                $this->delete_regulation('recognition_image');
//                $image = $request->file('recognition_image');
//                $ext = time() . '.' . $image->getClientOriginalExtension();
//                $destinationPath = public_path('images/');
//                $makefile = Image::make($image);
//                $save = $makefile->resize(500, '500', function ($ar) {
//                    $ar->aspectRatio();
//                })->save($destinationPath . '/' . $ext);
//                $data = $ext;
//                $rec_image = Configuration::updateorcreate(['configuration_key' => 'recognition_image'], ['configuration_value' => $data]);
//            }
//
//            if ($request->hasfile('affordable_image')) {
//                $this->delete_regulation('affordable_image');
//                $image = $request->file('affordable_image');
//                $ext = time() . '.' . $image->getClientOriginalExtension();
//                $destinationPath = public_path('images/');
//                $makefile = Image::make($image);
//                $save = $makefile->resize(500, '500', function ($ar) {
//                    $ar->aspectRatio();
//                })->save($destinationPath . '/' . $ext);
//                $data = $ext;
//                $aff_image = Configuration::updateorcreate(['configuration_key' => 'affordable_image'], ['configuration_value' => $data]);
//            }

            foreach ($inputs as $key => $value) {
                $updateorcreate = Configuration::updateorcreate(['configuration_key' => $key], ['configuration_value' => $value]);
            }
            if ($updateorcreate) {
                return redirect()->back()->with('success', 'Settings Saved');
            }
        }
        return false;
    }

    public function delete_file($id)
    {
        $findData = Configuration::where('configuration_key', '=', $id)->first();
        if (!$findData) {
            return true;
        }
        $fileName = $findData->configuration_value;
        $deletePath = public_path('images/about/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            unlink($deletePath);
        }
        return true;
    }

    public function delete_regulation($id)
    {
        $findData = Configuration::where('configuration_key', '=', $id)->first();
        if (!$findData) {
            return true;
        }
        $fileName = $findData->configuration_value;
        $deletePath = public_path('images/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            unlink($deletePath);
        }
        return true;
    }

    public function faq(Request $request)
    {
        if ($request->isMethod('get'))
        {
            $faq=Faq::all();
            return view($this->backendPagePath . 'faq',compact('faq'));
        }

        if ($request->isMethod('post'))
        {
            $request->validate([
               'title'=>'required',
               'description'=>'required'
            ]);
            $faq=new Faq();
            $faq->title=$request->title;
            $faq->description=$request->description;
            if ($faq->save())
            {
                return back()->with('success','Faq added successfully');
            }
        }
    }

}

