@extends('frontend.layouts.app')

@section('content')

    <section class="welcome-section" style="background-image: url({{asset('frontend')}}/img/Artboard%2019@3x-100.png)">
    
        <div class="container h-100">
        
            <div class="welcome-area">
            
                <div class="welcome-title">
                
                    صمم رحلتك
                
                </div>
                
            </div>
        
        </div>
    
    </section>
    
    <!-- ***** welcome-section End ***** -->
    
    
    <!-- ***** make-trip-section Start ***** -->
    
    <section class="section-style make-trip-section">
    
        <div class="container">
            
            <div class=" make-trip-container bounded-area">
                
                <div class="make-trip-area">

                    <form class="make-trip-form" method="POST" action="{{route('frontend.send-trip-design')}}">
                    @csrf
                        <div class="row">

                            <div class="col-12">

                                <div class="form-group">
                                    <label class="form-label">الأسم </label>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control input-focus" placeholder="أدخل الأسم" required>
                                    @error('name')
                                        <div class="alert-danger">{{$errors->first('name') }} </div>
                                    @enderror

                                </div>


                                </div>
                            <div class="col-12">

                                <div class="form-group">
                                    <label class="form-label">البريد الإلكتروني </label>
                                    <input type="email" name="email" value="{{old('email')}}" class="form-control input-focus" placeholder="أدخل البريد الإلكتروني" required>
                                    @error('email')
                                        <div class="alert-danger">{{$errors->first('email') }} </div>
                                    @enderror

                                </div>


                                </div>
                            <div class="col-12">

                                <div class="form-group">
                                    <label class="form-label">رقم التواصل </label>
                                    <input type="tel" name="mobile" value="{{old('mobile')}}" class="form-control input-focus" placeholder="أدخل رقم التواصل" required>
                                    @error('mobile')
                                        <div class="alert-danger">{{$errors->first('mobile') }} </div>
                                    @enderror

                                </div>


                                </div>
                            <div class="col-12">

                                <div class="form-group">
                                    <label class="form-label">عدد المشاركين </label>
                                    <input type="number" name="participants" value="{{old('participants')}}" class="form-control input-focus" min="1" placeholder="مثال : 10 أشخاص" required>
                                    @error('participants')
                                        <div class="alert-danger">{{$errors->first('participants') }} </div>
                                    @enderror

                                </div>


                            </div>
                            
                            <div class="col-12">
                            
                                <div class="form-group">
                                    
                                    <label class="form-label">رسالتك</label>  

                                    <textarea name="details" class="form-control input-focus" placeholder="أكتب رسالتك هنا">{{old('details')}}</textarea>
                                </div>
                            
                            </div>                            
                            <div class="col-12">
                            
                                <div class="form-group">
                                    
                                    <label class="form-label">جهة العمل</label>  

                                    <div class="check-wrap">

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="entity" value="فرد" id="Radio1">
                                            <label class="form-check-label" for="Radio1">
                                                        فرد
                                            </label>
                                        </div>
                                        
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="entity" value="شركة / جهة حكومية" id="Radio2">
                                            <label class="form-check-label" for="Radio2">
                                                            شركة / جهة حكومية
                                            </label>
                                        </div>
                                    </div>  
                                    @error('entity')
                                        <div class="alert-danger">{{$errors->first('entity') }} </div>
                                    @enderror

                                </div>
                            
                            </div>
                            <div class="col-12">
                            
                                <button class="submit-btn send-btn" type="submit">إرسال</button>
                            
                            </div>
                        </div>

                    </form>

                </div>
                
            </div>

        </div>
    
    </section>
    
    <!-- ***** welcome-section End ***** -->
    
    
    <!-- ***** about-us-section Start ***** -->
    


@endsection