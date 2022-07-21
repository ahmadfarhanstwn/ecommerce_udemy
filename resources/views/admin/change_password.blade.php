@extends('admin.admin_master')
@section('admin')

<div class="container-full">
<section class="content">

<!-- Basic Forms -->
 <div class="box">
   <div class="box-header with-border">
     <h4 class="box-title">Change Password</h4>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <div class="row">
       <div class="col">
           <form method="post" action="{{route('admin.change_password.update')}}">
            @csrf
             <div class="row">
               <div class="col-12">	
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <h5>Current Password<span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input type="password" name="current_password" id="current_password" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <h5>Password<span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input type="password" name="password" id="password" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <h5>Confirm Password<span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required="" data-validation-required-message="This field is required"> <div class="help-block"></div>
                            </div>
                            </div>
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
@endsection