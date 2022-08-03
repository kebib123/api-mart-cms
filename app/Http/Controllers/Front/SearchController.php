<?php

namespace App\Http\Controllers\Front;

use App\Model\Brand;
use App\Model\Category;
use App\Model\Product;
use App\Model\Size;
use Illuminate\Http\Request;

class SearchController extends FrontController
{
    public function search_results(Request $request)
    {
        if ($request->ajax()) {
            $all=$request->all();
            $query = $all['query'];

            $result = explode(' ', $query);
//            dd($result);

            $pro = Product::where(function ($query) use ($result) {
                foreach ($result as $search) {
                    $query->where('products.product_name', 'like', '%' . $search . '%');
                }
            });
//            if ($request->has('min_price') || $request->has('max_price')) {
//                $max_price = (int)$request->max_price;
//                $min_price = (int)$request->min_price;
//                $pro->whereBetween('products.price', [$min_price, $max_price]);
//            }
//            if ($request->has('brand')) {
//                $brand = $request->brand;
//                $pro->join('brands', 'brands.id', '=', 'products.brand_id')->whereIn('brands.id', $brand);
//            }
//            if ($request->has('size')) {
//                $pro->join('stocks', 'stocks.product_id', '=', 'products.id')
//                    ->whereIn('stocks.size_id', $request->size)
//                    ->select('products.*')
//                    ->distinct();
//            }
            if ($request->has('value')) {
                if ($request->value == 'new') {
                    $pro->orderby('products.created_at', 'desc');
                }
                if ($request->value == 'low_to_high') {
                    $pro->orderby('products.price', 'asc');
                }
                if ($request->value == 'high_to_low') {
                    $pro->orderby('products.price', 'desc');
                }
                if ($request->value == 'a_to_z') {
                    $pro->orderby('products.product_name', 'asc');
                }
                if ($request->value == 'z_to_a') {
                    $pro->orderby('products.product_name', 'desc');
                }
                if ($request->value == 'popular') {
                    $pro->where('products.is_popular', '=', 'popular');
                }
            }

            $products_filter = $pro->get();
            return view($this->frontendPagePath . 'filter/filter_search', compact('products_filter'));
        } else {
            $query = $request->search;
             if ($query == null) {
                return back()->with('error', 'Search field is empty');
            }
            $result = explode(' ', $query);
            $pro = Product::where(function ($query) use ($result) {
                foreach ($result as $search) {
                    $query->where('products.product_name', 'like', '%' . $search . '%');
                }
            });
            $size = Size::all();
            $brand = Brand::all();
            $category = Category::all();
            $products = $pro->paginate(9);
            $category_slug = $request->slug;
            return view($this->frontendPagePath . 'filter/product_searchable', compact('query',  'size', 'brand', 'category', 'products', 'category_slug'));

        }


    }
}
