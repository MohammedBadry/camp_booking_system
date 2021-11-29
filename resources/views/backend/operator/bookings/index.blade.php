@extends('backend.operator.layouts.app')

@section('title', 'الحجوزات')
@section('mobile_breadcrumb', 'الحجوزات')

@section('content')

    <div class="section-style duplicated-table-section ">
    
        <div class="container">
        
            <div class="row">
            
                <div class="col-12">
                
                    <div class="duplicated-table-area">
                        
                        <div class="table-show-item">
                            الإجمالي : 
                            <span>{{$total_bookings}}</span>
                            حجز                    
                        </div>
                        
                        <div class="import-style">
                            <a class="add-new-item table_add_btn" href="{{route('operator.bookings.create')}}">
                                <span>                                    
                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                width="64px" height="64px" viewBox="0 0 64 64" style="enable-background:new 0 0 64 64;" xml:space="preserve">
                                        <g>
                                            <g>
                                                <g id="circle_copy_4">
                                                    <g>
                                                        <path d="M32,0C14.327,0,0,14.327,0,32s14.327,32,32,32s32-14.327,32-32S49.673,0,32,0z M32,62.001C15.432,62.001,2,48.568,2,32
                                                            C2,15.432,15.432,2,32,2c16.568,0,30,13.432,30,30C62,48.568,48.568,62.001,32,62.001z"/>
                                                    </g>
                                                </g>
                                                <g id="Menu_1_">
                                                    <g>
                                                        <polygon points="44,31 33,31 33,20 31,20 31,31 20,31 20,33 31,33 31,44 33,44 33,33 44,33 				"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </span>
                                إضافة حجز لشخص    
                            </a>

                            <a class="add-new-item table_add_btn import-btn" href="#" data-bs-toggle="modal" data-bs-target="#importModal"> 
                            
                                    <span>

                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    	 viewBox="0 0 67.671 67.671" style="enable-background:new 0 0 67.671 67.671;" xml:space="preserve">
                                    <g>
                                    	<path d="M52.946,23.348H42.834v6h10.112c3.007,0,5.34,1.536,5.34,2.858v26.606c0,1.322-2.333,2.858-5.34,2.858H14.724
                                    		c-3.007,0-5.34-1.536-5.34-2.858V32.207c0-1.322,2.333-2.858,5.34-2.858h10.11v-6h-10.11c-6.359,0-11.34,3.891-11.34,8.858v26.606
                                    		c0,4.968,4.981,8.858,11.34,8.858h38.223c6.358,0,11.34-3.891,11.34-8.858V32.207C64.286,27.239,59.305,23.348,52.946,23.348z"/>
                                    	<path d="M24.957,14.955c0.768,0,1.535-0.293,2.121-0.879l3.756-3.756v13.028v6v11.494c0,1.657,1.343,3,3,3s3-1.343,3-3V29.348v-6
                                    		V10.117l3.959,3.959c0.586,0.586,1.354,0.879,2.121,0.879s1.535-0.293,2.121-0.879c1.172-1.171,1.172-3.071,0-4.242l-8.957-8.957
                                    		C35.492,0.291,34.725,0,33.958,0c-0.008,0-0.015,0-0.023,0s-0.015,0-0.023,0c-0.767,0-1.534,0.291-2.12,0.877l-8.957,8.957
                                    		c-1.172,1.171-1.172,3.071,0,4.242C23.422,14.662,24.189,14.955,24.957,14.955z"/>
                                    </g>
                                    
                                    
                                    </svg>
                                    
                                    
                                    </span>
                                   إستيراد        
                            </a>
                            
                        </div>
                        
                        <!-- ***** import-modal ***** -->
                        <div class="bootstrap-modal import-modal modal fade" id="importModal" tabindex="-1" aria-labelledby="importModal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title title-2" id="exampleModalLabel"> إستيراد حجوزات </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                        <div class="terms-wrap">
                                            <form method="POST" id="import_form" action="{{route('operator.bookings.import')}}" enctype="multipart/form-data">
                                                @csrf
                                                <input class="form-control input-focus" type="file" name="excel_file" id="excel_file" required>
                                                <button type="submit" class="btn btn-success add-btn">إضافة</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-success" data-bs-dismiss="modal">إغلاق</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ***** import-modal ***** -->                        

                        <div class="table-head">
                                <div class="table-search">                        
                                    <div class="form-group">
                                        <form method="GET" id="search_form" action="{{route('operator.bookings.index')}}">
                                            <input type="search" name="keyword" class="form-control input-focus" placeholder="بحث">
                                            <span class="search-icon" onclick="$('#search_form').submit()"><i class="fas fa-search"></i></span>  
                                        </form>
                                    </div>                            
                            </div>                                
                        </div>
                        
                        <div class="duplicated-table-item all-bookings-table">
                        
                                <div class="table-responsive scroll draggable-table">
                            
                                    
                                    <table class="table table-borderless">
                                        <thead>
                                        <tr>
                                            <th>رقم الحجز</th>
                                            <th>اسم المستخدم</th>
                                            <th>رقم الجوال</th>
                                            <th>البريد الإلكتروني</th>
                                            <th>رقم الجواز</th>
                                            <th>نوع الحجز</th>
                                            <th>كود الرحلة</th>
                                            <th>تاريخ الرحلة</th>
                                            <th>حالة الرحلة</th>
                                            <th>السعر</th>
                                            <th>كود الخصم</th>
                                            <th>قمية الخصم</th>
                                            <th>المبلغ المدفوع</th>
                                            <th>الحالة</th>
                                            <th>ملاحظات</th>
                                            <th>مسؤول الدخول</th>
                                            <th>تاريخ الحجز</th>
                                            <th>  
                                                الإجراء                                             
                                                                                              
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($total_bookings>0)
                                            @foreach($bookings as $booking)                                            
                                            <tr>
                                                <td>                                                
                                                    <p class="td-text">{{$booking->id}}</p>                                                
                                                </td>
                                                <td>                                                
                                                    <p class="td-text">{{$booking->name}}</p>                                                
                                                </td>
                                                <td>                                                
                                                    <p class="td-text">{{$booking->mobile}}</p>                                                
                                                </td>
                                                <td>                                                
                                                    <p class="td-text">{{$booking->email}}</p>                                                
                                                </td>
                                                <td>                                                
                                                    <p class="td-text">{{$booking->passport}}</p>                                                
                                                </td>
                                                <td>                                                
                                                    <p class="td-text">{{$booking->category->name}}</p>                                                
                                                </td>
                                                <td>                                                
                                                    <p class="td-text">{{$booking->trip->code}}</p>                                                
                                                </td>
                                                <td>                                                
                                                    <p class="td-text">{{$booking->trip->trip_date}}</p>
                                                </td>
                                                <td>                                            
                                                    <p class="td-text">{{$booking->trip->status==0 ? 'خاصة' : 'عامة'}}</p>                                                
                                                </td>
                                                <td>                                                
                                                    <p class="td-text">{{$booking->trip->price}} ريال</p>                                                
                                                </td>
                                                <td>                                                
                                                    <p class="td-text">{{$booking->coupon ? $booking->coupon->code : '-'}}</p>                                                
                                                </td>
                                                <td>                                                
                                                    <p class="td-text">{{$booking->coupon ? $booking->coupon->discount.'%'.'%' : '-'}}</p>                                                
                                                </td>
                                                <td>                                                
                                                    <p class="td-text">{{$booking->total_paid}} ريال</p>                                                
                                                </td>
                                                <td>
                                                    @if($booking->status==1)
                                                    <p class="td-text done">تم الدخول</p>
                                                    @else
                                                        <p class="td-text processing">لم يتم الدخول</p>
                                                    @endif
                                                </td>
                                                <td>                                                
                                                    <p class="td-text">{{$booking->notes}}</p>                                                
                                                </td>
                                                <td>                                            
                                                    <p class="td-text">{{$booking->entry ? $booking->entry->name.' - #'.$booking->entry->code : '-'}}</p>
                                                    
                                                </td>
                                                <td>                                            
                                                    <p class="td-text">{{$booking->trip->type_id==1 ? $booking->created_at : $booking->period}}</p>
                                                </td>
                                                <td>                                            
                                                    <div class="table-action dropdown">
                                                        <a class="action-btn" href="#" role="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                        </a>

                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <!--li><a class="dropdown-item show-trip" href="show-trip.html">عرض</a-->
                                                            <li><a class="dropdown-item" href="{{route('operator.bookings.edit', $booking->id)}}">تعديل</a></li>
                                                            <li>
                                                                <?php
                                                                    $action = route('operator.bookings.destroy', $booking->id);
                                                                ?>
                                                                <!--a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#confirmDelatemodal" onclick="$('#confirmDelatemodal #action').val('{{$action}}');">حذف</a-->
                                                            </li>
                                                        </ul>
                                                    </div>                                                
                                                </td>                                             
                                            </tr>
                                            @endforeach
                                        @else                                              
                                        <tr style="display: none">
                                        
                                            <td valign="top" colspan="18" class="dataTables_empty">
                                            
                                                لا يوجد نتائج مطابقة للبحث
                                            
                                            </td>
                                            
                                        </tr>
                                        @endif
                                        </tbody>
                                    </table>
                            
                                </div>
                                
                        </div>
                        <div class="table-footer">
                        
                            <div class="table-Pagination">
                            
                                <nav aria-label="table-Pagination">
                                    {{$bookings->render("pagination::bootstrap-4")}}
                                </nav>
                            </div>
                        
                        </div>                                                
                    </div>
                
                </div>
            
            </div>
        
        </div>
        
    </div>

@endsection