@extends('backend.company.layouts.app')

@section('title', 'الحجوزات')
@section('mobile_breadcrumb', 'الحجوزات')

@section('content')

    <div class="section-style duplicated-add-section ">
    
        <div class="container">
        
            <div class="row">
            
                <div class="col-12">
                
                    <div class="duplicated-add-area add-new-user">
                    
                        <div class="add-area-title title-4">
                        
                            <p>تعديل الحجز</p>
                        
                        </div>
                        <div class="add-box-wrap">
                        
                            <form class="add-form add-new-user-form" method="POST" action="{{route('company.bookings.update', $booking->id)}}">
                                @csrf
                                @method('Put')
                                <div class="row">
                                
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">كود الرحلة أو المخيم المراد تغير الحجز إليها</label>
                                            <input type="text" name="code" class="form-control input-focus {{$errors->has('code') ? 'is-invalid' : ''}}" value="{{$booking->trip->code}}"  placeholder="كود الرحلة أو المخيم المراد تغير الحجز إليها" required>
                                            @error('code')
                                                <div class="alert-danger">{{$errors->first('code') }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 d-none">
                                        <div class="form-group">
                                            <label class="form-label">كود الخصم</label>
                                            <input type="text" name="coupon_code" class="form-control input-focus {{$errors->has('coupon_code') ? 'is-invalid' : ''}}" value=""  placeholder="كود الخصم">
                                            @error('coupon_code')
                                                <div class="alert-danger">{{$errors->first('coupon_code') }} </div>
                                            @enderror
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
