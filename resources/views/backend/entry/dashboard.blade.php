@extends('backend.entry.layouts.app')

@section('content')

    <section class="section-style scan-code-section">
    
        <div class="container">
        
            <div class=" bounded-area">
            
                <div class="scan-code-area">
                
                    <h1 class="user-name title-2">
                    
                        مرحباً
                        <span>{{auth()->user()->name}}</span>
                    
                    </h1>
                    
                    <a class="scan-btn" href="{{route('entry.scanner')}}">قم بمسح الرمز لاستعراض بيانات الحجز</a>
                
                </div>
            
            </div>
        
        </div>
    
    </section>

@endsection