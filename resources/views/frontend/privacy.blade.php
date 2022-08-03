@extends('frontend.include.master')
@section('content')
    <!-- Page Title (Light)-->
<div class="bg-secondary py-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2  ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="index.php"><i class="czi-home"></i>Home</a></li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Privacy Policy</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pr-lg-4 text-center text-lg-left">
            <h1 class="h3 mb-0">Privacy Policy</h1>
        </div>
    </div>
</div>
<!-- Page Content-->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            {!! getConfiguration('privacy') !!}

        </div>
    </div>
</div>
<!-- Toolbar for handheld devices-->
<div class="cz-handheld-toolbar">
    <div class="d-table table-fixed w-100">
        <a class="d-table-cell cz-handheld-toolbar-item" href="#navbarCollapse" data-toggle="collapse" onclick="window.scrollTo(0, 0)"><span class="cz-handheld-toolbar-icon"><i class="czi-menu"></i></span><span class="cz-handheld-toolbar-label">Menu</span></a><a class="d-table-cell cz-handheld-toolbar-item" href="shop-cart.php"><span class="cz-handheld-toolbar-icon"><i class="czi-cart"></i><span class="badge badge-primary badge-pill ml-1">4</span></span><span class="cz-handheld-toolbar-label">रू 705,000</span></a>
    </div>
</div>
@stop
