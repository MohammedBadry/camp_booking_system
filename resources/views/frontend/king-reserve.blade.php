@extends('frontend.layouts.app')

@section('content')

    <section class="welcome-section " style="background-image: url({{asset('frontend')}}/img/img-22.png)">
    
        <div class="container h-100">
        
            <div class="welcome-area">
            
                <div class="welcome-title">
                
                    عن محمية الملك الخالد  
                </div>
                
            </div>
        
        </div>
    
    </section>
    
    <!-- ***** welcome-section End ***** -->
    
    
    <!-- ***** about-us-section Start ***** -->
    
    <section class="section-style organizer-details-section">
    
        <div class="container">
        
            <div class="about-us-container bounded-area">
            
                <div class="about-us-area">
                
                    <div class="about-us-wrap">
                    
                        <p class="about-us-text duplicated-text">
                        
                            {!!$settings->king_reserve!!}
                        
                        </p>
                        <!--div class="about-us-logos">
                        
                            <a href="#">
                            
                                <img class="img-fluid duplicated-img" src="{{asset('frontend')}}/img/Group%2021.svg">
                            
                            </a>
                            <a href="#">
                            
                                <img class="img-fluid duplicated-img" src="{{asset('frontend')}}/img/Group%2021.svg">
                            
                            </a>
                        
                        </div-->
                    </div>
                    <div class="about-map">
                     
                         <a href="https://goo.gl/maps/VeQLjDZfnGVZcDPEA" target="_blank">
                         
                             <img class="img-fluid" src="{{asset('frontend')}}/img/Group%208537.png">
                         
                         </a>
                     
                     </div>
                     
                </div>
            
            </div>
            
        </div>
    
    </section>

@endsection