<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    protected $backendPath = 'backend.';
    protected $backendPagePath = 'null';
    protected $backendcategoryPath = 'null';
    protected $backendproductPath = 'null';
    protected $backendbrandPath = 'null';
    protected $backendslidePath = 'null';
    protected $backendsetupPath = 'null';




    public function __construct()
    {
        $this->backendPath;
        $this->backendPagePath = $this->backendPath . '/' . 'pages.';
        $this->backendcategoryPath = $this->backendPath . '/' . 'pages.' . '/' . 'category.';
        $this->backendproductPath = $this->backendPath . '/' . 'pages.' . '/' . 'product.';
        $this->backendslidePath = $this->backendPath . '/' . 'pages.' . '/' . 'slide.';
        $this->backendbrandPath = $this->backendPath . '/' . 'pages.' . '/' . 'brand.';
        $this->backendsetupPath = $this->backendPath . '/' . 'pages.' . '/' . 'setup.';


    }
}
