@extends('backend.admin.layouts.app')

@section('title', 'الصفحة الشخصية')
@section('mobile_breadcrumb', 'الصفحة الشخصية')

@section('content')

    <div class="section-style duplicated-add-section ">
    
        <div class="container">
        
            <div class="row">
            
                <div class="col-12">
                
                    <div class="duplicated-add-area modify-account">
                        <div class="add-box-wrap">
                        
                            <form class="add-form modify-account-form " method="POST" action="{{route('admin.profile.update')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">                                
                                    <div class="col-12">                                    
                                        <div class="user-img-area">                                        
                                            <div class="user-img-wrap">
                                                <img class="img-fluid user-img" id="output" src="@if($admin->image!='') {{url('uploads/profiles/'.$admin->image)}} @else {{asset('backend')}}/img/avatar.png @endif">
                                            </div>
                                            <div class="upload-img-wrap">                                            
                                                <div class="dropstart">
                                                    <a class="upload-img-btn" onclick="$('#image').click();" href="#" role="button" id="uploadImgdropdownMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-camera"></i>
                                                    </a>
                                                    <!--ul class="dropdown-menu upload-img-dropdown-menu" aria-labelledby="uploadImgdropdownMenu">
                                                        <li><a class="dropdown-item" href="javascript:$('#image').click();">رفع الصورة</a></li>
                                                        <li><a class="dropdown-item" href="#">حذف الصورة</a></li>
                                                    </ul-->                                                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="file" name="image" id="image" style="visibility: hidden" onchange="loadFile(event)">
                                    <div class="col-lg-12">                                    
                                        <div class="form-group">
                                            <label class="form-label">الاسم بالكامل</label>  
                                            <input type="text" name="name" class="form-control input-focus {{$errors->has('name') ? 'is-invalid' : ''}}"  placeholder="الاسم بالكامل" value="{{$admin->name}}">
                                            @error('name')
                                                <div class="alert-danger">{{$errors->first('name') }} </div>
                                            @enderror
                                        </div>                                                                
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">البريد الإلكتروني</label>   
                                            <input type="email" name="email" class="form-control input-focus {{$errors->has('email') ? 'is-invalid' : ''}}"  placeholder="البريد الإلكتروني" value="{{$admin->email}}">
                                            @error('email')
                                                <div class="alert-danger">{{$errors->first('email') }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">                                    
                                        <div class="form-group">
                                            <label class="form-label">رقم الجوال</label> 
                                            <input type="tel" name="mobile" class="form-control input-focus {{$errors->has('mobile') ? 'is-invalid' : ''}}"  placeholder="رقم الجوال" value="{{$admin->mobile}}">
                                            @error('mobile')
                                                <div class="alert-danger">{{$errors->first('mobile') }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">كلمة المرور</label>   
                                            <div class="password-field">
                                                <input type="password" class="form-control password-input input-focus {{$errors->has('password') ? 'is-invalid' : ''}}" placeholder="كلمة المرور " value="">
                                                <div class="eye-icon"></div>
                                                @error('password')
                                                    <div class="alert-danger">{{$errors->first('password') }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">إعادة ادخال كلمة المرور </label>    
                                            <div class="password-field">
                                                <input type="password" class="form-control password-input input-focus" placeholder="إعادة ادخال كلمة المرور " value="">
                                                <div class="eye-icon"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="add-btn">تحديث</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            
            </div>
        
        </div>
        
    </div>

@endsection

<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
