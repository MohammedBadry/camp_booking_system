<!DOCTYPE html>
<html dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>الحجوزات</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
    <table class="table table-bordered">
    <thead>
      <tr class="table-danger">
        <td>رقم الحجز</td>
        <td>اسم المستخدم</td>
        <td>رقم الجوال</td>
        <td>البريد الإلكتروني</td>
        <td>رقم الجواز</td>
        <td>نوع الحجز</td>
        <td>نوع الرحلة</td>
        <td>كود الرحلة / المخيم</td>
        <td>تاريخ الرحلة</td>
        <td>السعر</td>
        <td>كود الخصم</td>
        <td>قمية الخصم</td>
        <td>المبلغ المدفوع</td>
        <td>الحالة</td>
        <td>ملاحظات</td>
        <td>المشغل</td>
        <td>مسؤول الدخول</td>
        <td>أضيفت بواسطة</td>
        <td>تاريخ الحجز</td>
      </tr>
      </thead>
      <tbody>
        @foreach ($bookings as $booking)
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
                <p class="td-text">
                    @if($booking->trip->type_id==1)
                        @if($booking->trip->status==1)
                            عامة
                        @else
                            خاصة
                        @endif
                    @else 
                    -
                    @endif
                </p>                                                
            </td>
            <td>                                                
                <p class="td-text">{{$booking->trip->code}}</p>                                                
            </td>
            <td>                                                
                <p class="td-text">{{$booking->trip->type_id==1 ? $booking->trip->trip_date : '-'}}</p>
            </td>
            <td>                                                
                <p class="td-text">{{$booking->trip->price}} ريال</p>                                                
            </td>
            <td>                                                
                <p class="td-text">{{$booking->coupon ? $booking->coupon->code : '-'}}</p>                                                
            </td>
            <td>                                                
                <p class="td-text">{{$booking->coupon ? $booking->coupon->discount.'%' : '-'}}</p>                                                
            </td>
            <td>                                                
                <p class="td-text">{{$booking->total_paid}} ريال</p>                                                
            </td>
            <td>
                @if($booking->trip->type_id==1)
                    @if($booking->status==1)
                    <p class="td-text done">تم الدخول</p>
                    @else
                        <p class="td-text processing">لم يتم الدخول</p>
                    @endif
                @else 
                -
                @endif
            </td>
            <td>                                                
                <p class="td-text">{{$booking->notes}}</p>                                                
            </td>
            <td>                                            
                <p class="td-text">{{$booking->trip->operator ? $booking->trip->operator->name.' - #'.$booking->trip->operator->id : '-' }}</p>
                
            </td>
            <td>                                            
                <p class="td-text">{{$booking->entry ? $booking->entry->name.' - #'.$booking->entry->id : '-'}}</p>
                
            </td>
            <td>                                            
                <p class="td-text">
                    <?php
                    if($booking->adder) {
                        if($booking->adder->role=="operator") {
                            echo "مشغل: ";
                        }
                        echo $booking->adder->name.' - #'.$booking->adder->id;
                    } else {
                        echo "-";
                    }
                    ?>
                </p>                                                    
            </td>
            <td>                                            
                <p class="td-text">{{$booking->trip->type_id==1 ? $booking->created_at : $booking->period}}</p>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </body>
</html>