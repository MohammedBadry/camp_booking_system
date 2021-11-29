<!DOCTYPE html>
<html lang="ar">

<head>

    <meta charset="UTF-8">
    
    <meta name="viewport" content="height=device-height, 
                      width=device-width, initial-scale=1.0, 
                      minimum-scale=1.0, maximum-scale=1.0, 
                      user-scalable=no">
    
    <meta name="theme-color" content="#D6E8DD">

    <title>Thumamah Village</title>

    <link rel="icon" type="image/x-icon" href="{{asset('backend')}}/img/logo.svg">

    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/all.min.css">
    
    <link rel='stylesheet' href="{{asset('frontend')}}/css/fonts/stylesheet.css">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tajawal">
        
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/noty.css"/>
    
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/main.css">
    

</head>

<body>
    <?php
        $settings = \App\Models\Setting::first();
    ?>
    
    
    <!-- ***** header Start ***** -->
    
    <header class="top-nav @if(request()->segment(1)=='terms' || request()->segment(1)=='book-info' || request()->segment(3)=='book') show @endif">
    
        <div class="container h-100">
        
            <div class="nav-content">
            
                <div class="logo">
                
                    <a class="d-block" href="{{route('frontend.index')}}">
                    
                        <img class="img-fluid" src="{{asset('frontend')}}/img/Group%2020.svg">
                    
                    </a>
                
                </div>
                <ul class="navbar-menu ">
                
                    <li class="menu-item d-none">
                    
                        <a class="menu-item-link hvr-underline-from-right " href="{{route('frontend.index')}}">الرئيسية</a>
                    
                    </li>
                    <li class="menu-item">
                    
                        <a class="menu-item-link hvr-underline-from-right @if(request()->segment(1)=='') active @endif" href="{{route('frontend.index')}}">الرحلات</a>
                    
                    </li>
                    <li class="menu-item">
                    
                        <a class="menu-item-link hvr-underline-from-right @if(request()->segment(1)=='camps') active @endif " href="{{route('frontend.camps')}}">المخيمات</a>
                    
                    </li>
                    <li class="menu-item">
                    
                        <a class="menu-item-link hvr-underline-from-right @if(request()->segment(1)=='operators') active @endif " href="{{route('frontend.operators.index')}}">شركائنا   </a>
                    
                    </li>
                    <li class="menu-item">
                    
                        <a class="menu-item-link hvr-underline-from-right @if(request()->segment(1)=='make-trip') active @endif " href="{{route('frontend.make-trip')}}">صمم رحلتك </a>
                    
                    </li>
                    <li class="menu-item">
                    
                        <a class="menu-item-link hvr-underline-from-right @if(request()->segment(1)=='king-reserve') active @endif " href="{{route('frontend.king-reserve')}}">عن محمية الملك الخالد</a>
                    
                    </li>
                    <li class="menu-item">
                    
                        <a class="menu-item-link hvr-underline-from-right @if(request()->segment(1)=='about-us') active @endif " href="{{route('frontend.about-us')}}">من نحن</a>
                    
                    </li>
                    <li class="menu-item">
                    
                        <a class="menu-item-link hvr-underline-from-right @if(request()->segment(1)=='contact-us') active @endif " href="{{route('frontend.contact-us')}}">تواصل معنا</a>
                    
                    </li>
                    <li class="menu-item mobile-item">
                    
                        <div class="nav-social-media">
                            <?php
                                $settings = \App\Models\Setting::first();
                            ?>
                            <a href="{{$settings->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="{{$settings->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="{{$settings->snapchat}}" target="_blank"><i class="fab fa-snapchat-ghost"></i></a>
                            <a href="{{$settings->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        
                        </div>
                    
                    </li>
                    <li class="menu-item mobile-item">
                    
                        <div class="close-nav">
                        
                            <svg xmlns="http://www.w3.org/2000/svg" width="23.318" height="23.312" viewBox="0 0 23.318 23.312">
                              <path id="Icon_ionic-ios-close" data-name="Icon ionic-ios-close" d="M25.707,22.945l8.328-8.328a1.951,1.951,0,1,0-2.76-2.76l-8.328,8.328-8.328-8.328a1.951,1.951,0,1,0-2.76,2.76l8.328,8.328-8.328,8.328a1.951,1.951,0,0,0,2.76,2.76L22.947,25.7l8.328,8.328a1.951,1.951,0,0,0,2.76-2.76Z" transform="translate(-11.285 -11.289)" fill="#fff"/>
                            </svg>

                        
                        </div>
                    
                    </li>
                    
                
                </ul>
                <div class="nav-toggler">
                 
                     <svg height="384pt" viewBox="0 -53 384 384" width="384pt" xmlns="http://www.w3.org/2000/svg"><path d="m368 154.667969h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"></path><path d="m368 32h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"></path><path d="m368 277.332031h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0"></path></svg>
                 
                </div>
            </div>
        
        </div>
    
    </header>
    
    <!-- ***** header End ***** -->
    
    
    <!-- ***** page-wrapper Start ***** -->
    
    <div class="page-wrapper @if(request()->segment(1)=='terms' || request()->segment(1)=='book-info' || request()->segment(3)=='book') header-show @endif">
        
        <!-- ***** welcome-section Start ***** -->
        
        @yield('content')
        
        <!-- ***** trips-section End ***** -->
       
    </div>
    
    <!-- ***** page-wrapper End ***** -->

    
    <!-- ***** scrollup-btn Start ***** -->
    
    <div class="scrollup" id="scrollup">
        
            <i class="fas fa-level-up-alt"></i>
        
    </div>
    
    <!-- ***** scrollup-btn End ***** -->
    
    
    <!-- ***** page-loader Start ***** -->
    
    <div class="page-loader" id="pageLoader">
         
             <span class="animate-spin">
             
                 <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" d="M15.165 8.53a.5.5 0 01-.404.58A7 7 0 1023 16a.5.5 0 011 0 8 8 0 11-9.416-7.874.5.5 0 01.58.404z" fill="#5e8c70" fill-rule="#5e8c70"></path>
                 </svg>
             
             </span>
         
    </div>
    
    <!-- ***** page-loader End ***** -->
    
    
    <!-- ***** box-buttons Start ***** -->
    
    <div class="box-buttons">
        
            <a class="box-button" href="{{$settings->facebook}}" target="_blank"> 
                
                <span class="button-icon">
                
                   <i class="fab fa-facebook-f"></i>
                </span>
                <span class="button-text">فيسبوك</span>
                
            </a>
            <a class="box-button whatsapp_btn" href="#"> 
                
                <span class="button-icon">
                
                   <i class="fab fa-whatsapp"></i>
                </span>
                <span class="button-text">واتساب</span>
                
            </a>
            
            <a class="box-button" href="{{$settings->snapchat}}" target="_blank">
            
                <span class="button-icon">
                
                    <i class="fab fa-snapchat-ghost"></i>
                
                </span>
                <span class="button-text">سناب شات</span>
            </a>
            <a class="box-button" href="{{$settings->twitter}}" target="_blank"> 
            
                 <span class="button-icon">
                
                      <i class="fab fa-twitter"></i>
                </span>
              
                <span class="button-text">تويتر</span>
            </a>
            <a class="box-button" href="{{$settings->instagram}}" target="_blank"> 
            
                <span class="button-icon">
                    
                     <i class="fab fa-instagram"></i>
                </span>
              
                <span class="button-text">الانستغرام</span>
            </a>
            <a class="box-button support-btn d-none" href="mailto:{{$settings->support_email}}" target="_blank"> 
            
                <span class="button-icon">
                    
                     <i class="fas fa-headset"></i>
                </span>
              
                <span class="button-text">الدعم</span>
            </a>
            
        </div>
    
    <!-- ***** box-buttons End ***** -->
    
        <!-- ***** footer Start ***** -->
        
        
        <footer>
        
            <div class="container ">
            
                <div class="footer-content">
                
                    <div class="footer-items d-none"></div>
                    <div class="footer-logos">
                        
                        <a class="logo-item" href="https://www.rcrc.gov.sa/" target="_blank">
                        
                            <img class="img-fluid" src="{{asset('frontend')}}/img/logo%20(5).svg">
                        
                        </a>
                    
                        <a class="logo-item" href="http://iarda.gov.sa/beta/kkr/ " target="_blank">
                        
                            <img class="img-fluid" src="{{asset('frontend')}}/img/King_Khalid_Logo.svg">
                        
                        </a>
                        
                    </div>
                    
                    <div class="footer-info">
                    
                        <div class="info-item">
                        
                            <span>الرقم الضريبي : </span>
                            <span>300048879700003</span>
                            
                        </div>
                        <div class="info-item">
                        
                        
                            <span>السجل التجاري : </span>
                            <span>101059732</span>
                            
                        
                        </div>
                    </div>
                    
                    <div class="footer-copy-rights">
                    
                      
                        
                            Copyright by ThumamahVillage @2021 Powerd by <a href="https://boxes.com.sa/">BOXES</a>
                        
                        
                    
                    </div>
                    
                    
                </div>
            
            </div>
            
            <!--<a href="#" class="support-float-btn">
            
                <span class="support-icon"><i class="fas fa-headset"></i></span>
                
            
            </a>-->
            
            <div class="whatsapp-popup">
    
                <div class="whatsapp-btn whatsapp_btn" id="whatsapp_btn">

                    <div class="whatsapp-icon">

                        <svg viewBox="0 0 90 90" fill="#5E8C70" width="32" height="32"><path d="M90,43.841c0,24.213-19.779,43.841-44.182,43.841c-7.747,0-15.025-1.98-21.357-5.455L0,90l7.975-23.522   c-4.023-6.606-6.34-14.354-6.34-22.637C1.635,19.628,21.416,0,45.818,0C70.223,0,90,19.628,90,43.841z M45.818,6.982   c-20.484,0-37.146,16.535-37.146,36.859c0,8.065,2.629,15.534,7.076,21.61L11.107,79.14l14.275-4.537   c5.865,3.851,12.891,6.097,20.437,6.097c20.481,0,37.146-16.533,37.146-36.857S66.301,6.982,45.818,6.982z M68.129,53.938   c-0.273-0.447-0.994-0.717-2.076-1.254c-1.084-0.537-6.41-3.138-7.4-3.495c-0.993-0.358-1.717-0.538-2.438,0.537   c-0.721,1.076-2.797,3.495-3.43,4.212c-0.632,0.719-1.263,0.809-2.347,0.271c-1.082-0.537-4.571-1.673-8.708-5.333   c-3.219-2.848-5.393-6.364-6.025-7.441c-0.631-1.075-0.066-1.656,0.475-2.191c0.488-0.482,1.084-1.255,1.625-1.882   c0.543-0.628,0.723-1.075,1.082-1.793c0.363-0.717,0.182-1.344-0.09-1.883c-0.27-0.537-2.438-5.825-3.34-7.977   c-0.902-2.15-1.803-1.792-2.436-1.792c-0.631,0-1.354-0.09-2.076-0.09c-0.722,0-1.896,0.269-2.889,1.344   c-0.992,1.076-3.789,3.676-3.789,8.963c0,5.288,3.879,10.397,4.422,11.113c0.541,0.716,7.49,11.92,18.5,16.223   C58.2,65.771,58.2,64.336,60.186,64.156c1.984-0.179,6.406-2.599,7.312-5.107C68.398,56.537,68.398,54.386,68.129,53.938z"></path></svg>



                    </div>
                    <div class="Bubble__Notification"></div>


                </div>
                <div class="whatsapp-chat" id="whatsapp_chat">

                    <div class="chat-header">

                        <div class="user-img-container">

                            <img class="user-img" src="{{asset('frontend')}}/img/Group-32321.svg">

                        </div>
                        <div class="header-info">

                            <div class="header-name">خدمة العملاء</div>
                            <div class="header-msg">احنا بنحاول نصير حولك دايما ونرد عليك بسرعة </div>

                        </div>
                        <div class="close-popup"></div>
                    </div>
                    <div class="chat-body">

                        <div class="message-container">

                            <div class="message-content">

                                <div class="message-author">خدمة العملاء</div>
                                <div class="message-text">

                                    <p class="welcome-text">

                                        هلا وسهلا 👋

                                    </p>
                                    <p class="admin-text">كيف نقدر أساعدك؟</p>
                                </div>
                                <div class="message-time" id="currentTime"></div>

                            </div>

                        </div>

                    </div>
                    <div class="chat-footer">

                        <a class="start-chat-btn" href="https://api.whatsapp.com/send/?phone=966535000096&text&app_absent=0" target="_blank">


                            <svg width="20" height="20" viewBox="0 0 90 90" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" class="WhatsappButton__Icon-sc-7zv9k4-0 hwfVVx"><path d="M90,43.841c0,24.213-19.779,43.841-44.182,43.841c-7.747,0-15.025-1.98-21.357-5.455L0,90l7.975-23.522   c-4.023-6.606-6.34-14.354-6.34-22.637C1.635,19.628,21.416,0,45.818,0C70.223,0,90,19.628,90,43.841z M45.818,6.982   c-20.484,0-37.146,16.535-37.146,36.859c0,8.065,2.629,15.534,7.076,21.61L11.107,79.14l14.275-4.537   c5.865,3.851,12.891,6.097,20.437,6.097c20.481,0,37.146-16.533,37.146-36.857S66.301,6.982,45.818,6.982z M68.129,53.938   c-0.273-0.447-0.994-0.717-2.076-1.254c-1.084-0.537-6.41-3.138-7.4-3.495c-0.993-0.358-1.717-0.538-2.438,0.537   c-0.721,1.076-2.797,3.495-3.43,4.212c-0.632,0.719-1.263,0.809-2.347,0.271c-1.082-0.537-4.571-1.673-8.708-5.333   c-3.219-2.848-5.393-6.364-6.025-7.441c-0.631-1.075-0.066-1.656,0.475-2.191c0.488-0.482,1.084-1.255,1.625-1.882   c0.543-0.628,0.723-1.075,1.082-1.793c0.363-0.717,0.182-1.344-0.09-1.883c-0.27-0.537-2.438-5.825-3.34-7.977   c-0.902-2.15-1.803-1.792-2.436-1.792c-0.631,0-1.354-0.09-2.076-0.09c-0.722,0-1.896,0.269-2.889,1.344   c-0.992,1.076-3.789,3.676-3.789,8.963c0,5.288,3.879,10.397,4.422,11.113c0.541,0.716,7.49,11.92,18.5,16.223   C58.2,65.771,58.2,64.336,60.186,64.156c1.984-0.179,6.406-2.599,7.312-5.107C68.398,56.537,68.398,54.386,68.129,53.938z"></path></svg>

                            <span class="start-chat-text">ابدأ المحادثة</span>

                        </a>

                    </div>

                </div>

            </div>
    
            
        </footer>
        
        
        
        <!-- ***** footer End ***** -->
            
    <!-- jquery 3.5.1   -->
    <script src="{{asset('frontend')}}/js/jquery-3.5.1.min.js"></script>
    
     <!-- bootstrap v5   -->
    <script src="{{asset('frontend')}}/js/bootstrap.bundle.min.js"></script>
     
    <!-- matchHeight jquery plugin   -->
    <script src="{{asset('frontend')}}/js/jquery.matchHeight-min.js"></script>
    
    <!-- noty js -->
    <script src="{{asset('frontend')}}/js/noty.min.js"></script>
    
     <!-- main style js   -->
    <script src="{{asset('frontend')}}/js/main.js"></script>

    @if(Session::has('success'))
    <script>    
         /*** noty general style ***/
            var n = new Noty({
                type: 'success', //error//
                theme: 'bootstrap-v4',
                layout: 'topRight',
                timeout: '2000',
                progressBar: true,
                closeWith: ['click'],
                text: '<i class="fas fa-check-circle ml-1"></i> "<?=Session::get('success');?>"',
            }).show();
    </script>
    @elseif(Session::has('error'))
    <script>    
         /*** noty general style ***/
            var n = new Noty({
                type: 'error', //error//
                theme: 'bootstrap-v4',
                layout: 'topRight',
                timeout: '2000',
                progressBar: true,
                closeWith: ['click'],
                text: '<i class="fas fa-check-circle ml-1"></i> "<?=Session::get('error');?>"',
            }).show();
    </script>
    @endif
    
    @stack('scripts')

</body>

</html>