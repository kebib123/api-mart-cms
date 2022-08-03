@extends('backend.layouts.master')
@section('content')

    <section class="col-lg-8">
        <!-- Profile form-->
        <form id="password_form">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="account-pass">Old Password</label>
                        <div class="password-toggle">
                            <input class="form-control" name="old_password" type="password" id="account-pass">
                            <label class="password-toggle-btn">
                                <input class="custom-control-input" type="checkbox"><i
                                    class="czi-eye password-toggle-indicator"></i><span class="sr-only">Show password</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="account-pass">New Password</label>
                        <div class="password-toggle">
                            <input class="form-control" name="new_password" type="password" id="account-pass">
                            <label class="password-toggle-btn">
                                <input class="custom-control-input" type="checkbox"><i
                                    class="czi-eye password-toggle-indicator"></i><span class="sr-only">Show password</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="account-confirm-pass">Confirm Password</label>
                        <div class="password-toggle">
                            <input class="form-control" name="confirm_password" type="password"
                                   id="account-confirm-pass">
                            <label class="password-toggle-btn">
                                <input class="custom-control-input" type="checkbox"><i
                                    class="czi-eye password-toggle-indicator"></i><span class="sr-only">Show password</span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <hr class="mt-2 mb-3">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">

                        <button class="btn btn-primary mt-3 mt-sm-0" id="update_password" type="button">Update
                            password
                        </button>
                    </div>
                </div>
            </div>


        </form>
    </section>

@stop
@push('scripts')

    <script>
        $('#update_password').on('click', function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            e.preventDefault();

            let myform = document.getElementById('password_form');
            let formData = new FormData(myform);
            console.log(formData);

            $.ajax({
                type: 'POST',
                url: '{{route('admin-password')}}',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,

                success: function (data) {
                    toastr.success(data.success);
                },
                error: function (data) {//if an error occurs
                    if (data.status == 406) {
                        jQuery.each(data.responseJSON.errors, function (key, value) {
                            toastr.error(value);

                        });
                    }
                    if (data.status == 401) {
                        console.log(data.responseJSON.errors);
                        toastr.error(data.responseJSON.errors);

                    }

                }

            });


        });

    </script>

@endpush
