@extends('backend.company.layouts.app')

@section('title', 'مسئوولي الدخول')
@section('mobile_breadcrumb', 'مسئوولي الدخول')

@section('content')

    <div class="section-style duplicated-add-section ">
    
        <div class="container">
        
            <div class="row">
            
                <div class="col-12">
                
                    <div class="duplicated-add-area add-new-user">
                    
                        <div class="add-area-title title-4">
                        
                            <p>إضافة مسئول دخول جديد</p>
                        
                        </div>
                        <div class="add-box-wrap">
                        
                            <form class="add-form add-new-user-form" method="POST" action="{{route('company.entries.store')}}">
                                @csrf
                                @method('POST')
                                <div class="row">
                                
                                    <div class="col-lg-12">
                                        <div class="form-group">                                    
                                            <input type="text" name="name" class="form-control input-focus {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{old('name')}}" placeholder="اسم المسئول دخول" required>
                                            @error('name')
                                                <div class="alert-danger">{{$errors->first('name') }} </div>
                                            @enderror
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control input-focus {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{old('email')}}"  placeholder="البريد الإلكتروني" required>
                                            @error('email')
                                                <div class="alert-danger">{{$errors->first('email') }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="tel" name="mobile" class="form-control input-focus {{$errors->has('mobile') ? 'is-invalid' : ''}}" value="{{old('mobile')}}" placeholder="رقم الجوال" required>
                                            @error('mobile')
                                                <div class="alert-danger">{{$errors->first('mobile') }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="password-field">
                                                <input type="password" name="password" class="form-control password-input input-focus {{$errors->has('password') ? 'is-invalid' : ''}}" placeholder="كلمة المرور " required>
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
                                                <input type="password" name="password_confirmation" class="form-control password-input input-focus {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}" placeholder="إعادة ادخال كلمة المرور" required>
                                                <div class="eye-icon"></div>
                                            </div>
                                            @error('password_confirmation')
                                                <div class="alert-danger">{{$errors->first('password_confirmation') }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="add-btn">اضافة</button>
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