<?php


namespace App\Repositories\Category;


interface CategoryInterface
{
    public function getAll();

    public function getCategories();

    public function addRelation($categories);

    public function selectChild($id);

    public function delete( $id );



}
