<?php

function categorySeperator($string = '', $size)
{
    for ($i = 2; $i < $size; $i++) {
        $string .= $string;
    }

    return $string;
}

 function getConfiguration($key)
{
    $config = \App\Model\Configuration::where('configuration_key', '=', $key)->first();
//    dd($config);
    if ($config != null) {
        return $config->configuration_value;
    }
    return null;
}

function generateReview($slug)
{
    $product = \App\Model\Product::where('slug', $slug)->first();
    $count = $product->reviews->count();
    $fivestar = \App\Model\Review::where('product_id', '=', $product->id)->where('rating', '=', 5)->get();
    $fourstar = \App\Model\Review::where('product_id', '=', $product->id)->where('rating', '=', 4)->get();
    $threestar = \App\Model\Review::where('product_id', '=', $product->id)->where('rating', '=', 3)->get();
    $twostar = \App\Model\Review::where('product_id', '=', $product->id)->where('rating', '=', 2)->get();
    $onestar = \App\Model\Review::where('product_id', '=', $product->id)->where('rating', '=', 1)->get();
    if ($count != 0) {
        $total = 5 * count($fivestar) + 4 * count($fourstar) + 3 * count($threestar) + 2 * count($twostar) + 1 * count($onestar);
        $total_review = count($fivestar) + count($fourstar) + count($threestar) + count($twostar) + count($onestar);
        $average = $total / $total_review;
    }
    return $average;
}


//function deal_date($date)
//{
//    $deal = App\Model\Deal::where('id', '=', 1)->first();
//    if ($deal != null) {
//        return $deal->date;
//    }
//    return null;
//
//}
