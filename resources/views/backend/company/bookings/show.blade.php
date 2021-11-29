@extends('backend.company.layouts.app')

@section('title', 'الحجوزات')
@section('mobile_breadcrumb', 'الحجوزات')

@section('content')

    <div class="section-style duplicated-table-section ">
    
        <div class="container">
            <div class="row">            
                <div class="col-12">
                    <div class="duplicated-table-area">
                        
                        <div id="download" class="table-show-item d-none">
                            <span>تحميل: </span>
                            <a class="action-btn" href="{{route('frontend.bookings.invoice', $booking->id)}}" data-bs-toggle="tooltip" data-bs-placement="top" title="Download" download><i class="fas fa-cloud-download-alt"></i></a>
                        </div>
                        
                         <div  id="download">
                                 <a class="add-new-item table_add_btn mb-0" href="{{route('frontend.bookings.invoice', $booking->id)}}"  download>
                                    <span>
                                        
                                        <svg height="132px" style="enable-background:new 0 0 124 132;" version="1.1" viewBox="0 0 124 132" width="124px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">
                                        <![CDATA[
                                        	.st0{fill:#EF3E42;}
                                        	.st1{fill:#FFFFFF;}
                                        	.st2{fill:none;}
                                        	.st3{fill-rule:evenodd;clip-rule:evenodd;fill:#FFFFFF;}
                                        ]]>
                                        </style><defs/><path d="M99.1,113.7c2.6,0,4.7-2.1,4.7-4.7V79.9h11.2v29.8c0,8.4-6.8,15.2-15.2,15.2H18.5c-8.4,0-15.2-6.8-15.2-15.2V79.9h11.2V109  c0,2.6,2.1,4.7,4.7,4.7H99.1L99.1,113.7z M37.1,17.7h43.9V57h16.8L59.1,94.8L20.4,57h16.8V17.7L37.1,17.7z"/><rect class="st2" height="132" id="_x3C_Slice_x3E__100_" width="124"/></svg>
                                    </span>
                                    
                                        تحميل 
                                </a>
                        </div>
                       
                        
                    </div>    
                    @if($booking->category_id==1)
                        @include('invoice')
                    @else
                        @include('invoice-camp')
                    @endif
                </div>    
            </div>    
        </div>    
    </div>    

@endsection
