<?php

namespace App\Http\Controllers\Admin;

use App\Model\Brand;
use App\Model\Color;
use App\Model\Image;
use App\Model\Product;
use App\Model\Size;
use App\Model\Stock;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends BackendController
{
    protected $category;

    public function __construct(CategoryRepository $category)
    {
        parent::__construct();
        $this->category = $category;
    }

    public function add_product(Request $request)
    {
        if ($request->isMethod('get')) {
            $pro = Product::all();
            $size = Size::all();
            $brand = Brand::all();
            $color = Color::all();
            return view($this->backendproductPath . 'add_product', compact('size', 'brand', 'color'));
        }
    }

    public function store_product(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                // 'product_name' => 'required|unique:products,product_name',
                // 'price' => 'required|numeric',
                // 'selling_price' => 'required|numeric',
                // 'description' => 'required',
                // 'category' => 'required',
                // 'size_type' => 'required',
                // 'is_special' => 'required',
                // 'on_sale' => 'required',
                // 'is_featured' => 'required',
                // 'is_popular' => 'required',
                // 'image' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'errors' => $validator->errors()->all()
                ]);
            }
            try {
                // dd($request->all());
                $product = new Product();
                $product->product_name = $request->product_name;
                $product->price = $request->price;
                $product->discount_price = $request->selling_price;
                $product->wholesale_price = $request->wholesale_price;
                $product->short_description = $request->description;
                $product->long_description = $request->long_description;
                $product->status = $request->status;
                $product->is_featured = $request->is_featured;
                $product->is_popular = $request->is_popular;
                $product->is_special = $request->is_special;
                $product->on_sale = $request->on_sale;
                $product->sku = $request->sku;
//            $color = implode(',', $request->color);
//            $product->color = $color;
                $product->video = $request->video;
                $product->brand_id = $request->brand;
                $product->size_variation = $request->size_type;
                if ($request->hasFile('audio')) {
                    $image = $request->file('audio');
                    $name = time() . '.' . $image->getClientOriginalExtension();
                    $destinationPath = public_path('/audio/');

                    $image->move($destinationPath, $name);
                    $product['audio'] = $name;
                }
                $product->save();
                //  category pivot table ma
                $product->categories()->attach($request->category);
                //color stock pivot table
                if ($request->size_type == 0) {
                    // if (isset($request->color_stocks)) {
                    //     // for ($i = 0; $i < count($request->color_stocks); $i++) {
                    //     //     $product->colorstocks()->attach( ['stock' => $request->color_stocks[$i]]);
                    //     // }

                    // }
                    $product->colorstocks()->attach($request->color_stocks);
                    $product->save();
                } else {
                    // size stock insert pivot table//

                    if (isset($request->size)) {
                        $keys = array_keys($request->size);

                        foreach ($keys as $key) {
                            $stock = new Stock();
                            $stock->product_id = $product->id;
                            $stock->size_id = $request->size[$key];
                            $stock->color_id = $request->color[$key];
                            $stock->stock = $request->size_stocks[$key];
                            $stock->save();
                        }
                    }
                }
//            seos//
                if (($request->seo_keyword) && ($request->seo_description)) {
                    $product->seo()->create([
                        'seo_keyword' => $request->seo_keyword,
                        'seo_description' => $request->seo_description,
                    ]);
                }

                //specifications table ma gayo from product controller
                if (isset($request->title)) {
                    $title = $request->title;
                    $specification = $request->description1;
                    $keys = array_keys($title);
                    foreach ($keys as $key) {
                        $product->descriptions()->create([
                            'title' => $title[$key],
                            'description' => $specification[$key],
                        ]);
                    }

                }

                //insertion to image database
                if ($request->hasFile('image')) {
                    $counter = 1;
                    foreach ($request->file('image') as $image) {
                        $picture = new Image();
                        $filename = time() . rand(100, 999) . '.' . $image->getClientOriginalExtension();
                        $upload_path = base_path('/public/images/products/');
                        $db_filename = $upload_path . $filename;
                        $image->move($upload_path, $filename);
                        $picture->image = $filename;
                        $picture->product_id = $product->id;

                        if ($request->is_main == $counter) {
                            $picture->is_main = '1';
                        } else {
                            $picture->is_main = '0';
                        }
                        $counter = $counter + 1;

                        $picture->save();
                    }
                }

            } catch (\Exception $e) {
                throw new \PDOException('error in saving name' . $e->getMessage());
            }
            return response()->json(['status' => 'success', 'message' => 'Product Added Successfully']);

        }
        return false;

    }

    public function show_product(Request $request)
    {

        $product = Product::where('slug', '=', $request->slug)->first();

        return view($this->backendproductPath . 'single_product', compact('product'));
    }

    public function all_product(Request $request)
    {
        $products = Product::all();
        $img = new Product();
        return view($this->backendproductPath . 'all_products', compact('products', 'img'));
    }

    public function edit_product(Request $request)
    {
        if ($request->isMethod('get')) {
            $product = Product::where('id', '=', $request->id)->first();
            $size = Size::all();
            $brand = Brand::all();
            $color = Color::all();
            return view($this->backendproductPath . 'edit_product', compact('product', 'size', 'brand', 'color'));
        }
        if ($request->isMethod('post')) {
            if ($request->ajax()) {
                $validator = Validator::make($request->all(), [
                    'product_name' => 'required|unique:products,product_name,' . $request->id,
                    'price' => 'required',
                    'selling_price' => 'required',
                    'description' => 'required',
                    'category' => 'required',
//                    'size_type' => 'required'

                ]);
                if ($validator->fails()) {
                    return response()->json([
                        'errors' => $validator->errors()->all()
                    ]);
                }
                $product = Product::findorfail($request->id);
//                dd($product);
                $product->product_name = $request->product_name;
                $product->price = $request->price;
                $product->discount_price = $request->selling_price;
                $product->short_description = $request->short_description;
                $product->long_description = $request->long_description;
                $product->status = $request->status;
                $product->is_featured = $request->is_featured;
                $product->is_popular = $request->is_popular;
                $product->is_special = $request->is_special;
                $product->on_sale = $request->on_sale;
                $product->sku = $request->sku;
                $product->video = $request->video;
                $product->brand_id = $request->brand;
                $product->size_variation = $product->size_variation;
//                if ($request->hasFile('audio')) {
////                    $this->delete_file($request->id);
//                    $image = $request->file('audio');
//                    $name = time() . '.' . $image->getClientOriginalExtension();
//                    $destinationPath = public_path('/audio/');
//
//                    $image->move($destinationPath, $name);
//                    $product['audio'] = $name;
//                }
                $product->save();
                //  category pivot table ma
                $product->categories()->sync($request->category);
//                //color stock pivot table
                if ($product->size_variation == 0) {
                    if (isset($request->free_size_color)) {
//                        dd($request->free_size_color);
                        for ($i = 0; $i < count($request->free_size_color); $i++) {
                            $save = DB::table('color_stocks')->updateOrInsert(['product_id' => $product->id, 'color_id' => $request->free_size_color[$i]], ['stock' => $request->color_stocks[$i]]);
//                            $product->colorstocks()->sync([$request->free_size_color[$i] => ['stock' => $request->color_stocks[$i]]]);
                        }

                    }
                    $product->save();
                } else {
                    // size stock insert pivot table//
//dd($request->size);
                    if (isset($request->size)) {
                        for ($i = 0; $i < count($request->size); $i++) {
                            $save = DB::table('stocks')->updateOrInsert(['product_id' => $product->id, 'size_id' => $request->size[$i]], ['stock' => $request->size_stocks[$i], 'color_id' => $request->color[$i]]);
                        }
                    }
                }
//            seos//
//                if(($request->seo_keyword) && ( $request->seo_description)) {
//                    dd('ok');
//                    $product->seo()->update([
//                        'seo_keyword' => $request->seo_keyword,
//                        'seo_description' => $request->seo_description,
//                    ]);
//                }

                //specifications table ma gayo from product controller
                if (isset($request->title)) {
                    $title = $request->title['title'];
                    $description = $request->description['desc'];
                    $keys = array_keys($title);
                    foreach ($keys as $key) {

                        $product->descriptions()->updateorcreate(['product_id' => $request->id, 'id' => $key], [
                            'title' => $title[$key],
                            'description' => $description[$key]
                        ]);
                    }

                }

                //insertion to image database
                if ($request->hasFile('image')) {
                    $counter = 1;
                    foreach ($request->file('image') as $image) {
                        $picture = new Image();
                        $filename = time() . rand(100, 999) . '.' . $image->getClientOriginalExtension();
                        $upload_path = base_path('/public/images/products/');
                        $db_filename = $upload_path . $filename;
                        $image->move($upload_path, $filename);
                        $picture->image = $filename;
                        $picture->product_id = $product->id;

                        if ($request->is_main == $counter) {
                            $picture->is_main = '1';
                        } else {
                            $picture->is_main = '0';
                        }
                        $counter = $counter + 1;

                        $picture->save();
                    }
                }

                return response()->json(['status' => 'success', 'message' => 'Product Updated Successfully']);
            }

        }
    }

//    public function delete_file($id)
//    {
//        $findData = Product::findorfail($id);
//        $fileName = $findData->audio;
//        $deletePath = public_path('audio/' . $fileName);
//        if (file_exists($deletePath) && is_file($deletePath)) {
//            unlink($deletePath);
//        }
//        return true;
//    }

    public function delete_product(Request $request)
    {
        $id = $request->id;
//        dd($id);
        $product = Product::findorfail($id);
        foreach ($product->images as $image) {
            $filename = $image->image;
            $deletePath = public_path('images/products/' . $image);
            if (file_exists($deletePath) && is_file($deletePath)) {
                unlink($deletePath);
            }
            $image->delete();
        }

//        $product->colorstocks()->delete();
//        $product->seo()->delete();
//        $product->orderDetails()->delete();
        $product->reviews()->delete();
//        $product->wishlists()->delete();
        $product->categories()->detach();
        $product->delete();
        return redirect()->back()->with('success', 'Product Deleted Successfully');
    }


    public function change_main($id)
    {
        $change = Image::findOrFail($id);
        $images = Image::where('product_id', $change->product_id)->get();
        foreach ($images as $image) {
            if ($image->id == $change->id) {
                $image->is_main = 1;
            } else {
                $image->is_main = 0;
            }
            $image->save();
        }
        return response()->json(['status' => 'success', 'message' => 'Main image changed successfully']);
    }

    public function delete($id)
    {
        $image = Image::findOrFail($id);
        $filename = $image->image;
        unlink(public_path() . '/images/products/' . $filename);
        $image->delete();
        $images = Image::where('product_id', $image->product_id)->first()->update(['is_main' => 1]);
        return response()->json(['status' => 'success', 'message' => 'Image has been deleted successfully!']);

    }

    public function stock_delete($id)
    {
        $find= DB::table('color_stocks')->where('id',$id)->delete();
        return response()->json(['status' => 'success', 'message' => 'Stock has been deleted successfully!']);
    }


}
