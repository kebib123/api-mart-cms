
@include('frontend.include.header')
@include('frontend.include.flash-message')
@yield('content')
@include('frontend.include.footer')
@stack('scripts')

