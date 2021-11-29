@extends('frontend.layouts.app')

@section('content')

    <section class="welcome-section " style="background-image: url({{asset('frontend')}}/img/Artboard%2019@3x-100.png)">
    
        <div class="container h-100">
        
            <div class="welcome-area">
            
                <div class="welcome-title">
                
                    شركائنا    
                </div>
                
            </div>
        
        </div>
    
    </section>
    
    <!-- ***** welcome-section End ***** -->
    
    
    <!-- ***** organizers-section Start ***** -->
    
    <section class="section-style organizers-section">
    
        <div class="container">
        
            <div class="organizers-container bounded-area">
            
                <div class="organizers-area">
                
                    <div class="row row-cols-xl-2  row-cols-2">
                        @foreach($operators as $operator)
                        <div class="organizer-wrap">                    
                            <a href="{{route('frontend.operators.show', $operator->id)}}" class="organizer-item">
                                @if($operator->image)
                                    <img class="img-fluid" src="{{url('uploads/profiles/'.$operator->image)}}">
                                @else
                                    <img class="img-fluid" src="{{url('backend/img/avatar.png')}}">
                                @endif
                                <span class="hvr-underline-from-right">{{$operator->name}}</span>
                            </a>                        
                        </div>
                        @endforeach
                    </div>
                
                </div>
            
            </div>
            
        </div>
    
    </section>


@endsection