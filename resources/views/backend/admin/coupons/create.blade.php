@extends('backend.admin.layouts.app')

@section('title', 'أكواد الخصم')
@section('mobile_breadcrumb', 'أكواد الخصم')

@section('content')

    <div class="section-style duplicated-add-section ">
    
        <div class="container">
        
            <div class="row">
            
                <div class="col-12">
                
                    <div class="duplicated-add-area add-new-user">
                    
                        <div class="add-area-title title-4">
                        
                            <p>إضافة كود خصم</p>
                        
                        </div>
                        <div class="add-box-wrap">
                        
                            <form class="add-form add-new-user-form" method="POST" action="{{route('admin.coupons.store')}}">
                                @csrf
                                @method('POST')
                                <div class="row">
                                
                                    <div class="col-lg-6">
                                        <div class="form-group">                                    
                                            <input type="text" name="code" class="form-control input-focus {{$errors->has('code') ? 'is-invalid' : ''}}" value="{{old('code')}}" placeholder="كود الخصم" required>
                                            @error('code')
                                                <div class="alert-danger">{{$errors->first('code') }} </div>
                                            @enderror
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="discount" class="form-control input-focus {{$errors->has('discount') ? 'is-invalid' : ''}}" value="{{old('discount')}}"  placeholder="نسبة الخصم" required>
                                            @error('email')
                                                <div class="alert-danger">{{$errors->first('discount') }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group data-input-wrap">
                                            <div class="data-input">
                                                <input type="text" autocomplete="off" name="expire_date" value="{{old('expire_date')}}" class="form-control input-focus datepicker {{$errors->has('expire_date') ? 'is-invalid' : ''}}" placeholder="تاريخ النهاية" required>
                                                <span class="data-icon"><i class="fas fa-calendar-week"></i></span>
                                                @error('expire_date')
                                                    <div class="alert-danger">{{$errors->first('expire_date') }} </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">                                        
                                        <div class="form-group">
                                        <select name="trip_type" class="form-select select2 {{$errors->has('trip_type') ? 'is-invalid' : ''}}" aria-label="Default select example" required>
                                            <option selected  disabled>نوع الكود</option>
                                            <option value="1" <?php if(old('trip_type')==1) { echo 'selected'; } ?>>رحلة</option>
                                            <option value="2" <?php if(old('trip_type')==2) { echo 'selected'; } ?>>مخيم</option>
                                        </select>
                                        @error('trip_type')
                                            <div class="alert-danger">{{$errors->first('trip_type') }} </div>
                                        @enderror
                                        </div>                                        
                                    </div>
                                    <div class="col-lg-6">                                        
                                        <div class="form-group">
                                        <select name="status" class="form-select select2 {{$errors->has('operator_id') ? 'is-invalid' : ''}}" aria-label="Default select example" required>
                                            <option selected  disabled>حالة الكود</option>
                                            <option value="1" <?php if(old('operator_id')==1) { echo 'selected'; } ?>>نشط</option>
                                            <option value="0" <?php if(old('operator_id')==0) { echo 'selected'; } ?>>غير مفعل</option>
                                        </select>
                                        @error('status')
                                            <div class="alert-danger">{{$errors->first('status') }} </div>
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
