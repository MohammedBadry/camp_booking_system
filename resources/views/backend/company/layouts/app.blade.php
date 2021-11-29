<!DOCTYPE html>
<html lang="ar">

<head>

    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <meta name="theme-color" content="#D6E8DD">

    <title>Thumamah Village</title>

    <link rel="icon" type="image/x-icon" href="{{asset('backend')}}/img/logo.svg">

    <link rel="stylesheet" type="text/css" href="{{asset('backend')}}/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="{{asset('backend')}}/css/all.min.css">
    
    <link rel='stylesheet' href="{{asset('backend')}}/css/fonts/stylesheet.css">
        
    <link rel="stylesheet" type="text/css" href="{{asset('backend')}}/css/noty.css"/>
    
    @if(request()->segment(2) != "bookings")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endif    
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="{{asset('backend')}}/css/main.css">
    

</head>

<body>
    
    
    
    <!-- ***** left-sidebar Start ***** -->
    
    @include('backend.company.layouts.partials.sidebar')
    
    <!-- ***** left-sidebar End ***** -->
    
    
    
    <!-- ***** page-wrapper Start ***** -->
    
    <div class="page-wrapper">
        
        <!-- ***** top-nav Start ***** -->
        
        <div class="top-nav">
        
            <div class="container h-100">            
                <div class="nav-content">                    
                    <div class="breadcrumb-title">@yield('title')</div>
                    @include('backend.company.layouts.partials.navbar')
                </div>            
            </div>
            <div class="overlay-panel"></div>
         
        </div>
        
        <!-- ***** top-nav End ***** -->
        
        
        <!-- ***** breadcrumb-area Start ***** -->
        
        <div class="breadcrumb-area">
        
            <div class="container">
            
                <div class="row">
                
                    <div class="col-12">
                    
                        <div class="breadcrumb-title">@yield('mobile_breadcrumb')</div>
                    
                    </div>
                
                </div>
            
            </div>
        
        </div>
        
        <!-- ***** breadcrumb-area End ***** -->
        
        
        <!-- ***** statistics-section Start ***** -->
        
        @yield('content')
        
        <!-- ***** statistics-section End ***** -->
        
    </div>
    
    <!-- ***** page-wrapper End ***** -->

    
    <!-- ***** scrollup-btn Start ***** -->
    
    <div class="scrollup" id="scrollup">
        
            <i class="fas fa-level-up-alt"></i>
        
    </div>
    
    <!-- ***** scrollup-btn End ***** -->
    
    <!-- ***** confirm-delate modal  ***** -->
    
      <div class="modal fade bootstrap-modal confirm-delate-modal" id="confirmDelatemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
          
              <div class="modal-body">
                
                 
                    <div class="modal-body-content">
                  
                        <div class="confirm-delate-modal-area">
                        
                            <h4 class="confirm-delate-title mb-4 text-center title-4">   هل تريد بالفعل تأكيد عملية الحذف؟؟</h4>
                            <div class="confirm-delate-btns">
                                <form method="POST" id="delete_form" action="">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="type_id" id="type_id" value="">
                                </form>
                                <input type="hidden" id="action" value="">
                                <button type="button" class="btn btn-success" data-bs-dismiss="modal">إلغاء</button>
                                <button type="button" onclick="$('#delete_form').attr('action', $('#action').val()); $('#delete_form').submit();" class="btn btn-outline-danger confirm-delete-btn ">حذف</button>
                                
                            </div>
                        </div>
                            
                    </div>  
                 
                  
                  
              </div>
                
                
            </div>
          </div>
        </div>
    
     <!-- ***** confirm-delate modal  ***** -->

    <form method="POST" id="logout_form" action="{{ route('company.profile.logout') }}">
    @csrf
    </form>
    
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
    
    <!-- noty js -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    @if(request()->segment(2) != "bookings")
    <!-- bootstrap-datepicker js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @endif    
       
     <!-- main style js   -->
    <script src="{{asset('backend')}}/js/main.js"></script>

    <script>    
        $(".select2").select2();
        $(function () {
          $(".datepicker").datepicker({ 
                autoclose: true,
                todayHighlight: true,
                orientation: 'right bottom'
          })
        });
    </script>    

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
    
    <script>
        /*** noty general style ***/
        $("#download .action-btn").click(function(){
            var n = new Noty({
                type: 'success', //error//
                theme: 'bootstrap-v4',
                layout: 'topRight',
                timeout: '2000',
                progressBar: true,
                closeWith: ['click'],
                text: '<i class="fas fa-check-circle ml-1"></i> تم تحميل الملف بنجاح',
            }).show();
        });
    </script>
    
    @stack('scripts')
</body>
</html>