@extends('backend.layouts.master')
@section('content')

    <div class="container">
    
        <form method="post" class="form-group" action="{{ url('admin/banner') }}" enctype="multipart/form-data">
             {{ csrf_field() }}   
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <!-- general form elements -->
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Add Banner</h3>
                                </div>
									<hr>
                                <!-- form start -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Title</label>
                                        <input class="form-control" placeholder="Title" name="title" type="text">
                                      

                                    </div>
                                      <div class="form-group">
                                        <label for="name" class="control-label">Caption</label>
                                        <input class="form-control" placeholder="Caption" name="caption" type="text">

                                    </div>
                                      <div class="form-group">
                                        <label for="name" class="control-label">Content</label>
                                         <textarea class="form-control" id="textArea2" name="content" rows="3"></textarea>
                                     

                                    </div>
                                      
                                    <div class="form-group">
                                        <label for="name" class="control-label">Link</label>
                                        <input class="form-control" placeholder="Link" name="link" type="text">

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

                     </div>
               

                <!-- /.box -->
        </form>
    </div>

@endsection