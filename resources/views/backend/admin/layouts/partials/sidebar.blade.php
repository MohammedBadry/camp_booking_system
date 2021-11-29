<aside class="left-sidebar">
    <div class="slidebar-content">        
        <div class="logo-area">
           <a class="d-block" href="{{route('admin.dashboard')}}">
                <img class="img-fluid" src="{{asset('backend')}}/img/logo.svg">
           </a>
        </div>
        <ul class="slidebar-links">
            <li class="sidebar-item">

                <a class="sidebar-link @if(request()->segment(2)=='dashboard') active @endif" href="{{route('admin.dashboard')}}">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="19.2" height="19.2" viewBox="0 0 19.2 19.2">
                                <g id="Vector_Smart_Object" data-name="Vector Smart Object" transform="translate(-185)">
                                <path id="Path_48" data-name="Path 48" d="M10.016.154a.64.64,0,0,0-.833,0L0,8.026V17.28A1.919,1.919,0,0,0,1.92,19.2H7.04a.64.64,0,0,0,.64-.64V14.72a1.92,1.92,0,0,1,3.84,0v3.84a.64.64,0,0,0,.64.64h5.12a1.919,1.919,0,0,0,1.92-1.92V8.026Z" transform="translate(185 0)" fill="#fff"/>
                                </g>
                            </svg>
                    </span>
                    الرئيسية
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link @if(request()->segment(2)=='sales') active @endif" href="{{route('admin.sales.index')}}">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="21.31" height="21.31" viewBox="0 0 21.31 21.31">
                            <g id="Vector_Smart_Object" data-name="Vector Smart Object" transform="translate(0.724 0.724)">
                            <path id="Path_41" data-name="Path 41" d="M8.128,1.034H2.453A1.419,1.419,0,0,0,1.034,2.453V8.128A1.419,1.419,0,0,0,2.453,9.547H8.128A1.419,1.419,0,0,0,9.547,8.128V2.453A1.419,1.419,0,0,0,8.128,1.034Z" transform="translate(-1.034 -1.034)" fill="none" stroke="#fff" stroke-width="1.448"/>
                            <path id="Path_42" data-name="Path 42" d="M17.586,1.034H11.912a1.419,1.419,0,0,0-1.419,1.419V8.128a1.419,1.419,0,0,0,1.419,1.419h5.674A1.419,1.419,0,0,0,19,8.128V2.453A1.419,1.419,0,0,0,17.586,1.034Z" transform="translate(0.857 -1.034)" fill="none" stroke="#fff" stroke-width="1.448"/>
                            <path id="Path_43" data-name="Path 43" d="M17.586,10.493H11.912a1.419,1.419,0,0,0-1.419,1.419v5.674A1.419,1.419,0,0,0,11.912,19h5.674A1.419,1.419,0,0,0,19,17.586V11.912A1.419,1.419,0,0,0,17.586,10.493Z" transform="translate(0.857 0.857)" fill="none" stroke="#fff" stroke-width="1.448"/>
                            <path id="Path_44" data-name="Path 44" d="M8.128,10.493H2.453a1.419,1.419,0,0,0-1.419,1.419v5.674A1.419,1.419,0,0,0,2.453,19H8.128a1.419,1.419,0,0,0,1.419-1.419V11.912A1.419,1.419,0,0,0,8.128,10.493Z" transform="translate(-1.034 0.857)" fill="none" stroke="#fff" stroke-width="1.448"/>
                            </g>
                        </svg>
                    </span>
                    المبيعات
                </a>
            </li>
            <li class="sidebar-item">

                <a class="sidebar-link @if(request()->segment(2)=='companies') active @endif" href="{{route('admin.companies.index')}}">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15.332" height="21.295" viewBox="0 0 15.332 21.295">
                            <g id="Vector_Smart_Object" data-name="Vector Smart Object" transform="translate(0.716 0.717)">
                            <path id="Path_45" data-name="Path 45" d="M11.669,5.291A4.213,4.213,0,0,1,7.5,9.547a4.213,4.213,0,0,1-4.17-4.255A4.214,4.214,0,0,1,7.5,1.034,4.214,4.214,0,0,1,11.669,5.291Z" transform="translate(-0.55 -1.034)" fill="none" stroke="#fff" stroke-linecap="square" stroke-width="1.433"/>
                            <path id="Path_46" data-name="Path 46" d="M14.911,18.768H1.013V15.933a4.214,4.214,0,0,1,4.17-4.258h5.559a4.214,4.214,0,0,1,4.17,4.258Z" transform="translate(-1.013 1.094)" fill="none" stroke="#fff" stroke-linecap="square" stroke-width="1.433"/>
                            </g>
                        </svg>
                    </span>
                    المستخدمين
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link @if(request()->segment(2)=='bookings') active @endif" href="{{route('admin.bookings.index')}}">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="21.6" viewBox="0 0 18 21.6">
                            <path id="Path_40" data-name="Path 40" d="M2.238,9.535l-.844-.1ZM1.16,19.466l.844.1Zm16.285,0-.843.1ZM16.367,9.535l.844-.1Zm-14.973-.1L.317,19.37,2,19.562,3.082,9.631ZM2.538,21.91H16.069V20.172H2.538Zm15.751-2.54L17.211,9.439l-1.686.191L16.6,19.562ZM14.991,7.4H3.615V9.142H14.991Zm2.22,2.036A2.254,2.254,0,0,0,14.991,7.4V9.142a.543.543,0,0,1,.533.489ZM16.069,21.91a2.268,2.268,0,0,0,2.22-2.54l-1.686.191a.545.545,0,0,1-.533.611ZM.317,19.37a2.269,2.269,0,0,0,2.221,2.54V20.172A.545.545,0,0,1,2,19.562Zm2.765-9.74a.542.542,0,0,1,.533-.489V7.4A2.255,2.255,0,0,0,1.394,9.439ZM6,6.145V5.436H4.3v.709Zm6.616-.709v.709h1.7V5.436ZM9.3,2.048a3.349,3.349,0,0,1,3.309,3.388h1.7A5.067,5.067,0,0,0,9.3.31ZM6,5.436A3.348,3.348,0,0,1,9.3,2.048V.31a5.066,5.066,0,0,0-5,5.126Z" transform="translate(-0.303 -0.31)" fill="#fff"/>
                        </svg>
                    </span>
                    الحجوزات
                </a>
            </li>               
            <li class="sidebar-item">
                <a class="sidebar-link @if(request()->segment(2)=='trips' && request()->get('type_id')==1) active @endif" href="{{route('admin.trips.index')}}/?type_id=1">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="21.31" height="21.31" viewBox="0 0 21.31 21.31">
                            <g id="Vector_Smart_Object" data-name="Vector Smart Object" transform="translate(0.724 0.724)">
                            <path id="Path_41" data-name="Path 41" d="M8.128,1.034H2.453A1.419,1.419,0,0,0,1.034,2.453V8.128A1.419,1.419,0,0,0,2.453,9.547H8.128A1.419,1.419,0,0,0,9.547,8.128V2.453A1.419,1.419,0,0,0,8.128,1.034Z" transform="translate(-1.034 -1.034)" fill="none" stroke="#fff" stroke-width="1.448"/>
                            <path id="Path_42" data-name="Path 42" d="M17.586,1.034H11.912a1.419,1.419,0,0,0-1.419,1.419V8.128a1.419,1.419,0,0,0,1.419,1.419h5.674A1.419,1.419,0,0,0,19,8.128V2.453A1.419,1.419,0,0,0,17.586,1.034Z" transform="translate(0.857 -1.034)" fill="none" stroke="#fff" stroke-width="1.448"/>
                            <path id="Path_43" data-name="Path 43" d="M17.586,10.493H11.912a1.419,1.419,0,0,0-1.419,1.419v5.674A1.419,1.419,0,0,0,11.912,19h5.674A1.419,1.419,0,0,0,19,17.586V11.912A1.419,1.419,0,0,0,17.586,10.493Z" transform="translate(0.857 0.857)" fill="none" stroke="#fff" stroke-width="1.448"/>
                            <path id="Path_44" data-name="Path 44" d="M8.128,10.493H2.453a1.419,1.419,0,0,0-1.419,1.419v5.674A1.419,1.419,0,0,0,2.453,19H8.128a1.419,1.419,0,0,0,1.419-1.419V11.912A1.419,1.419,0,0,0,8.128,10.493Z" transform="translate(-1.034 0.857)" fill="none" stroke="#fff" stroke-width="1.448"/>
                            </g>
                        </svg>
                    </span>
                    الرحلات    
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link @if(request()->segment(2)=='trips' && request()->get('type_id')==2) active @endif" href="{{route('admin.trips.index')}}/?type_id=2">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="21.31" height="21.31" viewBox="0 0 21.31 21.31">
                            <g id="Vector_Smart_Object" data-name="Vector Smart Object" transform="translate(0.724 0.724)">
                            <path id="Path_41" data-name="Path 41" d="M8.128,1.034H2.453A1.419,1.419,0,0,0,1.034,2.453V8.128A1.419,1.419,0,0,0,2.453,9.547H8.128A1.419,1.419,0,0,0,9.547,8.128V2.453A1.419,1.419,0,0,0,8.128,1.034Z" transform="translate(-1.034 -1.034)" fill="none" stroke="#fff" stroke-width="1.448"/>
                            <path id="Path_42" data-name="Path 42" d="M17.586,1.034H11.912a1.419,1.419,0,0,0-1.419,1.419V8.128a1.419,1.419,0,0,0,1.419,1.419h5.674A1.419,1.419,0,0,0,19,8.128V2.453A1.419,1.419,0,0,0,17.586,1.034Z" transform="translate(0.857 -1.034)" fill="none" stroke="#fff" stroke-width="1.448"/>
                            <path id="Path_43" data-name="Path 43" d="M17.586,10.493H11.912a1.419,1.419,0,0,0-1.419,1.419v5.674A1.419,1.419,0,0,0,11.912,19h5.674A1.419,1.419,0,0,0,19,17.586V11.912A1.419,1.419,0,0,0,17.586,10.493Z" transform="translate(0.857 0.857)" fill="none" stroke="#fff" stroke-width="1.448"/>
                            <path id="Path_44" data-name="Path 44" d="M8.128,10.493H2.453a1.419,1.419,0,0,0-1.419,1.419v5.674A1.419,1.419,0,0,0,2.453,19H8.128a1.419,1.419,0,0,0,1.419-1.419V11.912A1.419,1.419,0,0,0,8.128,10.493Z" transform="translate(-1.034 0.857)" fill="none" stroke="#fff" stroke-width="1.448"/>
                            </g>
                        </svg>
                    </span>
                    المخيمات    
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link @if(request()->segment(2)=='operators') active @endif" href="{{route('admin.operators.index')}}">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="21.6" viewBox="0 0 18 21.6">
                            <path id="Path_40" data-name="Path 40" d="M2.238,9.535l-.844-.1ZM1.16,19.466l.844.1Zm16.285,0-.843.1ZM16.367,9.535l.844-.1Zm-14.973-.1L.317,19.37,2,19.562,3.082,9.631ZM2.538,21.91H16.069V20.172H2.538Zm15.751-2.54L17.211,9.439l-1.686.191L16.6,19.562ZM14.991,7.4H3.615V9.142H14.991Zm2.22,2.036A2.254,2.254,0,0,0,14.991,7.4V9.142a.543.543,0,0,1,.533.489ZM16.069,21.91a2.268,2.268,0,0,0,2.22-2.54l-1.686.191a.545.545,0,0,1-.533.611ZM.317,19.37a2.269,2.269,0,0,0,2.221,2.54V20.172A.545.545,0,0,1,2,19.562Zm2.765-9.74a.542.542,0,0,1,.533-.489V7.4A2.255,2.255,0,0,0,1.394,9.439ZM6,6.145V5.436H4.3v.709Zm6.616-.709v.709h1.7V5.436ZM9.3,2.048a3.349,3.349,0,0,1,3.309,3.388h1.7A5.067,5.067,0,0,0,9.3.31ZM6,5.436A3.348,3.348,0,0,1,9.3,2.048V.31a5.066,5.066,0,0,0-5,5.126Z" transform="translate(-0.303 -0.31)" fill="#fff"/>
                        </svg>
                    </span>
                    المشغلين   
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link @if(request()->segment(2)=='entries') active @endif" href="{{route('admin.entries.index')}}">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="21.6" viewBox="0 0 18 21.6">
                            <path id="Path_40" data-name="Path 40" d="M2.238,9.535l-.844-.1ZM1.16,19.466l.844.1Zm16.285,0-.843.1ZM16.367,9.535l.844-.1Zm-14.973-.1L.317,19.37,2,19.562,3.082,9.631ZM2.538,21.91H16.069V20.172H2.538Zm15.751-2.54L17.211,9.439l-1.686.191L16.6,19.562ZM14.991,7.4H3.615V9.142H14.991Zm2.22,2.036A2.254,2.254,0,0,0,14.991,7.4V9.142a.543.543,0,0,1,.533.489ZM16.069,21.91a2.268,2.268,0,0,0,2.22-2.54l-1.686.191a.545.545,0,0,1-.533.611ZM.317,19.37a2.269,2.269,0,0,0,2.221,2.54V20.172A.545.545,0,0,1,2,19.562Zm2.765-9.74a.542.542,0,0,1,.533-.489V7.4A2.255,2.255,0,0,0,1.394,9.439ZM6,6.145V5.436H4.3v.709Zm6.616-.709v.709h1.7V5.436ZM9.3,2.048a3.349,3.349,0,0,1,3.309,3.388h1.7A5.067,5.067,0,0,0,9.3.31ZM6,5.436A3.348,3.348,0,0,1,9.3,2.048V.31a5.066,5.066,0,0,0-5,5.126Z" transform="translate(-0.303 -0.31)" fill="#fff"/>
                        </svg>
                    </span>
                    مسئوولي الدخول
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link @if(request()->segment(2)=='coupons') active @endif" href="{{route('admin.coupons.index')}}">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="21.6" viewBox="0 0 18 21.6">
                            <path id="Path_40" data-name="Path 40" d="M2.238,9.535l-.844-.1ZM1.16,19.466l.844.1Zm16.285,0-.843.1ZM16.367,9.535l.844-.1Zm-14.973-.1L.317,19.37,2,19.562,3.082,9.631ZM2.538,21.91H16.069V20.172H2.538Zm15.751-2.54L17.211,9.439l-1.686.191L16.6,19.562ZM14.991,7.4H3.615V9.142H14.991Zm2.22,2.036A2.254,2.254,0,0,0,14.991,7.4V9.142a.543.543,0,0,1,.533.489ZM16.069,21.91a2.268,2.268,0,0,0,2.22-2.54l-1.686.191a.545.545,0,0,1-.533.611ZM.317,19.37a2.269,2.269,0,0,0,2.221,2.54V20.172A.545.545,0,0,1,2,19.562Zm2.765-9.74a.542.542,0,0,1,.533-.489V7.4A2.255,2.255,0,0,0,1.394,9.439ZM6,6.145V5.436H4.3v.709Zm6.616-.709v.709h1.7V5.436ZM9.3,2.048a3.349,3.349,0,0,1,3.309,3.388h1.7A5.067,5.067,0,0,0,9.3.31ZM6,5.436A3.348,3.348,0,0,1,9.3,2.048V.31a5.066,5.066,0,0,0-5,5.126Z" transform="translate(-0.303 -0.31)" fill="#fff"/>
                        </svg>
                    </span>
                    أكواد الخصم 
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link @if(request()->segment(2)=='settings') active @endif" href="{{route('admin.settings.index')}}">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="21.6" viewBox="0 0 18 21.6">
                            <path id="Path_40" data-name="Path 40" d="M2.238,9.535l-.844-.1ZM1.16,19.466l.844.1Zm16.285,0-.843.1ZM16.367,9.535l.844-.1Zm-14.973-.1L.317,19.37,2,19.562,3.082,9.631ZM2.538,21.91H16.069V20.172H2.538Zm15.751-2.54L17.211,9.439l-1.686.191L16.6,19.562ZM14.991,7.4H3.615V9.142H14.991Zm2.22,2.036A2.254,2.254,0,0,0,14.991,7.4V9.142a.543.543,0,0,1,.533.489ZM16.069,21.91a2.268,2.268,0,0,0,2.22-2.54l-1.686.191a.545.545,0,0,1-.533.611ZM.317,19.37a2.269,2.269,0,0,0,2.221,2.54V20.172A.545.545,0,0,1,2,19.562Zm2.765-9.74a.542.542,0,0,1,.533-.489V7.4A2.255,2.255,0,0,0,1.394,9.439ZM6,6.145V5.436H4.3v.709Zm6.616-.709v.709h1.7V5.436ZM9.3,2.048a3.349,3.349,0,0,1,3.309,3.388h1.7A5.067,5.067,0,0,0,9.3.31ZM6,5.436A3.348,3.348,0,0,1,9.3,2.048V.31a5.066,5.066,0,0,0-5,5.126Z" transform="translate(-0.303 -0.31)" fill="#fff"/>
                        </svg>
                    </span>
                    الإعدادات 
                </a>
            </li>
        </ul>        
    </div>
    <a class="logout-link" href="javascript:$('#logout_form').submit();">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="21.165" height="21.238" viewBox="0 0 21.165 21.238">
                <g id="Vector_Smart_Object" data-name="Vector Smart Object" transform="translate(1.038 1.019)">
                    <path id="Path_35" data-name="Path 35" d="M1.038,20.2H5.284a2.129,2.129,0,0,0,2.123-2.134V3.134A2.129,2.129,0,0,0,5.284,1H1.038" transform="translate(11.7 -1)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.038"/>
                <path id="Path_36" data-name="Path 36" d="M17.846,15.222,12.538,9.889l5.307-5.333" transform="translate(-12.538 -0.289)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.038"/>
                <path id="Path_37" data-name="Path 37" d="M6.346,9H19.084" transform="translate(-6.346 0.6)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.077"/>
                </g>
            </svg>
        </span>
        تسجيل الخروج
    </a>
    <div class="close-menu" id="nav-close">                
        <i class="fas fa-times"></i>              
    </div>
</aside>