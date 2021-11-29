@extends('frontend.layouts.app')

@section('content')

    <section class="welcome-section " style="background-image: url({{asset('frontend')}}/img/Artboard%2019@3x-100.png)">
    
        <div class="container h-100">
        
            <div class="welcome-area">
            
                <div class="welcome-title">
                    
                    تفاصيل عن الشريك
                </div>
                
            </div>
        
        </div>
    
    </section>
    
    <!-- ***** welcome-section End ***** -->
    
    
    <!-- ***** organizer-details-section Start ***** -->
    
    <section class="section-style organizer-details-section">
    
        <div class="container">
        
            <div class="organizer-details-container bounded-area">
            
                <div class="organizer-details-area">
                
                    <div class="organizer-details-wrap">
                    
                        <div class="organizer-logo">
                    
                            @if($operator->image)
                                <img class="img-fluid" src="{{url('uploads/profiles/'.$operator->image)}}">
                            @else
                                <img class="img-fluid" src="{{url('backend/img/avatar.png')}}">
                            @endif
                        
                        </div>
                        <h2 class="organizer-name title-3">{{$operator->name}}</h2>
                        <p class="organizer-desc duplicated-text">
                        
                            {{$operator->details}}
                        
                        </p>
                    </div>
                
                </div>
            
            </div>
            
        </div>
    
    </section>


@endsection