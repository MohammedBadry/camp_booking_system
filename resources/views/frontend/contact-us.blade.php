@extends('frontend.layouts.app')

@section('content')

    <section class="welcome-section" style="background-image: url({{asset('frontend')}}/img/Artboard%2019@3x-100.png)">
    
        <div class="container h-100">
        
            <div class="welcome-area">
            
                <div class="welcome-title">
                
                    تواصل معنا
                
                </div>
                
            </div>
        
        </div>
    
    </section>
    
    <!-- ***** welcome-section End ***** -->
    
    
    <!-- ***** connect-with-us-section Start ***** -->
    
    <section class="section-style connect-with-us-section">
    
        <div class="container">
            
            <div class=" connect-with-us-container bounded-area">
                
                <div class="connect-with-us-area d-none">

                    <h1 class="connect-with-us-title title-2"> 
                            
                            احنا بنحاول نصير حولك دائماً
                            <br>
                            ونرد عليك بأسرع وقت
                            تواصل معنا  الان
                    </h1>
                    <form class="connect-with-us-form" method="POST" action="{{route('frontend.send-request')}}">
                    @csrf
                    
                        <div class="row">

                            <div class="col-12">

                                <div class="form-group">
                                    <label class="form-label">الأسم </label>
                                    <input type="text" name="name" class="form-control input-focus" placeholder="أدخل الأسم" required>

                                </div>


                                </div>
                            <div class="col-12">

                                <div class="form-group">
                                    <label class="form-label">البريد الإلكتروني </label>
                                    <input type="email" name="email" class="form-control input-focus" placeholder="أدخل البريد الإلكتروني" required>

                                </div>


                                </div>
                            <div class="col-12">

                                <div class="form-group">
                                    <label class="form-label">رقم التواصل </label>
                                    <input type="tel" name="mobile" class="form-control input-focus" placeholder="أدخل رقم التواصل" required>

                                </div>


                                </div>
                            <div class="col-12">
                            
                                <div class="form-group">
                                    
                                    <label class="form-label">استفسارك</label>  

                                    <textarea class="form-control input-focus" name="details" placeholder="أكتب استفسارك هنا" required></textarea>
                                </div>
                            
                            </div>
                            <div class="col-12">
                            
                                <button class="submit-btn send-btn" type="submit">إرسال</button>
                            
                            </div>
                        </div>
                    
                    </form>
                </div>
                
                <div class="connect-with-us-area">
                    
                        <div class="items-wrap">
                            
                        
                        <div class="connect-items">
                        
                            <h1 class="connect-item-title title-2">المخيمات : </h1>
                            <div class="connect-way">
                            
                                <span class="connect-icon"><i class="fas fa-phone-alt"></i></span>
                                <a class="connect-val" href="#">+966 53 500 0093</a>
                            </div>
                            <div class="connect-way">
                            
                                <span class="connect-icon"><i class="fab fa-whatsapp"></i></span>
                                <a class="connect-val" href="#">+966 53 500 0096</a>
                            </div>
                            <div class="connect-way">
                            
                                <span class="connect-icon"><i class="fas fa-envelope"></i></span>
                                <a class="connect-val" href="mailto:info@thumamahvillage.com">info@thumamahvillage.com</a>
                            </div>
                            
                        </div>
                        
                        <div class="connect-items">
                        
                            <h1 class="connect-item-title title-2">الرحلات : </h1>
                            <div class="connect-way">
                            
                                <span class="connect-icon"><i class="fas fa-phone-alt"></i></span>
                                <a class="connect-val" href="#">+966 55 814 9980</a>
                            </div>
                            
                            <div class="connect-way">
                            
                                <span class="connect-icon"><i class="fas fa-envelope"></i></span>
                                <a class="connect-val" href="mailto:trips@thumamahvillage.com">trips@thumamahvillage.com</a>
                            </div>
                            
                        </div>
                        
                        
                        </div>
                    </div>
                    
                
            </div>

        </div>
    
    </section>

@endsection