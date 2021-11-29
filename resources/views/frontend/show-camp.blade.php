@extends('frontend.layouts.app')

@section('content')

    <section class="welcome-section" style="background-image: url({{asset('frontend')}}/img/Artboard%2019@3x-100.png)">
    
        <div class="container h-100">
        
            <div class="welcome-area">
            
                <div class="welcome-title mb-0">
                
                    تفاصيل المخيم
                </div>
                
                
            </div>
        
        </div>
    
    </section>
    
    <!-- ***** welcome-section End ***** -->
    
    
    <!-- ***** item-details-section Start ***** -->
    
        <section class="section-style item-details-section">
        
            <div class="container">
            
             <div class="item-details-container bounded-area">
             
                 <div class="item-details-area ">
                     
                     <div class="item-title title-2">{{$trip->title}}</div>
                     
                     <div class="item-banner">
                     
                         <img class="img-fluid" src="{{url('uploads/trips/'.$trip->image)}}">
                     
                     </div>
                     
                     <div class="item-banner camp-banner d-none">
                         
                          <div class="camp-slider-container">
                         
                              <div class="swiper camp-slider">
                                  
                                  <div class="swiper-wrapper">
                                      
                                    <div class="swiper-slide">
                                    
                                        <img class="img-fluid" src="{{url('uploads/trips/'.$trip->image)}}">
                         
                                    
                                    </div>
                                    <div class="swiper-slide">
                                    
                                        <img class="img-fluid" src="{{url('uploads/trips/'.$trip->image)}}">
                         
                                    
                                    </div>
                                    <div class="swiper-slide">
                                    
                                        <img class="img-fluid" src="{{url('uploads/trips/'.$trip->image)}}">
                         
                                    
                                    </div>
                                       
                                  </div>
                                  <div class="swiper-pagination"></div>

                              </div>

                         
                          </div>
                         
                     </div>
                     
                     
                     <div class="item-detalis-wrap">
                     
                         <div class="item-detalis-title title-2 item-detalis-title-camp ">معلومات المخيم</div>
                         <div class="detalis-columns">
                         
                             <div class="row">
                             
                                 <div class="col-lg-6">
                                 
                                      <div class="detalis-content-wrap">

                                         <div class="detalis-icon">

                                             <svg id="Icon_ionic-md-man" data-name="Icon ionic-md-man" xmlns="http://www.w3.org/2000/svg" width="4.986" height="13.297" viewBox="0 0 4.986 13.297">
                                              <path id="Path_98" data-name="Path 98" d="M16.484,4.464a1.107,1.107,0,1,0-1.107-1.107A1.1,1.1,0,0,0,16.484,4.464Z" transform="translate(-13.991 -2.25)"/>
                                              <path id="Path_99" data-name="Path 99" d="M15.7,8.086h-2.22a1.421,1.421,0,0,0-1.383,1.436v3.371a.461.461,0,1,0,.92,0V9.778h.178v8.476a.639.639,0,1,0,1.276,0V13.369h.237v4.888a.639.639,0,1,0,1.276,0V9.778h.148v3.116a.475.475,0,1,0,.95,0V9.522A1.425,1.425,0,0,0,15.7,8.086Z" transform="translate(-12.094 -5.623)"/>
                                            </svg>


                                         </div>

                                         <div class="detalis-content">

                                             <div class="detalis-title"> السعة :</div>
                                             <div class="detalis-text">
                                             
                                                 سعة المخيم من 
                                                 
                                                 <span>{{$trip->from}}</span>
                                                 
                                                 حتى 
                                                 
                                                 <span>{{$trip->to}}</span>
                                                 
                                                 شخص
                                             
                                             </div>

                                         </div>   
                                     </div>
                                     
                                 </div>
                                 
                                 <div class="col-lg-6">
                                 
                                     <div class="detalis-content-wrap">

                                         <div class="detalis-icon">

                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                                                <path id="Icon_awesome-coins" data-name="Icon awesome-coins" d="M0,11.874v1.251C0,14.159,2.52,15,5.625,15s5.625-.841,5.625-1.875V11.874a10.654,10.654,0,0,1-5.625,1.251A10.654,10.654,0,0,1,0,11.874ZM9.375,3.75C12.48,3.75,15,2.909,15,1.875S12.48,0,9.375,0,3.75.841,3.75,1.875,6.27,3.75,9.375,3.75ZM0,8.8v1.512c0,1.034,2.52,1.875,5.625,1.875s5.625-.841,5.625-1.875V8.8a9.435,9.435,0,0,1-5.625,1.512A9.435,9.435,0,0,1,0,8.8Zm12.188.322C13.866,8.8,15,8.194,15,7.5V6.249A7.194,7.194,0,0,1,12.188,7.26ZM5.625,4.688C2.52,4.688,0,5.736,0,7.031S2.52,9.375,5.625,9.375,11.25,8.326,11.25,7.031,8.73,4.688,5.625,4.688ZM12.05,6.337C13.808,6.021,15,5.4,15,4.688V3.437a9.538,9.538,0,0,1-4.708,1.225A3.281,3.281,0,0,1,12.05,6.337Z" ></path>
                                            </svg>


                                         </div>

                                         <div class="detalis-content">

                                             <div class="detalis-title"> السعر :</div>
                                             <div class="detalis-text">{{$trip->price}} ريال في الليلة</div>

                                         </div>   
                                     </div>

                                 
                                 </div>   
                                 
                                 <div class="col-12 d-none ">
                                 
                                     <div class="detalis-content-wrap">

                                         <div class="detalis-icon">

                                             <svg xmlns="http://www.w3.org/2000/svg" width="15" height="17.5" viewBox="0 0 15 17.5">
                                            <path id="Icon_material-timer" data-name="Icon material-timer" d="M14.5,1.5h-5V3.167h5ZM11.167,12.333h1.667v-5H11.167Zm6.692-5.508,1.183-1.183a9.207,9.207,0,0,0-1.175-1.175L16.683,5.65a7.5,7.5,0,1,0,1.175,1.175ZM12,17.333A5.833,5.833,0,1,1,17.833,11.5,5.829,5.829,0,0,1,12,17.333Z" transform="translate(-4.5 -1.5)"></path>
                                            </svg>

                                         </div>

                                         <div class="detalis-content">

                                             <div class="detalis-title"> تاريخ إنتهاء المخيم :</div>
                                             <div class="detalis-text">{{$trip->trip_date}}</div>

                                         </div>   
                                     </div>

                                 
                                 </div>   
                                 
                                 <div class="co-12">
                                 
                                     <div class="detalis-content-wrap">
                         
                                         <div class="detalis-icon">

                                             <svg xmlns="http://www.w3.org/2000/svg" width="132.646" height="117.884" viewBox="0 0 132.646 117.884">
                                              <path id="Icon_awesome-edit" data-name="Icon awesome-edit" d="M92.714,19.144l20.772,20.772a2.252,2.252,0,0,1,0,3.178L63.191,93.389,41.82,95.761a4.479,4.479,0,0,1-4.951-4.951l2.372-21.371L89.536,19.144A2.252,2.252,0,0,1,92.714,19.144ZM130.02,13.87,118.782,2.632a9.007,9.007,0,0,0-12.712,0l-8.152,8.152a2.252,2.252,0,0,0,0,3.178L118.69,34.734a2.252,2.252,0,0,0,3.178,0l8.152-8.152a9.007,9.007,0,0,0,0-12.712ZM88.43,79.709v23.443H14.738V29.461h52.92a2.831,2.831,0,0,0,1.957-.806l9.212-9.211a2.763,2.763,0,0,0-1.957-4.721H11.054A11.057,11.057,0,0,0,0,25.776v81.061a11.057,11.057,0,0,0,11.054,11.054H92.115a11.057,11.057,0,0,0,11.054-11.054V70.5a2.768,2.768,0,0,0-4.721-1.957l-9.211,9.212A2.831,2.831,0,0,0,88.43,79.709Z" transform="translate(0 -0.007)" />
                                           
                                             </svg>


                                         </div>

                                         <div class="detalis-content">

                                             <div class="detalis-title"> وصف المخيم :</div>
                                             <div class="detalis-text detalis-desc">

                                                {!!$trip->description!!}

                                             </div>

                                         </div>   
                                     </div>
                        
                                 
                                 </div>
                                      
                                 
                                 
                             </div>
                         
                         </div>
                         

                          
                     </div>
                 </div> 
                 <div class="preson-no">
                 
                     <div class="form-group" style="display: none">
                     
                         <label class="form-label title-3">تاريخ الحجز</label>
                         <input type="text" autocomplete="off" class="form-control input-focus datepicker " id="date-range">
                         
                     </div>
                    <a class="submit-btn reservation-btn" href="/trips/{{$trip->id}}/book?members=1">حجز</a>
                 </div>
             </div>
            </div>
        
        </section>

@endsection


@push('scripts')
   
    <!-- swiper js -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    
    <!-- swiper css -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    
    
    <script>
    
      
        
         var swiper = new Swiper(".camp-slider", {
             
                grabCursor: true,
                spaceBetween: 5,
                pagination: {
                  el: ".swiper-pagination",
                  clickable: true,
                },
        });
    
        
    </script>
    
   
@endpush
