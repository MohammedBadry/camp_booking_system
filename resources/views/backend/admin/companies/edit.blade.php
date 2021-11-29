@extends('backend.admin.layouts.app')

@section('content')

@section('title', 'المستخدمين')
@section('mobile_breadcrumb', 'المستخدمين')

<div class="section-style duplicated-add-section ">
    
    <div class="container">
    
        <div class="row">
        
            <div class="col-12">
            
                <div class="duplicated-add-area add-new-user">
                
                    <div class="add-area-title title-4">
                    
                        <p>تعديل بيانات المستخدم</p>
                    
                    </div>
                    <div class="add-box-wrap">
                    
                        <form class="add-form add-new-user-form" method="POST" action="{{route('admin.companies.update', $company->id)}}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="company_id" value="{{$company->id}}">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control input-focus {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{$company->name}}" placeholder="الاسم" required>
                                        @error('name')
                                            <div class="alert-danger">{{$errors->first('name') }} </div>
                                        @enderror
                                   </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control input-focus {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{$company->email}}"  placeholder="البريد الإلكتروني" required>
                                        @error('email')
                                            <div class="alert-danger">{{$errors->first('email') }} </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="tel" name="mobile" class="form-control input-focus {{$errors->has('mobile') ? 'is-invalid' : ''}}" value="{{$company->mobile}}" placeholder="رقم الجوال" required>
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
                                <div class="col-12">
                                    <div class="superadmin-area">
                                        <div class="powers-title">الصلاحيات</div>
                                        <div class="superadmin-powers">
                                            @foreach($roles as $role)
                                            <div class="powers-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="roles[]" type="checkbox" value="{{$role->id}}" id="powers{{$role->id}}" <?php if(in_array($role->id,$company_role_ids)) { echo 'checked'; } ?>>
                                                    <label class="form-check-label" for="powers{{$role->id}}">
                                                        {{$role->name}}
                                                    </label>
                                                </div>
                                            </div>
                                            @endforeach
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