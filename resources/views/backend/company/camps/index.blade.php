@extends('backend.company.layouts.app')

@section('title', 'المخيمات')
@section('mobile_breadcrumb', 'الرحلات')

@section('content')

    <div class="section-style duplicated-table-section ">
    
        <div class="container">
        
            <div class="row">
            
                <div class="col-12">
                
                    <div class="duplicated-table-area">
                        
                        <div class="table-show-item">
                                    الإجمالي : 
                                    <span>{{$trips->count()}}</span>
                                    مخيم
                            
                        </div>
                        
                        <a class="add-new-item table_add_btn" href="{{route('company.trips.create')}}/?type_id={{request()->get('type_id')}}">
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
                            إضافة مخيم جديد
                        </a>

                        <div class="table-head">
                        
                                <div class="table-search">
                        
                                    <div class="form-group">
                                        <form method="GET" id="search_form" action="{{route('company.trips.index')}}">
                                            <input type="search" name="code" class="form-control input-focus" placeholder="بحث بالكود">
                                            <span class="search-icon" onclick="$('#search_form').submit()"><i class="fas fa-search"></i></span>  
                                        </form>
                                    </div>
                            
                            </div>
                                
                        </div>
                        
                        <div class="duplicated-table-item all-trips-table">
                        
                                <div class="table-responsive scroll draggable-table">
                            
                                    
                                    <table class="table table-borderless table-xl">
                                        <thead>
                                        <tr>
                                            <th>كود المخيم</th>
                                            <th>فئة المخيم</th>
                                            <th>حجم المخيم</th>
                                            <th>السعة</th>
                                            <th>عدد المخيمات</th>
                                            <th>السعر</th>
                                            <th>الإضافة بواسطة</th>
                                            <th>تاريخ الإضافة</th>                                            
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
                                                                
                                                                <a class="dropdown-item" href="{{route('company.trips.create')}}">
                                                                    إضافة مخيم جديدة
                                                                
                                                                </a>
                                                            
                                                            </li>
                                                                

                                                        </ul>

                                                </div-->                                                 
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($trips->count()>0)
                                            @foreach($trips as $trip)                                            
                                            <tr>
                                                <td>                                                
                                                    <p class="td-text">{{$trip->code}}</p>                                                
                                                </td>
                                                <td>                                            
                                                    <p class="td-text">{{$trip->category->name}}</p>                                                
                                                </td>
                                                <td>                                            
                                                    <p class="td-text">{{$trip->size}}</p>                                                
                                                </td>
                                                <td>                                            
                                                    <p class="td-text">{{"من ". $trip->from." إلى".$trip->to." شخص " }}</p>                                                
                                                </td>
                                                <td>                                            
                                                    <p class="td-text">{{$trip->camps_num}}</p>                                                
                                                </td>
                                                <td>                                            
                                                    <p class="td-text">{{$trip->price}} ريال</p>                                                
                                                </td>
                                                <td>                                            
                                                    <p class="td-text">
                                                        <?php
                                                        if($trip->adder) {
                                                            echo $trip->adder->name.' - #'.$trip->adder->id;
                                                        } else {
                                                            echo "-";
                                                        }
                                                        ?>
                                                    </p>                                                    
                                                </td>
                                                <td>                                            
                                                    <p class="td-text">{{$trip->created_at}}</p>
                                                    
                                                </td>
                                                <td>                                            
                                                    <div class="table-action dropdown">
                                                        <a class="action-btn" href="#" role="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fas fa-ellipsis-h"></i>
                                                        </a>

                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                                            <!--li><a class="dropdown-item show-trip" href="show-trip.html">عرض</a-->
                                                            <li><a class="dropdown-item" href="{{route('company.trips.edit', $trip->id)}}/?type_id={{request()->get('type_id')}}">تعديل</a></li>
                                                            <li>
                                                                <?php
                                                                    $action = route('company.trips.destroy', $trip->id);
                                                                ?>
                                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#confirmDelatemodal" onclick="$('#confirmDelatemodal #action').val('{{$action}}');$('#type_id').val('2')">حذف</a>
                                                            </li>
                                                        </ul>
                                                    </div>                                                
                                                </td>                                             
                                            </tr>
                                            <tr>
                                            @endforeach
                                        @else                                              
                                        <tr style="display: none">
                                        
                                            <td valign="top" colspan="9" class="dataTables_empty">
                                            
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
                                    {{$trips->render("pagination::bootstrap-4")}}
                                </nav>
                            </div>
                        
                        </div>
                        
                        
                    </div>
                
                </div>
            
            </div>
        
        </div>
        
    </div>

@endsection