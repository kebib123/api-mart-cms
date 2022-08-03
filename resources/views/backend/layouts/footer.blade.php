<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="#">Cyberlink Pvt. Ltd</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.5
    </div>
</footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('backend/js/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('backend/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->/
<script src="{{asset('backend/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('backend/js/demo.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('backend/js/jquery.mousewheel.js')}}"></script>
<script src="{{asset('backend/js/raphael.min.js')}}"></script>
<script src="{{asset('backend/js/jquery.mapael.min.js')}}"></script>
<script src="{{asset('backend/js/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('backend/js/Chart.min.js')}}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{asset('backend/js/dashboard2.js')}}"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>

<link rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous">
{{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>--}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#title' ) )
        .then( editor => {
            console.log( editor );
        } ),
        ClassicEditor
    .create( document.querySelector( '#desc' ) )
        .then( editor => {
            console.log( editor );
        } ),
        ClassicEditor
            .create( document.querySelector( '#keyword' ) )
            .then( editor => {
                console.log( editor );
            } ),
        ClassicEditor
            .create( document.querySelector( '#desc1' ) )
            .then( editor => {
                console.log( editor );
            } ),
        ClassicEditor
            .create( document.querySelector( '#about_section' ) )
            .then( editor => {
                console.log( editor );
            }),
        ClassicEditor
            .create( document.querySelector( '#refund' ) )
            .then( editor => {
                console.log( editor );
            }),
        ClassicEditor
            .create( document.querySelector( '#privacy' ) )
            .then( editor => {
                console.log( editor );
            }),
        ClassicEditor
            .create( document.querySelector( '#faq' ) )
            .then( editor => {
                console.log( editor );
            })

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


</body>
</html>
