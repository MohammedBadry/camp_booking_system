@extends('backend.operator.layouts.app')

@section('content')

<div class="section-style statistics-section">
        
        
        <div class="container">
        
            <div class="statistics-boxs">
            
                <div class="row row-cols-xl-4  row-cols-md-2 row-cols-sm-2 row-cols-1 justify-content-center">
                
                    <div class="box-wrap">
                    
                        <div class="box-item">
                        
                            <div class="box-icon">
                            
                               <svg xmlns="http://www.w3.org/2000/svg" width="74" height="74" viewBox="0 0 74 74">
                                  <circle id="Oval" cx="37" cy="37" r="37" fill="#748bdc" opacity="0.24"/>
                                  <g id="Time_Circle" data-name="Time Circle" transform="translate(22.64 22.308)">
                                    <path id="Path" d="M29.618,14.809A14.809,14.809,0,1,1,14.809,0,14.808,14.808,0,0,1,29.618,14.809Z" fill="none" stroke="#748bdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                    <path id="Path-2" data-name="Path" d="M6.17,12.341,0,8.43V0" transform="translate(14.809 7.404)" fill="none" stroke="#748bdc" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                  </g>
                                </svg>

                            
                            </div>
                            <div class="box-content">
                                <div class="box-title">عدد الرحلات</div>
                                <div class="box-value">{{$trips->count()}}</div>
                            </div>
                        </div>
                    
                    </div>
                    <div class="box-wrap">
                    
                        <div class="box-item">
                        
                            <div class="box-icon">
                            
                               <svg xmlns="http://www.w3.org/2000/svg" width="74" height="74" viewBox="0 0 74 74">
                                  <circle id="Oval" cx="37" cy="37" r="37" fill="#e17574" opacity="0.24"/>
                                  <g id="Bag" transform="translate(24.289 21.074)">
                                    <path id="Path" d="M7.316,22.213H19.847c4.6,0,8.134-1.676,7.131-8.42L25.81,4.653C25.192,1.288,23.062,0,21.194,0H5.915c-1.9,0-3.9,1.385-4.617,4.653L.13,13.793C-.722,19.776,2.713,22.213,7.316,22.213Z" transform="translate(0 7.404)" fill="none" stroke="#e17574" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                    <path id="Path-2" data-name="Path" d="M0,6.17A6.164,6.164,0,0,1,6.157,0h0a6.164,6.164,0,0,1,6.183,6.17h0" transform="translate(7.404)" fill="none" stroke="#e17574" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                    <path id="Path-3" data-name="Path" d="M.477.5H.534" transform="translate(8.75 12.458)" fill="none" stroke="#e17574" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                    <path id="Path-4" data-name="Path" d="M.477.5H.534" transform="translate(17.389 12.458)" fill="none" stroke="#e17574" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                  </g>
                                </svg>

                            
                            </div>
                            <div class="box-content">
                                <div class="box-title">عدد الحجوزات</div>
                                <div class="box-value">{{$bookings->count()}}</div>
                            </div>
                        </div>
                    
                    </div>
                    <!--div class="box-wrap">
                    
                        <div class="box-item">
                        
                            <div class="box-icon">
                            
                              <svg xmlns="http://www.w3.org/2000/svg" width="74" height="74" viewBox="0 0 74 74">
                                  <circle id="Oval" cx="37" cy="37" r="37" fill="#0ab39c" opacity="0.24"/>
                                  <g id="Activity" transform="translate(22 22.308)">
                                    <path id="Path" d="M0,7.149,4.584,1.574,9.813,5.418,14.3,0" transform="translate(7.149 12.256)" fill="none" stroke="#0ab39c" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                    <circle id="Oval-2" data-name="Oval" cx="3.064" cy="3.064" r="3.064" transform="translate(23.49 0)" fill="none" stroke="#0ab39c" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                    <path id="Path-2" data-name="Path" d="M18.917,0H7.6C2.908,0,0,3.322,0,8.012V20.6c0,4.69,2.851,8,7.6,8H21c4.69,0,7.6-3.307,7.6-8V9.637" transform="translate(0 1.021)" fill="none" stroke="#0ab39c" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                  </g>
                                </svg>


                            
                            </div>
                            <div class="box-content">
                            
                                <div class="box-title">اجمالي المبيعات</div>
                                <div class="box-value">{{$bookings->sum('total_paid')}}</div>
                            </div>
                        </div>
                    
                    </div-->
                    
                
                </div>
            </div>
            <div class="statistics-tables-area">
            
                
                <div class="row">
                    <div class="col-xl-12">
                    
                        <div class="statistics-table">
                        
                            <div class="table-head">
                            
                                <div class="table-title title-4">اخر المبيعات</div>
                                <div class="table-actions ">
                                
                                    <!--div class="action-item more">
                                    
                                        <a class="action-btn" href="#" role="button" id="moredropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </a>
                                        
                                        <ul class="dropdown-menu" aria-labelledby="moredropdownMenuLink">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                        </ul>
                                        
                                    </div>
                                    <div class="action-item downlaod">
                                    
                                        <a class="action-btn" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="Download"><i class="fas fa-cloud-download-alt"></i></a>
                                    
                                    </div>
                                    <div class="action-item filters">
                                    
                                        <a class="action-btn" href="#">
                                        
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18.79" height="18.79" viewBox="0 0 18.79 18.79">
                                              <path id="Path" d="M6.305,17.29l4.129-1.943V10.253l6.475-6.567a1.33,1.33,0,0,0,.381-.937V1.312A1.292,1.292,0,0,0,16.019,0H1.271A1.292,1.292,0,0,0,0,1.312v1.47a1.334,1.334,0,0,0,.343.9l5.962,6.574Z" transform="translate(0.75 0.75)" fill="none" stroke="#5e8c70" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5" opacity="0.7"/>
                                            </svg>

                                        
                                        </a>
                                    
                                    </div-->
                                    
                                </div>
                            </div>
                            <div class="table-container">
                            
                                <div class="table-responsive scroll">
                            
                                    <table class="table table-borderless">
                                          <thead>
                                                <tr>
                                                    <th>رقم الحجز</th>
                                                    <th>اسم المستخدم</th>
                                                    <th>حالة الرحلة</th>
                                                    <th>فئة الرحلة</th>
                                                    <th>كود الرحلة</th>
                                                    <th>تاريخ الرحلة</th>
                                                    <th>الحالة</th>
                                                    <th>المبلغ المدفوع</th>
                                                </tr>
                                            </thead>
                                          <tbody>
                                            @if($bookings->count()>0)
                                                @foreach($bookings as $booking) 
                                                <tr>
                                                    <td><p class="td-text">{{$booking->id}}</p></td>
                                                    <td><p class="td-text">{{$booking->name}}</p></td>
                                                    <td>                                            
                                                        <p class="td-text">{{$booking->trip->status==0 ? 'خاصة' : 'عامة'}}</p>                                                
                                                    </td>
                                                    <td><p class="td-text">{{$booking->trip->category->name}}</p></td>
                                                    <td><p class="td-text">{{$booking->trip->code}}</p></td>
                                                    <td><p class="td-text">{{$booking->trip->type_id==1 ? $booking->trip->trip_date : '-'}}</p></td>
                                                    <td>
                                                        @if($booking->trip->type_id==1)
                                                            @if($booking->status==1)
                                                            <p class="td-text done" style="color: #1BC167">تم الدخول</p>
                                                            @else
                                                                <p class="td-text processing" style="color: #ffc107">لم يتم الدخول</p>
                                                            @endif
                                                        @else
                                                        -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <p class="td-text td-num">                                                        
                                                            <span id="">{{$booking->total_paid}}</span>
                                                            <i class="fas fa-chevron-circle-up"></i>
                                                        </p>                                                    
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            @endif
                                        </table>
                            
                                </div>
                                
                            </div>
                            
                        </div>
                    
                    </div>
                
                </div>
            
            
            </div>
        </div>
    
    </div>

@endsection