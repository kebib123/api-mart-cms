<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function add_review(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'rating' => 'required',
                'review' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'errors' => $validator->errors()->all()
                ]);
            }
            if (Auth::check()) {
                $old_review = Review::where('product_id', $request->product_id)->where('user_id', Auth::user()->id)->first();
                if ($old_review != null) {
                    return response()->json(['status' => 'error', 'message' => 'You have already reviewed this product']);

                }
                if ($request->ajax()) {

                    $review = new Review();
                    $review->name = Auth::user()->first_name;
                    $review->email = Auth::user()->email;
                    $review->rating = $request->rating;
                    $review->review = $request->review;
                    $review->pros = $request->pros;
                    $review->cons = $request->cons;
                    $review->product_id = $request->product_id;
                    $review->user_id = Auth::user()->id;
                    $review->save();
                }
            } else {
                return response()->json(['status' => 'error', 'message' => 'Please login first']);
            }
            return response()->json(['status' => 'success', 'message' => 'Review added successfully']);
        }
    }
}
