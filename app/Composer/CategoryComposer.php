<?php

namespace App\Composer;
use App\Repositories\Category\CategoryRepository;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\View\View;

class CategoryComposer
{
    protected $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    public function compose(View $view)
    {
        $category =$this->category->getCategories();
        $count=Cart::count();

//
        $view->with([
            'cat'=>$category,
//            'count'=>$count
        ]);
    }
}
