<!DOCTYPE html>
<html lang="ar">

<head>

    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <meta name="theme-color" content="#D6E8DD">

    <title>Thumamah Village</title>

    <link rel="icon" type="image/x-icon" href="{{asset('backend')}}/img/logo.svg">

    <link rel="stylesheet" type="text/css" href="{{asset('backend/entry')}}/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="{{asset('backend/entry')}}/css/all.min.css">
    
    <link rel='stylesheet' href="{{asset('backend/entry')}}/css/fonts/stylesheet.css">
        
    <link rel="stylesheet" type="text/css" href="{{asset('backend/entry')}}/css/noty.css"/>
    
    <link rel="stylesheet" type="text/css" href="{{asset('backend/entry')}}/css/main.css">
    

</head>

<body>
        
    <!-- ***** top-nav Start ***** -->
    
    <div class="top-nav">    
        <div class="container h-100">        
            <div class="top-nav-content">            
                <img src="{{asset('backend/entry')}}/img/Group%2020.svg">            
            </div>        
        </div>    
    </div>
    <button class="dropdown-item" style="cursor: pointer" onclick="$('#logout_form').submit();">تسجيل الخروج</button>

    <form method="POST" id="logout_form" action="{{ route('entry.auth.logout') }}">
    @csrf
    </form>
    
    
    <!-- ***** top-nav End ***** -->
    
    
    <!-- ***** scan-status-section  Start ***** -->
    
    @yield('content')
    
    <!-- ***** scan-status-section  End ***** -->
    
    
    <!-- ***** page-loader Start ***** -->
    
    <div class="page-loader" id="pageLoader">
         
             <span class="animate-spin">
             
                 <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" d="M15.165 8.53a.5.5 0 01-.404.58A7 7 0 1023 16a.5.5 0 011 0 8 8 0 11-9.416-7.874.5.5 0 01.58.404z" fill="#5e8c70" fill-rule="#5e8c70"></path>
                 </svg>
             
             </span>
         
        </div>
    
    <!-- ***** page-loader End  ***** -->
    
    
    
    
    
    
    <!-- jquery 3.5.1   -->
    <script src="{{asset('backend/entry')}}/js/jquery-3.5.1.min.js"></script>
    
     <!-- bootstrap v5   -->
    <script src="{{asset('backend/entry')}}/js/bootstrap.bundle.min.js"></script>
     
    <!-- matchHeight jquery plugin   -->
    <script src="{{asset('backend/entry')}}/js/jquery.matchHeight-min.js"></script>
    
    <!-- noty js -->
    <script src="{{asset('backend/entry')}}/js/noty.min.js"></script>
    
     <!-- main style js   -->
    <script src="{{asset('backend/entry')}}/js/main.js"></script>    
    
    @stack('scripts')
    
</body>

</html>