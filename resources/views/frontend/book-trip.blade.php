@extends('frontend.layouts.app')

@section('content')

    <section class="section-style compelate-reservation-section " >

        <div class="container ">
            <div class="compelate-reservation-container bounded-area">

                <div class="section-title">

                    <h3>اتمام الحجز والدفع</h3>

                </div>
                <div class="compelate-reservation-area ">

                    <form class="compelate-reservation-form" method="POST" action="{{route('frontend.bookings.store', $trip->id)}}">
                        @csrf
                        <h2 class="compelate-reservation-title title-2">معلومات التسجيل</h2>

                        <div class="form-area">
                            <?php
                            $members = 1;
                            if(request()->has('members') && request()->get('members')>0) {
                                $members = request()->get('members');
                            }
                            for($i=1; $i<=$members; $i++) {
                                $x = $i-1;
                            ?>
                            <input type="hidden" id="members" name="members" value="{{$members}}">
                            <input type="hidden" name="category_id" value="1">
                            <div class="reservation-wrap">
                                <h1 class="person-number title-3">الشخص {{$i}}</h1>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">الاسم بالكامل</label>
                                            <input type="text" name="name[]" value="{{old('name.'.$x)}}" class="form-control input-focus {{$errors->has('name') ? 'is-invalid' : ''}}" placeholder="أدخل الاسم بالكامل" required>
                                            @error('name')
                                                <div class="alert-danger">{{$errors->first('name') }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">البريد الإلكتروني</label>
                                            <input type="email" name="email[]" value="{{old('email.'.$x)}}" class="form-control input-focus {{$errors->has('email') ? 'is-invalid' : ''}}" placeholder="أدخل البريد الإلكتروني" required>
                                            @error('email')
                                                <div class="alert-danger">{{$errors->first('email') }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">رقم الهاتف</label>
                                            <input type="tel" name="mobile[]" value="{{old('mobile.'.$x)}}" class="form-control input-focus {{$errors->has('mobile') ? 'is-invalid' : ''}}" placeholder=" أدخل رقم الهاتف" required>
                                            @error('mobile')
                                                <div class="alert-danger">{{$errors->first('mobile') }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label class="form-label">رقم الهوية \ رقم الاقامة \ رقم الجواز</label>
                                            <input type="tel" name="passport[]" value="{{old('passport.'.$x)}}" class="form-control input-focus {{$errors->has('passport') ? 'is-invalid' : ''}}" placeholder="رقم الهوية \ رقم الاقامة \ رقم الجواز" required>
                                            @error('passport')
                                                <div class="alert-danger">{{$errors->first('passport') }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">هل تعاني من اي امراض مزمنة</label>

                                            <div class="check-diseases-wrap">

                                                <div class="form-check" onclick="$('#notes_div{{$i}}').show();">
                                                    <input class="form-check-input" type="radio" name="Radio1{{$i}}" id="Radio1{{$i}}">
                                                    <label class="form-check-label" for="Radio1{{$i}}">
                                                    نعم
                                                    </label>
                                                </div>
                                                <div class="form-check" onclick="$('#notes_div{{$i}}').hide();">
                                                    <input class="form-check-input" type="radio" name="Radio1{{$i}}" id="Radio2{{$i}}">
                                                    <label class="form-check-label" for="Radio2{{$i}}">
                                                    لا
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12" id="notes_div{{$i}}" style="display: none">
                                        <div class="form-group">
                                            <textarea name="notes[]" class="form-control input-focus" placeholder="اكتب ملاحظاتك"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="packages-info-wrap">
                            <h3 class="packages-info-title title-2">معلومات الباقات</h3>
                            <div class="package-item">
                                <div class="packages-img">
                                    <img class="img-fluid" src="{{url('uploads/trips/'.$trip->image)}}">
                                </div>
                                <div class="packages-details">
                                    <div class="details-row">
                                        <a href="{{route('frontend.trips.show', ['id' => $trip->id])}}" class="details-item package-title">{{$trip->title}}</a>
                                        <p class="details-item package-date">{{$trip->trip_date}}</p>
                                    </div>
                                    <p class="details-item package-price">{{$trip->price}} ر.س</p>
                                </div>
                            </div>
				            <div class="package-total">
                                <div class="total-items">
                                    <p class="total-item total-text">قيمة الخصم:</p>
                                    <p class="total-item total-value"><span class="discount_value">{{request()->session()->has('discount') ? request()->session()->get('discount') : ''}}</span> %</p>
                                </div>
                                <div class="total-items">
                                    <p class="total-item total-text">عدد الأشخاص:</p>
                                    <p class="total-item total-value"><span>{{request()->get('members')}}</span></p>
                                </div>
                                <div class="total-items">
                                    <p class="total-item total-text">الاجمالي:</p>
                                    <p class="total-item total-value">
                                    <span class="hole_paid">
                                        <?php
                                        $tot = $members*$trip->price;
                                        if(request()->session()->has('discount')) {
                                            $tot = $members*($trip->price-((request()->session()->get('discount')*$trip->price)/100));
                                        }
                                            echo $tot;
                                        ?>
                                    </span>
                                    ر.س</p>
                                    <input type="hidden" name="hole_paid" id="hole_paid" value="{{$tot}}">
                                </div>
                            </div>
                        </div>
                        @if(!request()->session()->has('discount'))
                        <div class="discount-code-wrap" id="discount-code-wrap">
                            <h2 class="discount-code-title">كود الخصم</h2>
                            <div class="coupon-input input-group">
                                <input type="hidden" id="coupon_trip_id" class="form-control input-focus" value="{{$trip->id}}">
                                <input type="text" id="coupon_code" class="form-control input-focus" placeholder="أدخل كود الخصم">
                                <button class="btn" id="coupon_apply_button" type="button">تطبيق</button>
                            </div>
                        </div>
                        @endif
                     <div class="form-group" style="display: none">

                         <label class="form-label title-3">تاريخ الحجز</label>
                         <input type="text" autocomplete="off" class="form-control input-focus datepicker " id="date-range">

                     </div>
                        <div class="terms-wrap">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="terms" value="1" id="termsCheckDefault">
                                <label class="form-check-label" for="termsCheckDefault">
                                    أوافق على
                                    <a class="d-none" href="{{route('frontend.terms', $trip->id)}}"> الشروط والأحكام</a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal"> الشروط والأحكام</a>
                                </label>
                                @error('terms')
                                    <div class="alert-danger">{{$errors->first('terms') }} </div>
                                @enderror
                            </div>
                        </div>
                        <div class="submit-btn-wrap">
                            <button class="submit-btn compelate-reservation-btn" type="submit">إتمام الدفع</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


            <!-- ***** terms-modal ***** -->
    <div class="bootstrap-modal terms-modal modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title title-2" id="exampleModalLabel">الشروط والاحكام</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

              <div class="terms-wrap terms-wrap-modal">

                    {!!$settings->terms!!}

              </div>


          </div>
          <div class="modal-footer">

            <button type="button" class="btn btn-success close-btn" data-bs-dismiss="modal">إغلاق</button>

          </div>
        </div>
      </div>
    </div>
    <!-- ***** terms-modal End ***** -->



    </section>

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

</script>
<script>
    $(document).ready(function() {
        $('#termsCheckDefault').attr('checked', true);
        $('#termsCheckDefault').attr('checked', false);
        $('#coupon_apply_button').click(function() {
            $.ajax({
                method: "GET",
                url: "{{route('frontend.bookings.apply-coupon')}}",
                data: 'coupon_code='+$('#coupon_code').val()+'&trip_type=1&coupon_trip_id='+$('#coupon_trip_id').val(),
                beforeSend: function() {
                    $('#coupon_apply_button').html('انتظر...');
                },
                success: function(data) {
                    if(data>0) {
                        var total = ($('#hole_paid').val()-(($('#hole_paid').val()*data)/100));
                        $('.hole_paid').html(total);
                        $('.discount_value').html(data);
                        $('#hole_paid').val(total);
                        $('#discount-code-wrap').hide();
                    } else if(data==0) {
                        alert('كود خصم غير صحيح');
                    } else if(data==-1) {
                        alert('غير مسموح');
                    }
                    $('#coupon_apply_button').html('تطبيق');
                },
            });
        });
    });
</script>
@endpush
