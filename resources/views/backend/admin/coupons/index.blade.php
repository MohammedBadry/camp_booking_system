@extends('backend.admin.layouts.app')

@section('title', 'أكواد الخصم')
@section('mobile_breadcrumb', 'أكواد الخصم')

@section('content')

    <div class="section-style duplicated-table-section ">
    
        <div class="container">
        
            <div class="row">
            
                <div class="col-12">
                
                    <div class="duplicated-table-area">
                        
                        <div class="table-show-item">
                            الإجمالي : 
                            <span>{{$coupons->count()}}</span>
                            كود الخصم
                    
                        </div>
                        
                        <a class="add-new-item table_add_btn" href="{{route('admin.coupons.create')}}">
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
                            إضافة كود خصم    
                        </a>

                        <div class="table-head">
                        
                                <div class="table-search">
                        
                                    <div class="form-group">
                                        <form method="GET" id="search_form" action="{{route('admin.coupons.index')}}">
                                            <input type="search" name="code" class="form-control input-focus" placeholder="بحث بالكود">
                                            <span class="search-icon" onclick="$('#search_form').submit()"><i class="fas fa-search"></i></span>  
                                        </form>
                                    </div>
                            
                            </div>
                                
                        </div>
                        
                        <div class="duplicated-table-item all-coupons-table">
                        
                                <div class="table-responsive scroll draggable-table">
                            
                                    
                                    <table class="table table-borderless">
                                        <thead>
                                        <tr>
                                            <th>النوع</th>
                                            <th>كود الخصم</th>
                                            <th>نسبة الخصم</th>
                                            <th>تاريخ النهاية</th>
                                            <th>حالة الكود</th>
                                            <th>الإضافة بواسطة</th>
                                            <th>    
                                                الإجراء                                           
                                                <!--div class="add-user-dropdown dropdown">
                                                    <a class="table-add-user-modal" href="#" role="button" id="addDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                                        <g>
                                                            <g>
                                                                <path d="M257,0C116.39,0,0,114.39,0,255s116.39,257,257,257s255-116.39,255-257S397.61,0,257,0z M392,285H287v107
                                                                    c0,16.54-13.47,30-30,30c-16.54,0-30-13.46-30-30V285H120c-16.54,0-30-13.46-30-30c0-16.54,13.46-30,30-30h107V120
                                                                    c0-16.54,13.46-30,30-30c16.53,0,30,13.46,30,30v105h105c16.53,0,30,13.46,30,30S408.53,285,392,285z"></path>
                                                            </g>
                                                        </g>
                                                        </svg>
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="addDropdown">
                                                        <li>                                                            
                                                            <a class="dropdown-item" href="{{route('admin.coupons.create')}}">
                                                                إضافة كود خصم                                                                
                                                            </a>                                                        
                                                        </li>                                                            
                                                    </ul>
                                                </div-->                                                 
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($coupons->count()>0)
                                            @foreach($coupons as $coupon)                                            
                                            <tr>
                                                <td>                                                
                                                    <p class="td-text">{{$coupon->trip_type==1 ? 'رحلة' : 'مخيم' }}</p>                                                
                                                </td>
                                                <td>                                                
                                                    <p class="td-text">{{$coupon->code}}</p>                                                
                                                </td>
                                                <td>                                                
                                                    <p class="td-text">{{$coupon->discount}}</p>                                                
                                                </td>
                                                <td>                                                
                                                    <p class="td-text">{{$coupon->expire_date}}</p>                                                
                                                </td>
                                                <td>                                                
                                                    <p class="td-text">{{$coupon->status==1 ? 'مفعل' : 'غير نشط'}}</p>                                                
                                                </td>
                                                <td>                                            
                                                    <p class="td-text">{{$coupon->adder->name.' - #'.$coupon->adder->id}}</p>
                                                    
                                                </td>
                                                <td>                                            
                                                    <div class="table-action dropdown">
                                                        <a class="action-btn" href="#" role="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                        </a>

                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <!--li><a class="dropdown-item show-trip" href="show-trip.html">عرض</a-->
                                                            <li><a class="dropdown-item" href="{{route('admin.coupons.edit', $coupon->id)}}">تعديل</a></li>
                                                            <li>
                                                                <?php
                                                                    $action = route('admin.coupons.destroy', $coupon->id);
                                                                ?>
                                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#confirmDelatemodal" onclick="$('#confirmDelatemodal #action').val('{{$action}}');">حذف</a>
                                                            </li>
                                                        </ul>
                                                    </div>                                                
                                                </td>                                             
                                            </tr>
                                            <tr>
                                            @endforeach
                                        @else                                              
                                        <tr style="display: none">
                                        
                                            <td valign="top" colspan="8" class="dataTables_empty">
                                            
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
                                    {{$coupons->render("pagination::bootstrap-4")}}
                                </nav>
                            </div>
                        
                        </div>                                                
                    </div>
                
                </div>
            
            </div>
        
        </div>
        
    </div>

@endsection