@extends('backend.company.layouts.app')

@section('title', 'الرحلات')
@section('mobile_breadcrumb', 'الرحلات')

@section('content')

    <div class="section-style reservation-items-section trips-section ">
    
        <div class="container">
        
            <div class="row">
            
                <div class="col-12">
                
                    <div class="reservation-items-area trips-area">
                    
                        <div class="area-body">
                        
                            <div class="items-container trips-container one-trip-container">
                            
                                <div class="row">
                                        <div class="col-12">
                                    
                                        <div class="sub-title one-trip-title">
                                        
                                                تعديل الرحلة
                                            
                                        </div>
                                    
                                    </div>
                                    
                                    <div class="item-wrap">
                                    
                                        <div class="item-box trip-box add-trip modify-style">
                                        
                                            <div class="item-banner-wrap">
                                            
                                                <button type="button" id="upload-banner-btn" onclick="$('#image').click();" class="upload-banner-btn" style="display: none">
                                                
                                                    
                                                    <span>
                                                    
                                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                            viewBox="0 0 471.2 471.2" style="enable-background:new 0 0 471.2 471.2;" xml:space="preserve">
                                                    <g>
                                                        <g>
                                                            <path d="M457.7,230.15c-7.5,0-13.5,6-13.5,13.5v122.8c0,33.4-27.2,60.5-60.5,60.5H87.5c-33.4,0-60.5-27.2-60.5-60.5v-124.8
                                                                c0-7.5-6-13.5-13.5-13.5s-13.5,6-13.5,13.5v124.8c0,48.3,39.3,87.5,87.5,87.5h296.2c48.3,0,87.5-39.3,87.5-87.5v-122.8
                                                                C471.2,236.25,465.2,230.15,457.7,230.15z"/>
                                                            <path d="M159.3,126.15l62.8-62.8v273.9c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5V63.35l62.8,62.8c2.6,2.6,6.1,4,9.5,4
                                                                c3.5,0,6.9-1.3,9.5-4c5.3-5.3,5.3-13.8,0-19.1l-85.8-85.8c-2.5-2.5-6-4-9.5-4c-3.6,0-7,1.4-9.5,4l-85.8,85.8
                                                                c-5.3,5.3-5.3,13.8,0,19.1C145.5,131.35,154.1,131.35,159.3,126.15z"/>
                                                        </g>
                                                    </g>

                                                    </svg>
                                                    
                                                    
                                                    </span>
                                                    أضغط للرفع الصورة
                                                
                                                </button>
                                                
                                                <div class="banner-wrap" id="image_preview" style="display: ">                                                
                                                    <img id="output" src="{{url('uploads/trips/'.$trip->image)}}">
                                                    <button type="button" class="remove-btn" onclick="$('#upload-banner-btn').show(); $('#image_preview').hide();">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                                <span class="banner-notes">* المقاس المناسب للصورة هو 600×300 بكسل</span>
                                                
                                            </div>
                                            
                                            <div class="item-details trip-details">
                                            
                                                <form class="item-details-form trip-details-form" method="POST" action="{{route('company.trips.update', $trip->id)}}" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')

                                                    <input type="hidden" name="type_id" value="{{$trip->type_id}}">
                                                    <input type="hidden" name="trip_id" value="{{$trip->id}}">
                                                    <input type="file" name="image" id="image" style="visibility: hidden" onchange="$('#image_preview').show(); loadFile(event)">
                                                    @error('image')
                                                        <div class="alert-danger">{{$errors->first('image') }} </div>
                                                    @enderror
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-group">                                                        
                                                                <label class="form-label">عنوان الرحلة</label>
                                                                <input type="text" name="title" value="{{$trip->title}}" class="form-control input-focus {{$errors->has('title') ? 'is-invalid' : ''}}" placeholder="عنوان الرحلة" required>
                                                                @error('title')
                                                                    <div class="alert-danger">{{$errors->first('title') }} </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label">السعة</label>
                                                                <input type="text" name="capacity" value="{{$trip->capacity}}" class="form-control input-focus {{$errors->has('capacity') ? 'is-invalid' : ''}}" placeholder="سعة الرحلة للاشخاص" required>
                                                                @error('capacity')
                                                                    <div class="alert-danger">{{$errors->first('capacity') }} </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label">السعر</label>
                                                                <input type="text" name="price" value="{{$trip->price}}" class="form-control input-focus {{$errors->has('price') ? 'is-invalid' : ''}}" placeholder="السعر بالريال" required>
                                                                @error('price')
                                                                    <div class="alert-danger">{{$errors->first('price') }} </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group data-input-wrap">
                                                                <label class="form-label">تاريخ الرحلة</label>
                                                                <div class="data-input">
                                                                    <input type="text" name="trip_date" value="{{date('m/d/Y', strtotime($trip->trip_date))}}" class="form-control input-focus datepicker {{$errors->has('trip_date') ? 'is-invalid' : ''}}" placeholder="تاريخ الرحلة" required>
                                                                    <span class="data-icon"><i class="fas fa-calendar-week"></i></span>
                                                                    @error('trip_date')
                                                                        <div class="alert-danger">{{$errors->first('trip_date') }} </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label">المشغل</label>
                                                                <select name="operator_id" class="form-select select2 {{$errors->has('operator_id') ? 'is-invalid' : ''}}" aria-label="Default select example" required>
                                                                    <option selected  disabled>المشغل</option>
                                                                    @foreach($operators as $operator)
                                                                    <option value="{{$operator->id}}" <?php if($trip->operator_id==$operator->id) { echo 'selected'; } ?>>{{$operator->name}}</option>
                                                                    @endforeach                                                                  
                                                                </select>
                                                                @error('operator_id')
                                                                    <div class="alert-danger">{{$errors->first('operator_id') }} </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label">فئة الرحلة</label>
                                                                <select name="category_id" class="form-select select2 {{$errors->has('category_id') ? 'is-invalid' : ''}}" aria-label="Default select example" >
                                                                    <option selected disabled>فئة الرحلة </option>
                                                                    @foreach($categories as $category)
                                                                    <option value="{{$category->id}}" <?php if($trip->category_id==$category->id) { echo 'selected'; } ?>>{{$category->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('category_id')
                                                                    <div class="alert-danger">{{$errors->first('category_id') }} </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label">نوع الرحلة</label>
                                                                <select name="status" class="form-select select2 {{$errors->has('status') ? 'is-invalid' : ''}}" aria-label="Default select example" >
                                                                    <option selected disabled>نوع الرحلة </option>
                                                                    <option value="1" <?php if($trip->status==1) { echo 'selected'; } ?>>عامة</option>
                                                                    <option value="0" <?php if($trip->status==0) { echo 'selected'; } ?>>خاصة</option>
                                                                </select>
                                                                @error('status')
                                                                    <div class="alert-danger">{{$errors->first('status') }} </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label">كود الرحلة</label>
                                                                <input type="text" name="code" value="{{$trip->code}}" class="form-control input-focus {{$errors->has('code') ? 'is-invalid' : ''}}" placeholder="كود الرحلة" required>
                                                                @error('code')
                                                                    <div class="alert-danger">{{$errors->first('code') }} </div>
                                                                @enderror
                                                            </div>                                                   
                                                        </div>                                                        
                                                        <div class="col-12">                                                        
                                                            <div class="form-group">                                                        
                                                                <label class="form-label">الوصف</label>
                                                                <textarea id="description" name="description" class="form-control input-focus {{$errors->has('description') ? 'is-invalid' : ''}}" placeholder="الوصف" required>{{$trip->description}}</textarea>
                                                                @error('description')
                                                                    <div class="alert-danger">{{$errors->first('description') }} </div>
                                                                @enderror
                                                            </div>                                                       
                                                        </div>
                                                        <div class="col-12">                                                        
                                                            <div class="item-details-btns">
                                                                <button type="submit" class="details-btn add-btn modify-btn">تحديث</button>
                                                            </div>
                                                        </div>
                                                    </div>                                                
                                                </form>
                                            
                                            </div>
                                            
                                        </div>
                                    
                                    </div>
                                
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            
            </div>
        
        </div>
        
    </div>

@endsection

<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
      document.getElementById('upload-banner-btn').style.display = 'none';
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>

@push('scripts')
    {{--ck editor--}}
    <script src="{{ asset('backend')}}/js/ckeditor/ckeditor.js"></script>
    <script>CKEDITOR.replace('editor');</script>
    {{--ck editor--}}
    <script>
        CKEDITOR.replace('description', {
            contentsLangDirection : 'rtl',
        });
    </script>
@endpush