<?php

namespace App\Repositories\Category;

use App\Model\Category;
use Illuminate\Support\Arr;
use App\Repositories\Category\CategoryInterface as CategoryInterface;

class CategoryRepository implements CategoryInterface
{
    public $model;

    public function __construct( Category $model ) {
        $this->model = $model;
    }

    public function getAll() {

        return $this->model->all();
    }
    public function entity()
    {
        return Category::class;
    }

    public function getCategories()
    {
        $categories = Category::where('parent_id', 0)->get();


        $categories = $this->addRelation($categories);
        return $categories;
    }

    public function addRelation($categories)
    {
        $categories->map(function ($item, $key) {
            $sub = $this->selectChild($item->id);

            return $item = Arr::add($item, 'subCategory', $sub);
        });
        return $categories;
    }

    public function selectChild($id)
    {
        $categories = Category::where('parent_id', $id)->get();

        $categories = $this->addRelation($categories);

        return $categories;
    }

    public function delete( $id ) {

        $category = $this->model->findorfail( $id );
        // Delete from pivot table as well
        $subs = Category::where('parent_id', $category->id)->get();
        $id = Category::where('parent_id', $category->id)->pluck('id');
        $child=Category::wherein('parent_id',$id)->get();
        foreach ($child as $value) {
            $value->delete();
        }
        foreach ($subs as $sub) {
            $sub->delete();
        }
        $category->delete();
        return true;
    }

}
