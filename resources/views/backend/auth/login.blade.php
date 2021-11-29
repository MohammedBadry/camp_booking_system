<!DOCTYPE html>
<html lang="ar">

<head>

    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <meta name="theme-color" content="#D6E8DD">

    <title></title>

    <link rel="stylesheet" type="text/css" href="{{asset('backend')}}/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="{{asset('backend')}}/css/all.min.css">
    
    <link rel='stylesheet' href="{{asset('backend')}}/css/fonts/stylesheet.css">
        
    <link rel="stylesheet" type="text/css" href="{{asset('backend')}}/css/noty.css"/>
    
    <link rel="stylesheet" type="text/css" href="{{asset('backend')}}/css/main.css">
    

</head>

<body>
    
    
    
    <!-- ***** login-section ***** -->
    
    <section class="section-style login-section">
    
        <div class="container">
        
            <div class="login-area">
            
                <div class="login-logo">
                
                    <img class="img-fluid" src="{{asset('backend')}}/img/Group%202034.svg">
                
                </div>
                
                <div class="login-form-area">
                    <form class="login-form" method="POST" action="{{ route(request()->segment(1).'.login') }}">
                        @csrf
                        <input type="hidden" name="role" value="{{request()->segment('1')}}">
                        <div class="form-group">
                            <input type="text" name="email" value="{{old('email')}}" class="form-control input-focus {{$errors->has('email') ? 'is-invalid' : ''}}" placeholder="البريد الإلكتروني">
                            @error('email')
                                <div class="alert-danger">{{$errors->first('email') }} </div>
                            @enderror
                        </div>
                        <div class="form-group">
                                <div class="password-field">
                                    <input type="password" name="password" class="form-control password-input input-focus {{$errors->has('password') ? 'is-invalid' : ''}}" placeholder="كلمة المرور ">
                                    <div class="eye-icon"></div>
                                    @error('password')
                                        <div class="alert-danger">{{$errors->first('password') }} </div>
                                    @enderror
                                </div>
                        </div>
                        <button class="login-btn" type="submit">تسجيل الدخول</button>
                    </form>
                </div>
                
                <div class="forget-password">
                
                    @if(Route::has(request()->segment(1).'.password.request'))
                        <a class="forget-password-link" href="#" data-bs-toggle="modal" data-bs-target="#forgetPasswordmodal">نسيت كلمة المرور؟</a>
                    @endif
                
                </div>
                
            </div>
        
        </div>
    
    </section>
    
    <!-- ***** login-section ***** -->
    
    
    <!-- ***** forget-password-modal Start ***** -->
    
    <div class="modal fade bootstrap-modal forget-password-modal" id="forgetPasswordmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content ">
          <div class="modal-header">
            <h5 class="modal-title  title-4">نسيت كلمة المرور</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body p-b-none">
            
              <div class="forget-password-modal-area modal-body-area">
                    
                  
                  <form class="forget-password-form" method="POST" action="{{ route(request()->segment(1).'.password.email') }}">
                    @csrf
                  
                    <div class="form-group">
                        <input type="hidden" name="role" value="{{request()->segment(1)}}">
                        <input type="email" id="email" name="email" value="{{old('email')}}" class="form-control input-focus" placeholder="البريد الإلكتروني">
                                  
                    </div>
                    <div class="form-group">
                              
                        <button class="save-btn" type="submit">إعادة تعيين كلمة المرور</button>  
                                  
                    </div>
                   
                    
                  </form>
              
              </div>
              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-success close-btn" data-bs-dismiss="modal">إغلاق</button>
          </div>
        </div>
      </div>
    </div>
    
    <!-- ***** forget-password-modal End ***** -->
    
    
    <!-- ***** page-loader ***** -->
    
    <div class="page-loader" id="pageLoader">
         
             <span class="animate-spin">
             
                 <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" d="M15.165 8.53a.5.5 0 01-.404.58A7 7 0 1023 16a.5.5 0 011 0 8 8 0 11-9.416-7.874.5.5 0 01.58.404z" fill="#5e8c70" fill-rule="#5e8c70"></path>
                 </svg>
             
             </span>
         
        </div>
    
    <!-- ***** page-loader Start ***** -->
    
    
    
    
    
    
    <!-- jquery 3.5.1   -->
    <script src="{{asset('backend')}}/js/jquery-3.5.1.min.js"></script>
    
     <!-- bootstrap v5   -->
    <script src="{{asset('backend')}}/js/bootstrap.bundle.min.js"></script>
     
    <!-- matchHeight jquery plugin   -->
    <script src="{{asset('backend')}}/js/jquery.matchHeight-min.js"></script>
    
    <!-- noty js -->
    <script src="{{asset('backend')}}/js/noty.min.js"></script>
    
     <!-- main style js   -->
    <script src="{{asset('backend')}}/js/main.js"></script>
    
  
    
</body>

</html>