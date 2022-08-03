@extends('backend.layouts.master')
@section('content')

    <div class="container">
    
        <form method="post" class="form-group" action="{{ url('admin/banner', $data->id) }}" enctype="multipart/form-data">
             {{ csrf_field() }}   
             <input type="hidden" name="_method" value="PUT" />  
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <!-- general form elements -->
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Edit Banner</h3>
                                </div>
									<hr>
                                <!-- form start -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Title</label>
                                        <input class="form-control" placeholder="Title" name="title" type="text" value="{{$data->title}}">

                                    </div>
                                      <div class="form-group">
                                        <label for="name" class="control-label">Caption</label>
                                        <input class="form-control" placeholder="Caption" name="caption" type="text" value="{{$data->caption}}">

                                    </div>
                                      <div class="form-group">
                                        <label for="name" class="control-label">Content</label>
                                         <textarea class="form-control" id="textArea2" name="content" rows="3">{{$data->content }}</textarea>
                                     

                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="name" class="control-label">Link</label>
                                        <input class="form-control" placeholder="Link" name="link" type="text"  value="{{$data->link}}" >

                                    </div>                             
                                   
                                </div>
                                <!-- /.box-body -->
                                
                            </div>
                        </div>
                    </div>
                     </div>
                     <div class="col-md-4">
         	 		  <div class="box-footer">
                   	 <input class="btn btn-danger pull-right" type="submit" value="Save"> 
                   	 	<a href="{{ url('admin/banner') }}" class="btn btn-primary">List</a>
   					</div>


                    <div class="form-group">
                    <label for="formGroupExampleInput">Picture:</label>
                    <input type="file" name="picture" class="form-control" id="formGroupExampleInput">
                     </div>
                     @if($data->picture != '' OR $data->picture != null)
                  <div class="form-group">
                    <label class="col-lg-3 control-label" for="banner"></label>
                    <div class="col-lg-6">
                      <div class="bs-component">
                         <span class="bannerid{{$data->id}}">                       
                        <img src="{{asset('images/banner/'.$data->picture)}}" width="100%" />
                      </span>
                      </div>
                    </div>
                  </div>                    
                  @endif

                     </div>
               

                <!-- /.box -->
        </form>
    </div>

@stop

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script>
        $('.datatable').DataTable({

        });
    </script>
@endpush
