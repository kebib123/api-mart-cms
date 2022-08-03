<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use Illuminate\Http\Request;

class CategoryController extends BackendController
{

    protected $category;

    public function __construct(\App\Repositories\Category\CategoryRepository $category)
    {
        parent::__construct();
        $this->category = $category;
    }

    public function add_category(Request $request)
    {
        if ($request->isMethod('get')) {
            $category = $this->category->getCategories();
            $table = $this->category->getAll();
            return view($this->backendcategoryPath . 'add_category', compact('category', 'table'));
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|unique:categories',
                // 'is_special'=>'required',
//                'image'=>'required'
            ]);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/categories/');

                $image->move($destinationPath, $name);
                $data['image'] = $name;
            }
//            if (isset($request->is_special) && $request->is_special == 1) {
//                $special = Category::where('is_special', 1)->get();
//                if (!empty($special)) {
//                    foreach ($special as $value) {
//                        $find = Category::where('is_special', $value->is_special)->update(['is_special' => 0]);
//                    } 
//                }
//
//            }
            $data['name'] = $request->name;
            $data['parent_id'] = $request->parent_id;
            $data['is_special'] = $request->is_special;
//           dd($request->all());
            $category = Category::create($data);
            return back()->with('success', 'Category added successfully');
        }
    }

    public function delete_file($id)
    {
        $findData = Category::findorfail($id);
        $fileName = $findData->image;
        $deletePath = public_path('images/categories/' . $fileName);
        if (file_exists($deletePath) && is_file($deletePath)) {
            unlink($deletePath);
        }
        return true;
    }

    public function delete_category(Request $request)
    {
        $id=$request->id;
        $category = Category::findOrFail($id);
//        dd($category->children);
        if ($category->products->count() > 0) {
            return redirect()->back()->with('error', 'Delete Products of this Category First');
        }
        if ($category->children->isNotEmpty()) {
            return redirect()->back()->with('error', 'Delete Child Categories First');
        }
        $this->delete_file($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category Deleted!');

    }

    public function edit_category(Request $request)
    {
        if ($request->isMethod('post')) {
            $id = $request->id;

            $data['name'] = $request->name;
            $data['parent_id'] = $request->parent_id;
//            if (isset($request->is_special) && $request->is_special == 1) {
//                $special = Category::where('is_special', 1)->get();
//                if (!empty($special)) {
//                    foreach ($special as $value) {
//                        $find = Category::where('is_special', $value->is_special)->update(['is_special' => 0]);
//                    }
//                }
//            }
            $data['is_special'] = $request->is_special;
            if ($request->hasFile('image')) {
                $this->delete_file($id);
                $image = $request->file('image');
                $name = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/images/categories/');
                $image->move($destinationPath, $name);
                $data['image'] = $name;
            }
            $new = Category::findorfail($id);

            if ($new->update($data)) {
                return redirect()->back()->with('success', 'Category successfully updated');
            }

        }

    }

}
