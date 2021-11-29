@extends('backend.admin.layouts.app')

@section('title', 'الحجوزات')
@section('mobile_breadcrumb', 'الحجوزات')

@section('content')

    <div class="section-style duplicated-add-section ">

        <div class="container">

            <div class="row">

                <div class="col-12">

                    <div class="duplicated-add-area add-new-user add-reservation">

                        <div class="add-area-title title-4">

                            <p>إضافة حجز</p>

                        </div>
                        <div class="add-box-wrap">

                            <form class="add-form add-new-user-form" method="POST" action="{{route('admin.bookings.store')}}">
                                @csrf
                                @method('POST')
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control input-focus {{$errors->has('name') ? 'is-invalid' : ''}}" value="{{old('name')}}" placeholder="الاسم بالكامل" required>
                                            @error('name')
                                                <div class="alert-danger">{{$errors->first('name') }} </div>
                                            @enderror
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control input-focus {{$errors->has('email') ? 'is-invalid' : ''}}" value="{{old('email')}}"  placeholder="البريد الإلكتروني" required>
                                            @error('email')
                                                <div class="alert-danger">{{$errors->first('email') }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="tel" name="mobile" class="form-control input-focus {{$errors->has('mobile') ? 'is-invalid' : ''}}" value="{{old('mobile')}}" placeholder="رقم الجوال" required>
                                            @error('mobile')
                                                <div class="alert-danger">{{$errors->first('mobile') }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="passport" class="form-control input-focus {{$errors->has('passport') ? 'is-invalid' : ''}}" value="{{old('passport')}}" placeholder="رقم الهوية / رقم الإقامة / رقم الجواز" required>
                                            @error('passport')
                                                <div class="alert-danger">{{$errors->first('passport') }} </div>
                                            @enderror
                                       </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select name="category_id" class="form-select" onchange="if($(this).val()==2) { $('#period_div').show(); $('#checks_div').hide();} else { $('#period_div').hide(); $('#checks_div').show(); }">
                                                <option selected disabled> نوع الحجز </option>
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}" <?php if(old('category_id')==$category->id) { echo 'selected'; } ?>>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="code" class="form-control input-focus {{$errors->has('code') ? 'is-invalid' : ''}}" value="{{old('code')}}"  placeholder="كود الرحلة / المخيم" required>
                                            @error('code')
                                                <div class="alert-danger">{{$errors->first('code') }} </div>
                                            @enderror
                                        </div>
                                    </div>

                                    @if($errors->has('period'))
                                    <div class="col-lg-6" id="period_div">
                                    @else
                                    <div class="col-lg-6" id="period_div" style="display: none">
                                    @endif
                                         <div class="form-group">
                                                <input type="hidden" name="days" id="days">
                                             <input type="text" name="period" autocomplete="off" class="form-control input-focus datepicker-input " id="date-range" placeholder="تاريخ الحجز ">
                                            @error('period')
                                                <div class="alert-danger">{{$errors->first('period') }} </div>
                                            @enderror
                                         </div>
                                    </div>

                                    <div class="col-lg-12" id="checks_div" style="display: none">
                                        <div class="form-group">
                                            <label class="form-label">هل يعاني من اي امراض مزمنة</label>
                                            <div class="check-diseases-wrap">
                                                <div class="form-check" onclick="$('#notes_div').show();">
                                                    <input class="form-check-input" type="radio" name="checkDiseases" id="Radio1">
                                                    <label class="form-check-label" for="Radio1">
                                                        نعم
                                                    </label>
                                                </div>
                                                <div class="form-check" onclick="$('#notes_div').hide();">
                                                    <input class="form-check-input" type="radio" name="checkDiseases" id="Radio2">
                                                    <label class="form-check-label" for="Radio2">
                                                        لا
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12" id="notes_div" style="display: none">
                                        <div class="form-group">
                                            <textarea name="notes" class="form-control input-focus {{$errors->has('notes') ? 'is-invalid' : ''}}" placeholder="اكتب ملاحظاتك"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="add-btn">اضافة</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection

@push('scripts')
<!-- datepicker js -->
<script src="{{asset('frontend')}}/js/hotel-datepicker.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fecha@4.2.1/lib/fecha.umd.min.js"></script>
<script>

    var input = document.getElementById('date-range');
    var datepicker = new HotelDatepicker(input, {
        format:"YYYY/MM/DD",
        selectForward: true,
        autoClose: false,
        moveBothMonths:true,
        animationSpeed:".1s",
        //endDate: "2021/12/30"
    });
    input.addEventListener('afterClose', function () {
        //alert(datepicker.getNights());
        $('#days').val(datepicker.getNights());
    }, false);

</script>
@endpush
