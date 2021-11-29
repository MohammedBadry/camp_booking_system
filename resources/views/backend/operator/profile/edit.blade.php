@extends('backend.operator.layouts.app')

@section('title', 'الصفحة الشخصية')
@section('mobile_breadcrumb', 'الصفحة الشخصية')

@section('content')

    <div class="section-style duplicated-add-section ">
    
        <div class="container">
        
            <div class="row">
            
                <div class="col-12">
                
                    <div class="duplicated-add-area add-organizer">
                    
                        <div class="add-box-wrap">
                        
                            <form class="add-form add-organizer-form " method="POST" action="{{route('operator.profile.update')}}" enctype="multipart/form-data">
                                @csrf
                                @if($admin->image!="")
                                <div class="col-12">
                                    <div class="upload-logo-area">
                                        <div class="img-wrap" id="img-wrap">
                                            <img id="output" src="{{url('uploads/profiles/'.$admin->image)}}">
                                        </div>
                                        <button type="button" class="cahnge-logo" onclick="$('#image').click();" id="cahnge-logo">تغيير الشعار</button>
                                    </div>                                
                                </div>
                                @else
                                <div class="col-12">
                                    <div class="upload-logo-area">
                                        <button type="button" onclick="$('#image').click();" class="upload-btn" id="upload-btn" style="display: block">تحميل الشعار</button>
                                        <div class="img-wrap" id="img-wrap" style="display: none">
                                            <img id="output" src="{{asset('backend')}}/img/Group%2021.svg">
                                        </div>
                                        <button type="button" class="cahnge-logo" onclick="$('#image').click();" id="cahnge-logo" style="display: none">تغيير الشعار</button>
                                    </div>                                
                                </div>
                                @endif
                                <input type="file" name="image" id="image" style="visibility: hidden" onchange="loadFile(event)">
                                <div class="row">
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

@if($admin->image!="")
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
@else
<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
        document.getElementById('img-wrap').style.display = 'block';
        document.getElementById('upload-btn').style.display = 'none';
        document.getElementById('cahnge-logo').style.display = 'block';
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
@endif
