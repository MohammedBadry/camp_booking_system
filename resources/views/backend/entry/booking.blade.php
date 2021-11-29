@extends('backend.entry.layouts.app')

@section('content')

    <section class="section-style scan-details-section">    
        <div class="container">
            <div class=" bounded-area">
                <div class="scan-details-area">
                    <h2 class="scan-details-title title-2">بيانات الحجز</h2>
                    <div class="scan-details-qr">
                        <center>{!! QrCode::size(250)->generate(url('/entry/bookings/'.$booking->id)); !!}</center>
                    </div>
                    <div class="scan-details-items">                    
                        <div class="details-item">                        
                            <span class="details-title">رقم الحجز الخاص بالعميل : </span>
                            <span class="details-value">{{$booking->id}}</span>                        
                        </div>
                        <div class="details-item">
                            <span class="details-title">الإسم : </span>
                            <span class="details-value">{{$booking->name}}</span>
                        </div>
                        <div class="details-item">
                            <span class="details-title">الإيميل : </span>
                            <span class="details-value">{{$booking->email}}</span>
                        </div>
                        <div class="details-item">
                            <span class="details-title">رقم الجوال :</span>
                            <span class="details-value">{{$booking->mobile}}</span>
                        </div>
                        <div class="details-item">
                            <span class="details-title">تاريخ الرحلة : </span>
                            <span class="details-value">{{$booking->trip->trip_date}}</span>
                        </div>
                        <div class="details-item">
                            <span class="details-title">المشغل : </span>
                            <span class="details-value">{{$booking->trip->operator->name}}</span>
                        </div>
                        <div class="details-item">
                            <span class="details-title">المبلغ المدفوع : </span>
                            <span class="details-value">{{$booking->total_paid}} ر.س</span>
                        </div>                        
                        <div class="details-item">
                            <span class="details-title">حالة الحجز : </span>
                            @if($booking->status==1)
                            <span class="details-value" style="color: #1BC167">تم الدخول</span>
                            @else
                            <span class="details-value" style="color: #ffc107">لم يتم الدخول</span>
                            @endif
                        </div>                        
                    </div>
                    <div class="scan-details-btns">
                        @if($booking->status==0) 
                            <a href="javascript:$('#book_status_form').submit();" class="scan-details-btn scan-status">تأكيد الدخول</a>
                            <form id="book_status_form" method="POST" action="{{route('entry.bookings.update', $booking->id)}}">
                                @csrf
                            </form>
                            <a class="scan-details-btn scan-cancel" href="{{route('entry.dashboard')}}">الغاء</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection