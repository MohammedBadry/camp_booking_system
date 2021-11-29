@extends('backend.admin.layouts.app')

@section('title', 'المبيعات')
@section('mobile_breadcrumb', 'المبيعات')

@section('content')

    <div class="section-style duplicated-table-section ">

        <div class="container">

            <div class="row">

                <div class="col-12">

                    <div class="duplicated-table-area">

                        <div class="table-show-item">
                            إجمالي المبيعات :
                            <span>{{$total_sales}}</span>
                            ريال
                        </div>
                        
                        <a class="add-new-item table_add_btn download_excel " href="{{route('admin.bookings.export')}}">
                                <span>
                                    
                                    <svg height="132px" style="enable-background:new 0 0 124 132;" version="1.1" viewBox="0 0 124 132" width="124px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><style type="text/css">
                                            <![CDATA[
                                            	.st0{fill:#EF3E42;}
                                            	.st1{fill:#FFFFFF;}
                                            	.st2{fill:none;}
                                            	.st3{fill-rule:evenodd;clip-rule:evenodd;fill:#FFFFFF;}
                                            ]]>
                                    </style><defs/><path d="M99.1,113.7c2.6,0,4.7-2.1,4.7-4.7V79.9h11.2v29.8c0,8.4-6.8,15.2-15.2,15.2H18.5c-8.4,0-15.2-6.8-15.2-15.2V79.9h11.2V109  c0,2.6,2.1,4.7,4.7,4.7H99.1L99.1,113.7z M37.1,17.7h43.9V57h16.8L59.1,94.8L20.4,57h16.8V17.7L37.1,17.7z"/><rect class="st2" height="132" id="_x3C_Slice_x3E__100_" width="124"/></svg>
                                    
                                </span>
                            تحميل   
                        </a>

                        <div class="table-head">
                                <div class="table-search">
                                    <div class="form-group">
                                        <form method="GET" id="search_form" action="{{route('admin.sales.index')}}">
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
                                            <th>نوع الرحلة</th>
                                            <th>كود الرحلة / المخيم</th>
                                            <th>تاريخ الرحلة</th>
                                            <th>السعر</th>
                                            <th>كود الخصم</th>
                                            <th>قمية الخصم</th>
                                            <th>المبلغ المدفوع</th>
                                            <th>ملاحظات</th>
                                            <th>المشغل</th>
                                            <th>مسؤول الدخول</th>
                                            <th>أضيفت بواسطة</th>
                                            <th>تاريخ الحجز</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($total_sales>0)
                                            @foreach($sales as $booking)
                                            <tr>
                                                <td>
                                                    <p class="td-text">{{$booking->booking_id}}</p>
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
                                                    <p class="td-text">{{$booking->booking_type}}</p>
                                                </td>
                                                <td>
                                                    <p class="td-text">{{$booking->trip_type}}</p>
                                                </td>
                                                <td>
                                                    <p class="td-text">{{$booking->trip_code}}</p>
                                                </td>
                                                <td>
                                                    <p class="td-text">{{$booking->trip_date}}</p>
                                                </td>
                                                <td>
                                                    <p class="td-text">{{$booking->trip_price}} ريال</p>
                                                </td>
                                                <td>
                                                    <p class="td-text">{{$booking->coupon_code}}</p>
                                                </td>
                                                <td>
                                                    <p class="td-text">{{$booking->coupon_discount.'%'}}</p>
                                                </td>
                                                <td>
                                                    <p class="td-text">{{$booking->total_paid}} ريال</p>
                                                </td>
                                                <td>
                                                    <p class="td-text">{{$booking->notes}}</p>
                                                </td>
                                                <td>
                                                    <p class="td-text">{{$booking->operator }}</p>

                                                </td>
                                                <td>
                                                    <p class="td-text">{{$booking->entry}}</p>
                                                </td>
                                                <td>
                                                    <p class="td-text">{{$booking->added_by}}</p>
                                                </td>
                                                <td>
                                                    <p class="td-text">{{$booking->booking_type=='رحلة' ? $booking->created_at : $booking->period}}</p>
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
                                    {{$sales->render("pagination::bootstrap-4")}}
                                </nav>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
