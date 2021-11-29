@extends('backend.admin.layouts.app')

@section('title', 'المخيمات')
@section('mobile_breadcrumb', 'المخيمات')

@section('content')

    <div class="section-style reservation-items-section trips-section ">

        <div class="container">

            <div class="row">

                <div class="col-12">

                    <div class="reservation-items-area trips-area camps-area">

                        <div class="area-body">

                            <div class="items-container trips-container one-trip-container">

                                <div class="row">
                                        <div class="col-12">

                                        <div class="sub-title one-trip-title">

                                            تعديل المخيم

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

                                                <form class="item-details-form trip-details-form" method="POST" action="{{route('admin.trips.update', $trip->id)}}" enctype="multipart/form-data">
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
                                                                <label class="form-label">اسم المخيم</label>
                                                                <input type="text" name="title" value="{{$trip->title}}" class="form-control input-focus {{$errors->has('title') ? 'is-invalid' : ''}}" placeholder="اسم المخيم" required>
                                                                @error('title')
                                                                    <div class="alert-danger">{{$errors->first('title') }} </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label">فئة المخيم</label>
                                                                <select name="category_id" class="form-select select2 {{$errors->has('category_id') ? 'is-invalid' : ''}}" aria-label="Default select example" >
                                                                    <option selected disabled>فئة المخيم </option>
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
                                                                <label class="form-label">حجم المخيم</label>
                                                                <select name="size" class="form-select select2 {{$errors->has('size') ? 'is-invalid' : ''}}" aria-label="Default select example" >
                                                                    <option selected disabled>حجم المخيم </option>
                                                                    <option value="كبير" <?php if($trip->size=='كبير') { echo 'selected'; } ?>>كبير</option>
                                                                    <option value="صغير" <?php if($trip->size=='صغير') { echo 'selected'; } ?>>صغير</option>
                                                                </select>
                                                                @error('size')
                                                                    <div class="alert-danger">{{$errors->first('size') }} </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label">السعة من</label>
                                                                <input type="text" name="from" value="{{$trip->from}}" class="form-control input-focus {{$errors->has('from') ? 'is-invalid' : ''}}" placeholder="السعة من" required>
                                                                @error('from')
                                                                    <div class="alert-danger">{{$errors->first('from') }} </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label">السعة إلى</label>
                                                                <input type="text" name="to" value="{{$trip->to}}" class="form-control input-focus {{$errors->has('to') ? 'is-invalid' : ''}}" placeholder="السعة إلى" required>
                                                                @error('to')
                                                                    <div class="alert-danger">{{$errors->first('to') }} </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="form-label">عدد المخيمات</label>
                                                                <input type="text" name="camps_num" value="{{$trip->camps_num}}" class="form-control input-focus {{$errors->has('camps_num') ? 'is-invalid' : ''}}" placeholder="عدد المخيمات" required>
                                                                @error('camps_num')
                                                                    <div class="alert-danger">{{$errors->first('camps_num') }} </div>
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
                                                            <div class="form-group">
                                                                <label class="form-label">كود المخيم</label>
                                                                <input type="text" name="code" value="{{$trip->code}}" class="form-control input-focus {{$errors->has('code') ? 'is-invalid' : ''}}" placeholder="كود المخيم" required>
                                                                @error('code')
                                                                    <div class="alert-danger">{{$errors->first('code') }} </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-12">

                                                                <div class="camp-additions-area form-group">

                                                                    <label class="form-label"> الاضافات</label>
                                                                    <div class="camp-additions-inputs d-none">

                                                                        <input type="text" name="extra_name[]" class="form-control input-focus addition-name addition-input" placeholder="اسم الاضافة" autocomplete="off">

                                                                        <input type="number" name="extra_price[]" class="form-control input-focus addition-price addition-input" placeholder="السعر" inputmode="tel" autocomplete="off">

                                                                        <input type="number" name="extra_quantity[]" class="form-control input-focus addition-num addition-input" placeholder="الكمية" inputmode="tel" autocomplete="off">

                                                                        <button class="add-btn" type="button" onclick="append()"><i class="fas fa-plus-circle"></i></button>

                                                                    </div>
                                                                    
                                                                     <div class="camp-additions-inputs add-additions-wrap">
                                                                    
                                                                       <button class="add-btn" type="button" onclick="append()">
                                                                            
                                                                            اضغط لإنشاء إضافة جديدة للمخيم
                                                                            <span><i class="fas fa-plus-circle"></i></span>
                                                                        
                                                                        </button>
                                                                 
                                                                    </div>
                                                                    

                                                                    <div class="camp-additions-table">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-borderless">
                                                                              <tbody>
                                                                                  @foreach($collection = \App\Models\CampExtra::where('camp_id', $trip->id)->get() as $item)
                                                                                    <tr class="tr-{{$item->id}}">
                                                                                        <td>
                                                                                            <p class="td-text">{{$item->name}}</p>
                                                                                        </td>
                                                                                        <td>
                                                                                            <p class="td-text">
                                                                                                <span>{{$item->price}}</span>
                                                                                                ريال
                                                                                            </p>
                                                                                        </td>
                                                                                        <td>
                                                                                            <p class="td-text">
                                                                                                العدد :
                                                                                                <span>{{$item->quantity}}</span>
                                                                                            </p>
                                                                                        </td>
                                                                                        <td>
                                                                                            <p class="td-text delete-btn" onclick='deleteExtra("{{$item->id}}")'>
                                                                                                <i class="fas fa-times"></i>
                                                                                            </p>
                                                                                        </td>
                                                                                    </tr>
                                                                                  @endforeach
                                                                              </tbody>

                                                                            </table>

                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <script>
                                                                    var counter = 0;
                                                                    function append() {
                                                                        $("tbody").append('<tr id="tr-'+counter+'"><td><input type="text" name="extra_name[]" class="form-control input-focus addition-name addition-input" placeholder="اسم الاضافة" autocomplete="off"></td><td><input type="number" name="extra_price[]" class="form-control input-focus addition-price addition-input" placeholder="السعر" inputmode="tel" autocomplete="off"></td><td><input type="number" name="extra_quantity[]" class="form-control input-focus addition-num addition-input" placeholder="الكمية" inputmode="tel" autocomplete="off"></td><td><p class="td-text delete-btn" onclick="remove('+counter+');"><i class="fas fa-times"></i></p></td></tr>');
                                                                        counter++;
                                                                    }
                                                                    function remove(id) {
                                                                        $("#tr-"+id).remove();
                                                                    }
                                                                    function deleteExtra(id) {
                                                                        $.ajax({
                                                                            method: 'GET',
                                                                            url: '{{route("admin.extras.delete")}}',
                                                                            data: 'id='+id,
                                                                            success: function(data) {
                                                                                if(data>1) {
                                                                                    $('.tr-'+data).hide();
                                                                                }
                                                                            }
                                                                        });
                                                                    }
                                                                </script>

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