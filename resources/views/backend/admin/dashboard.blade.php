@extends('backend.admin.layouts.app')

@section('content')

<div class="section-style statistics-section">


        <div class="container">

            <div class="statistics-boxs">

                <div class="row row-cols-xl-4  row-cols-md-2 row-cols-sm-2 row-cols-1 justify-content-center">

                    <div class="box-wrap">

                        <div class="box-item">

                            <div class="box-icon">

                                <svg xmlns="http://www.w3.org/2000/svg" width="74" height="74" viewBox="0 0 74 74">
                                  <circle id="Oval" cx="37" cy="37" r="37" fill="#faca00" opacity="0.24"/>
                                  <g id="_2_User" data-name="2 User" transform="translate(24.406 23.702)">
                                    <path id="Path" d="M0,9.494A4.816,4.816,0,0,0,4.883,4.747,4.817,4.817,0,0,0,0,0" transform="translate(19.651 1.54)" fill="none" stroke="#faca00" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                    <path id="Path-2" data-name="Path" d="M0,0A16.573,16.573,0,0,1,2.395.335c1.094.212,2.412.648,2.88,1.6a2.2,2.2,0,0,1,0,1.936c-.466.955-1.786,1.391-2.88,1.61" transform="translate(21.896 16.192)" fill="none" stroke="#faca00" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                    <path id="Path-3" data-name="Path" d="M10.131,0C15.6,0,20.263.8,20.263,4.02S15.625,8.068,10.131,8.068C4.666,8.068,0,7.265,0,4.049S4.637,0,10.131,0Z" transform="translate(0 17.215)" fill="none" stroke="#faca00" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                    <path id="Path-4" data-name="Path" d="M6.492,12.625A6.381,6.381,0,0,1,0,6.312,6.381,6.381,0,0,1,6.492,0a6.382,6.382,0,0,1,6.494,6.312A6.383,6.383,0,0,1,6.492,12.625Z" transform="translate(3.639 0)" fill="none" stroke="#faca00" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="1.5"/>
                                  </g>
                                </svg>


                            </div>
                            <div class="box-content">
                                <div class="box-title">عدد المستخدمين</div>
                                <div class="box-value">{{$comapnies->count()}}</div>
                            </div>
                        </div>

                    </div>
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
                                <div class="box-title">عدد المشغلين</div>
                                <div class="box-value">{{$oprators->count()}}</div>
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
                                <div class="box-value">{{$sales->count()}}</div>
                            </div>
                        </div>

                    </div>
                    <div class="box-wrap">

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
                                <div class="box-value">{{$sales->sum('total_paid')}} ريال</div>
                            </div>
                        </div>

                    </div>


                </div>
            </div>
            <div class="statistics-tables-area">

                <div class="row">
                        <div class="col-xl">

                            <div class="statistics-table style-2">

                                <div class="table-head">

                                    <div class="table-title title-4">اخر مبيعات الرحلات</div>

                                </div>
                                <div class="table-container">

                                    <div class="table-responsive scroll   ">

                                        <table class="table table-borderless">
                                            <thead>
                                                <th>رقم الحجز</th>
                                                <th>اسم المستخدم</th>
                                                <th>كود الرحلة</th>
                                                <th>المبلغ المدفوع</th>
                                            </thead>
                                              <tbody>
                                                @if($trips_sales->count()>0)
                                                    @foreach($trips_sales as $sale)
                                                    <tr>
                                                        <td><p class="td-text">{{$sale->id}}</p></td>
                                                        <td><p class="td-text">{{$sale->name}}</p></td>
                                                        <td><p class="td-text">{{$sale->trip_code}}</p></td>
                                                        <td>
                                                            <p class="td-text td-num">
                                                                <span id="">{{$sale->total_paid}}</span>
                                                                <i class="fas fa-chevron-circle-up"></i>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                @endif
                                              </tbody>
                                            </table>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="col-xl">

                            <div class="statistics-table style-2">
                                <div class="table-head">

                                    <div class="table-title title-4">اخر مبيعات المخيمات</div>

                                </div>
                                <div class="table-container">

                                    <div class="table-responsive scroll  ">

                                        <table class="table table-borderless">
                                            <thead>
                                                <th>رقم الحجز</th>
                                                <th>اسم المستخدم</th>
                                                <th>كود الرحلة</th>
                                                <th>المبلغ المدفوع</th>
                                            </thead>
                                              <tbody>
                                                @if($camps_sales->count()>0)
                                                    @foreach($camps_sales as $sale)
                                                    <tr>
                                                        <td><p class="td-text">{{$sale->id}}</p></td>
                                                        <td><p class="td-text">{{$sale->name}}</p></td>
                                                        <td><p class="td-text">{{$sale->trip_code}}</p></td>
                                                        <td>
                                                            <p class="td-text td-num">
                                                                <span id="">{{$sale->total_paid}}</span>
                                                                <i class="fas fa-chevron-circle-up"></i>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                @endif
                                              </tbody>
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
