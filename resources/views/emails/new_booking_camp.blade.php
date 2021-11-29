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
            رقم الحجز :
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
         
         <span class="details-title" style="display: inline-block;padding-bottom: 12px; margin-left: 5px">
            تاريخ الحجز :
         </span>
         <span class="details-value" style="display: inline-block;padding-bottom: 12px;">
             
           2021/11/11 - 2021/12/07
             
         </span>
         
        
     </div>
        
        
        
    <a href="{{route('frontend.bookings.invoice', $booking->id)}}" target="_blank" class="downlaod-ticket" style="font-size: 16px;
                                               display: inline-block;
                                               color: #fff;
                                               text-transform: capitalize;">
    
        download  ticket
    
    </a>
    
    
    
        
    
    </div>
    
    
   
    
</body>

</html>