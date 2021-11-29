@extends('frontend.layouts.app')

@section('content')

        <!-- ***** tickets-section Start ***** -->
        
        <section class="section-style tickets-section " >
        
            <div class="container ">
                <div class="tickets-reservation-container bounded-area">
                    
                    <div class="section-title">
                    
                        <h3>استعراض بيانات الحجز</h3>
                    
                    </div>
                    
                  @foreach($bookings as $booking)
                    <div class="tickets-area " style="margin-bottom: 15px">
                        <div class="ticket-item">                        
                            <div class="ticket-wrap">
                            
                                <h2 class="ticket-details-title title-2">بيانات حجز الشخص <span>{{$loop->index+1}}</span></h2>
                                
                                <div class="ticket-qrcode">
                                
                                    {!! QrCode::size(250)->generate('http://dar-alsabaek.com/entry/bookings/'.$booking->id); !!}
                                
                                    
                                </div>
                                
                                <div class="ticket-details">
                                
                                    <span class="details-key"> رقم الحجز هو :</span>
                                    <span class="details-value">{{$booking->id}}</span>
                                
                                </div>
                                <div class="ticket-details">
                                
                                    <span class="details-key"> الإسم  :</span>
                                    <span class="details-value">{{$booking->name}}</span>
                                
                                </div>
                                <div class="ticket-details">                                
                                    <span class="details-key"> رقم الجوال :</span>
                                    <span class="details-value">{{$booking->mobile}}</span>                                
                                </div>
                                <div class="ticket-details">                                
                                    <span class="details-key"> الإيميل :</span>
                                    <span class="details-value">{{$booking->email}}</span>                                
                                </div>
                                <div class="ticket-details">                                
                                    <span class="details-key"> نوع الحجز  :</span>
                                    <span class="details-value">{{$booking->category->name}}</span>                                
                                </div>
                                <div class="ticket-details">                                
                                    <span class="details-key"> تاريخ الرحلة  :</span>
                                    <span class="details-value">{{$booking->trip->trip_date}}</span>                                
                                </div>
                                <div class="ticket-details">
                                
                                    <span class="details-key"> عدد الاشخاص :</span>
                                    <span class="details-value">{{$bookings->count()}}</span>
                                
                                </div>
                                <div class="ticket-details">
                                
                                    <span class="details-key"> حالة الحجز :</span>
                                    @if($booking->status==1)
                                       <span class="details-value" style="color: #1BC167">تم التأكيد</span>
                                    @else
                                       <span class="details-value" style="color: #ffc107">لم يتم التأكيد</span>
                                    @endif
                                
                                </div>
                                
                                
                                 <div class="ticket-details">
                                
                                    <a class="download-ticket" href="{{route('frontend.bookings.invoice', $booking->id)}}" target="_blank" downlaod>Download Ticket</a>
                                </div>
                               
                            </div>
                        </div>                            
                    </div>
                  @endforeach
                    
                    <div class="submit-btn-wrap mt-5">

                            <a href="{{route('frontend.index')}}" class="submit-btn back-btn">عودة</a>

                    </div>
                    
                </div>    
            </div>
        
        </section>
        
        <!-- ***** tickets-section End ***** -->

@endsection