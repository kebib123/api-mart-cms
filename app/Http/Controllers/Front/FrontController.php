<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\BannerModel;
use App\Model\Brand;
use App\Model\Category;
use App\Model\OrderDetail;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{

    protected $frontendPath = 'frontend.';
    protected $frontendPagePath = 'null';

    public function __construct()
    {
        $this->frontendPagePath = $this->frontendPath.'pages.';

    }

   public function index()
   {

      $category=Category::orderBy('created_at','desc')->where('parent_id',0)->take(3)->get();
      $brand=Brand::orderBy('created_at','desc')->take(16)->get();
      $product=Product::where('is_popular','popular')->orderBy('created_at','desc')->get();
      $featured_category=Category::where('is_special',1)->orderBy('updated_at','desc')->take(1)->first();
       $featured_category2=Category::where('is_special',1)->orderBy('updated_at','desc')->skip(1)->first();
       $banner= BannerModel::all();

//       $id=OrderDetail::all()->pluck('product_id');
//       dd($id->sortByDesc('occurrences'));
//       $best_seller=OrderDetail::()->groupBy('product_id')->sortBy(count($id))->take(5);
//       foreach ($best_seller as $value)
//       {
//           dd($value->products());
//       }
//       dd($best_seller->first()->products);
       $result = DB::table('order_details')
           ->select(DB::raw('product_id'), DB::raw('count(*) as count')) 
           ->groupBy('product_id')
           ->orderBy('count', 'desc')
           ->take(5)
           ->pluck('product_id');
//       dd($result);
       $best=Product::wherein('id',$result)->get();
       $new=Product::orderby('created_at','desc')->take(5)->get();
       $popular=Product::where('is_popular','popular')->orderBy('updated_at','desc')->take(5)->get();
       return view('frontend.pages.index',compact('banner','popular','new','best','category','brand','product','featured_category','featured_category2'));

  }

}
