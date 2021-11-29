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
                            for($i=1; $i<=$members; $i++) {
                                $x = $i-1;
                            ?>
                            <input type="hidden" id="members" name="members" value="{{$members}}">
                            <input type="hidden" name="category_id" value="2">
                            <div class="reservation-wrap">
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

                                                 <label class="form-label">تاريخ الحجز</label>
                                                 <input type="text" name="trip_date" autocomplete="off" class="form-control input-focus datepicker_input " id="date-range" required>

                                       </div>


                                    </div>

                                    <div class="col-12">
                                        
                                         
                                         <div class="form-group">
                                                <label class="form-label">الإضافات </label>
                                                
                                                 <div class="camp-additions-items-wrap">
                                                     <div class="camp-additions-note">
                                                     
                                                         قم باختيار الإضافات التي تردي توافرها في المخيم (سعر الاضافة باليلية الواحده)
                                                     
                                                     </div>
                                                     <table class="table table-borderless" id="additionsSelect" >                                                                                                                     
                                                     </table>
                                                 </div>
                                            
                                            
                                                    
                                                </div>
                                                
                                         <div class="form-group d-none">

                                             <table class="camp-additions-area d-none">
                                                 <tbody id="additionsSelect">

                                                 </tbody>
                                             </table>

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
                                        <a href="{{route('frontend.camps.show', ['id' => $trip->id])}}" class="details-item package-title">{{$trip->title}}</a>
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
                                    <p class="total-item total-text">عدد الأيام:</p>
                                    <p class="total-item total-value"><span class="days"></span>يوم</p>
                                </div>
                                
                                 <div class="total-items camp-additions-total">
                                        
                                            <p class="total-item total-text">الإضافات</p>
                                            <p class="total-item total-value" id="additionsRemove">
                                                                                         
                                            </p>

                                        
                                        </div>
                                                               
        
                                <div class="total-items camp-additions-total d-none">
                                    <p class="total-item total-text">الإضافات</p>
                                </div>


                                <div class="total-items">
                                    <p class="total-item total-text">الاجمالي:</p>
                                    <p class="total-item total-value">
                                    <span class="hole_paid">
                                        <?php
                                            $tot = $trip->price;
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

<!-- slimselect js 
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>
-->
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
        $('.days').html(datepicker.getNights());
        //alert();

        var package_price = parseInt(parseInt($('.package-price').html()));
        $('.hole_paid').html(package_price*datepicker.getNights());
        $('#hole_paid').val(package_price*datepicker.getNights());

        /*
        $('.hole_paid').html($('#hole_paid').val()*datepicker.getNights());
        $('#hole_paid').val($('#hole_paid').val()*datepicker.getNights());
        */
        $.ajax({
            method: 'GET',
            url: "{{route('frontend.camp.extras')}}",
            data: 'camp_id={{$trip->id}}&trip_date='+$('#date-range').val(),
            success: function(data) {
                $('#additionsSelect').html(data);
                $('#additionsRemove').html("");
            }
        });
    }, false);

</script>

<script>

        function add(id) {
            $.ajax({
                method: 'GET',
                url: "{{route('frontend.extra.add')}}",
                data: 'id='+id,
                dataType: "JSON",
                success: function(data) {
                    var total = parseInt($('#hole_paid').val());
                    var days = parseInt($('.days').html());
                    var price = parseInt(data.price);
                    $('.hole_paid').html(total+(price*days));
                    $('#hole_paid').val(total+(price*days));
                    $('#additionsSelect #extra-'+id).hide();
                    $('#additionsRemove').append(data.text);
                }
            });
        }

        function remove(id) {
            $.ajax({
                method: 'GET',
                url: "{{route('frontend.extra.remove')}}",
                data: 'id='+id,
                success: function(data) {
                    var total = parseInt($('#hole_paid').val());
                    var days = parseInt($('.days').html());
                    var price = parseInt(data.price);
                    $('.hole_paid').html(total-(price*days));
                    $('#hole_paid').val(total-(price*days));
                    $('#additionsRemove #extra-'+id).html("");
                    $('#additionsSelect').append(data.text);
                }
            });
        }

</script>

<script>
    $(document).ready(function() {
        $('#termsCheckDefault').attr('checked', true);
        $('#termsCheckDefault').attr('checked', false);
        $('#coupon_apply_button').click(function() {
            $.ajax({
                method: "GET",
                url: "{{route('frontend.bookings.apply-coupon')}}",
                data: 'coupon_code='+$('#coupon_code').val()+'&trip_type=2&coupon_trip_id='+$('#coupon_trip_id').val(),
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

        function updatePrice(id) {
            $.ajax({
                method: 'GET',
                url: "{{route('admin.extras.view')}}",
                data: 'id='+id,
                success: function(data) {
                    var total = parseInt($('#hole_paid').val());
                    var price = parseInt(data);
                    $('.hole_paid').html(total+price);
                    $('#hole_paid').val(total+price);
                }
            });
        }
</script>
@endpush
