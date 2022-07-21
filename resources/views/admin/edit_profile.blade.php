@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container-full">
<section class="content">

<!-- Basic Forms -->
 <div class="box">
   <div class="box-header with-border">
     <h4 class="box-title">Edit Profile</h4>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <div class="row">
       <div class="col">
           <form method="post" action="{{route('admin.edit_profile.update')}}" enctype="multipart/form-data">
            @csrf
             <div class="row">
               <div class="col-12">	
                
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <h5>Email Field <span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input value="{{$adminData->email}}" type="email" name="email" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                            <h5>Username Field <span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input value="{{$adminData->name}}" type="text" name="name" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <h5>File Input Field <span class="text-danger">*</span></h5>
                            <div class="controls">
                           <input id="image" type="file" name="profile_photo_path" class="form-control" required=""></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <img id="showImage" src="{{!empty($adminData->profile_photo_path) ? url('upload/admin_images/'.$adminData->profile_photo_path) : url('upload/no_image.jpg')}}" style="width: 100px; height: 100px">
                        </div>
                    </div>

                </div>
               <div class="text-xs-right">
                   <button type="submit" class="btn btn-rounded btn-info">Submit</button>
               </div>
            </div>
           </form>

       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->

</section>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection