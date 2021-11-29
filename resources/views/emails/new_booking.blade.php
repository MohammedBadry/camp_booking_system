<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
        



</head>

<body>
    
    
    <div class="email-content" style="background-color: #5E8C70;
                                      height: auto;
                                      max-width: 700px; 
                                      margin: auto;
                                      border-radius: 15px;
                                      padding: 40px 16px;
                                      direction: rtl;
                                      text-align: center;">
        
        
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tajawal">
   
    
    <div class="email-logo" style="margin:auto;
                                   margin-bottom: 40px;
                                   max-height: 120px;
                                   max-width: 120px;">
        
        
         <a href="https://thumamahvillage.com/" target="_blank">

              <img src="https://thumamahvillage.com/backend/img/logo-3.png" style="display: block;
                                 margin: auto;
                                 text-align: center;
                                 max-width: 100%;
                                 height: auto;">
        </a>   


    </div> 
                
        
        
    <h2 class="email-details-title" style="font-size: 32px;
                                           color: #fff;
                                           margin-bottom: 40px;
                                           margin-top: 0;">
        
        بيانات الحجز
        
        
        </h2>
        
      <style>
    
        .details-value a,
         a.details-value{
            
            color: #fff !important;
        }
          
          .email-details{
              
              
              justify-content: center;
          }
        
    </style>   
        
        
     <div class="email-details" style="display: block;
                                       margin-bottom: 12px;
                                       text-align: center;
                                       justify-content: center;
                                       flex-wrap: wrap;
                                       color: #fff;
                                       font-size: 16px">
         
     
         <span class="details-title" style="display: inline-block;padding-bottom: 12px; margin-left: 5px">
            رقم الحجز  :
         </span>
         <span class="details-value" style="display: inline-block;padding-bottom: 12px;">
             {{$booking->id}}
         </span>
         
        
     </div>
        
       <div class="email-details" style="display: block;
                                       margin-bottom: 12px;
                                       text-align: center;
                                       justify-content: center;
                                       flex-wrap: wrap;
                                       color: #fff;
                                       font-size: 16px">
         
     
         <span class="details-title" style="display: inline-block;padding-bottom: 12px; margin-left: 5px">
            الإسم :
         </span>
         <span class="details-value" style="display: inline-block;padding-bottom: 12px;">
             {{$booking->name}}
         </span>
         
        
     </div>
        
        
       <div class="email-details" style="display: block;
                                       margin-bottom: 12px;
                                       text-align: center;
                                       justify-content: center;
                                       flex-wrap: wrap;
                                       color: #fff;
                                       font-size: 16px">
         
     
         <span class="details-title" style="display: inline-block;padding-bottom: 12px; margin-left: 5px">
            رقم الجوال :
         </span>
         <span class="details-value" style="display: inline-block;padding-bottom: 12px;">
            {{$booking->mobile}}
         </span>
         
        
     </div>
        
   
        
     <div class="email-details" style="display: block;
                                       margin-bottom: 12px;
                                       text-align: center;
                                       justify-content: center;
                                       flex-wrap: wrap;
                                       color: #fff;
                                       font-size: 16px">
         
     
         <span class="details-title" style="display: inline-block;padding-bottom: 12px; margin-left: 5px">
            الإيميل :
         </span>
         <a class="details-value" style="display: inline-block;padding-bottom: 12px;direction: ltr;color: #fff;">
            {{$booking->email}}
         </a>
         
        
     </div>
        
        
       <div class="email-details" style="display: block;
                                       margin-bottom: 12px;
                                       text-align: center;
                                       justify-content: center;
                                       flex-wrap: wrap;
                                       color: #fff;
                                       font-size: 16px">
         
     
         <span class="details-title" style="display: inline-block;padding-bottom: 12px; margin-left: 5px">
            نوع الحجز :
         </span>
         <span class="details-value" style="display: inline-block;padding-bottom: 12px;">
            {{$booking->category->name}}
         </span>
         
        
     </div>
        
        
        
    <div class="email-details" style="display: block;
                                       margin-bottom: 12px;
                                       text-align: center;
                                       justify-content: center;
                                       flex-wrap: wrap;
                                       color: #fff;
                                       font-size: 16px">
         @if($booking->category_id==1)
         <span class="details-title" style="display: inline-block;padding-bottom: 12px; margin-left: 5px">
            تاريخ الرحلة :
         </span>
         <span class="details-value" style="display: inline-block;padding-bottom: 12px;">
            {{$booking->trip->trip_date}}
         </span>
        @else 
         <span class="details-title" style="display: inline-block;padding-bottom: 12px; margin-left: 5px">
            تاريخ الحجز :
         </span>
         <span class="details-value" style="display: inline-block;padding-bottom: 12px;">
            {{$booking->period}}
         </span>
        @endif
        
     </div>
        
     @if($booking->category_id==1)
       <div class="email-details" style="display: block;
                                       margin-bottom: 12px;
                                       text-align: center;
                                       justify-content: center;
                                       flex-wrap: wrap;
                                       color: #fff;
                                       font-size: 16px">
         
     
         <span class="details-title" style="display: inline-block;padding-bottom: 12px; margin-left: 5px">
            حالة الحجز :
         </span>
         <span class="details-value" style="display: inline-block;padding-bottom: 12px;">
            @if($booking->status==1)
            <span class="details-value" style="color: #1BC167">تم التأكيد</span>
            @else
            <span class="details-value" style="color: #ffc107">لم يتم التأكيد</span>
            @endif
         </span>
         
        
     </div>
        
     @endif 
        
        
    <a href="{{route('frontend.bookings.invoice', $booking->id)}}" target="_blank" class="downlaod-ticket" style="font-size: 16px;
                                               display: inline-block;
                                               color: #fff;
                                               text-transform: capitalize;">
    
        download  ticket
    
    </a>
    
    
    
        
    
    </div>
    
    
   
    
</body>

</html>