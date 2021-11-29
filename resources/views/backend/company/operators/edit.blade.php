@extends('backend.company.layouts.app')

@section('title', 'المشغلين')
@section('mobile_breadcrumb', 'المشغلين')

@section('content')

<div class="section-style duplicated-add-section ">
    
    <div class="container">
    
        <div class="row">
        
            <div class="col-12">
            
                <div class="duplicated-add-area add-organizer">
                
                    <div class="add-area-title title-4">
                    
                        <p>تعديل بيانات المشغل</p>
                    
                    </div>
                    <div class="add-box-wrap">
                    
                        <form class="add-form add-organizer-form" method="POST" action="{{route('company.operators.update', $operator->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @if($operator->image!="")
                            <div class="col-12">
                                <div class="upload-logo-area">
                                    <div class="img-wrap" id="img-wrap">
                                        <img id="output" src="{{url('uploads/profiles/'.$operator->image)}}">
                                    </div>
                                    <button type="button" class="cahnge-logo" onclick="$('#image').click();" id="cahnge-logo">تغيير الشعار</button>
                                </div>
                                    @error('image')
                                        <div class="alert-danger">{{$errors->first('image') }} </div>
                                    @enderror
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

                            <input type="hidden" name="operator_id" value="{{$operator->id}}">
                            <div class="row">
                            
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control input-focus {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{$operator->name}}" placeholder="الاسم" required>
                                        @error('name')
                                            <div class="alert-danger">{{$errors->first('name') }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control input-focus {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{$operator->email}}"  placeholder="البريد الإلكتروني" required>
                                        @error('email')
                                            <div class="alert-danger">{{$errors->first('email') }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="tel" name="mobile" class="form-control input-focus {{$errors->has('mobile') ? 'is-invalid' : ''}}" value="{{$operator->mobile}}" placeholder="رقم الجوال" required>
                                        @error('mobile')
                                            <div class="alert-danger">{{$errors->first('mobile') }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="password-field">
                                            <input type="password" name="password" class="form-control password-input input-focus {{$errors->has('password') ? 'is-invalid' : ''}}" placeholder="كلمة المرور ">
                                            <div class="eye-icon"></div>
                                        </div>
                                        @error('password')
                                            <div class="alert-danger">{{$errors->first('password') }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <div class="password-field">
                                            <input type="password" name="password_confirmation" class="form-control password-input input-focus {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}" placeholder="إعادة ادخال كلمة المرور">
                                            <div class="eye-icon"></div>
                                        </div>
                                        @error('password_confirmation')
                                            <div class="alert-danger">{{$errors->first('password_confirmation') }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea name="details" class="form-control input-focus " placeholder="تفاصيل المشغل" required>{{$operator->details}}</textarea>
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

@if($operator->image!="")
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
