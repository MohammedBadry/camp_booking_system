@extends('backend.entry.layouts.app')

@section('content')

    <section class="section-style scan-status-section">
        <div class="container">
            <div class=" bounded-area">
                <div class="scan-status-area">                
                    <div class="scan-status-icon">
                        <img class="img-fluid success-icon" src="{{asset('backend/entry')}}/img/success-green-check-mark.svg">
                        <img class="img-fluid fail-icon d-none" src="{{asset('backend/entry')}}/img/fail.svg">
                    </div>
                    @if(Session::has('success'))
                        <h2 class="scan-status-title success-msg title-4 ">تم تأكيد الحجز رقم {{$booking->id}} بنجاح</h2>
                    @else
                    <h2 class="scan-status-title fail-msg title-4  d-none">
                        لم يتم تأكيد الحجز رقم 
                        {{$booking->id}}
                        ,
                        <br>
                        حاول مرة أخري
                    </h2>
                    @endif
                    <a class="back-btn duplicated-btn" href="{{route('entry.dashboard')}}">الرجوع للرئيسية</a>
                </div>
            </div>
        </div>
    </section>

@endsection