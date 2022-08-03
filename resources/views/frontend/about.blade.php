@extends('frontend.include.master')
@section('content')
    <!-- Page Content-->
<main class="container-fluid px-0">
    <!-- Row: Shop online-->
    <section class="row no-gutters">
        <div class="col-md-4 bg-position-center bg-size-cover bg-secondary" style="min-height: 15rem; background-image: url('{{asset('images/about/'.getConfiguration('about_image_1'))}}');"></div>
        <div class="col-md-8 px-3 px-md-4 py-4">
            <div class="mx-auto py-lg-5" style="max-width:40rem;">
                <h2 class="h3 pb-3">About Us</h2>
                <p class="font-size-sm pb-3 text-muted">
                    {!! getConfiguration('about') !!}
                </p>
            </div>
        </div>
    </section>
</main>
<!-- Toolbar for handheld devices-->
<div class="cz-handheld-toolbar">
    <div class="d-table table-fixed w-100">
        <a class="d-table-cell cz-handheld-toolbar-item" href="#navbarCollapse" data-toggle="collapse" onclick="window.scrollTo(0, 0)"><span class="cz-handheld-toolbar-icon"><i class="czi-menu"></i></span><span class="cz-handheld-toolbar-label">Menu</span></a><a class="d-table-cell cz-handheld-toolbar-item" href="shop-cart.php"><span class="cz-handheld-toolbar-icon"><i class="czi-cart"></i><span class="badge badge-primary badge-pill ml-1">4</span></span><span class="cz-handheld-toolbar-label">रू 705,000</span></a>
    </div>
</div>
@stop
