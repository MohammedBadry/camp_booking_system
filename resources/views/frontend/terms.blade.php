@extends('frontend.layouts.app')

@section('content')

    <section class="section-style terms-section">
    
        <div class="container">
        
            <div class="terms-container bounded-area">
            
                <div class="terms-area">
                
                    <div class="terms-wrap">
                        <div class="section-title">
                
                            <h3>الشروط والاحكام</h3>
                
                        </div>
                        <p class="terms-text duplicated-text">
                            {!!$settings->terms!!}
                        </p>
                        <a href="{{route('frontend.trips.book', $trip->id)}}" class="submit-btn back-btn">عودة</a>
                    </div>
                    
                </div>
            
            </div>
            
        </div>
    
    </section>
    
@endsection