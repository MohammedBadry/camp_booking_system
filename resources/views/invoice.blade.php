<!DOCTYPE html>
<html lang="ar">

<head>

    
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cairo">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tajawal">
    
    <style>
    
            /*------------- #invoice template  --------------*/
             
            a , a:hover{

                text-decoration: none;
                color: inherit;
            }

            .invoice-section{

                padding: 3rem 0rem;
                position: relative;
                direction: rtl;
                /*font-family: "Cairo";*/
                font-family:"Tajawal" ;
            }
            .invoice-box{

                max-width: 800px;
                background-color: #fff;
                border: 1px solid #eee;
                box-shadow: 0 0 10px rgba(0, 0, 0, .15);
                margin: auto;
                padding: 30px;

            }

            .invoice-box .box-head .head-info{

                display: flex;
                align-items: center;
                justify-content: space-between;
                padding-bottom: 1rem;

            }
            .invoice-box .box-head .head-info > *{

                margin-bottom: 2rem;

            }
            .invoice-box .box-head .head-info .info-items-wrap .info-item{

                display: flex;
                margin-bottom: 10px;

            }
            .invoice-box .box-head .head-info .info-items-wrap .info-item:last-child{

                margin-bottom: 0;
            }
            .invoice-box .box-head .head-info .info-items-wrap .info-item span{

                font-size: 16px;
                font-weight: bold;
                color: #696969;
                display: inline-block;
            }
            .invoice-box .box-head .head-info .info-items-wrap .info-item span:first-child{

                margin-left: 5px;
            }
            .invoice-box .box-head .head-info .info-logo img{

                display: block;
                height: 100px;
            }


            .invoice-box .box-head .head-details{

                display: flex;
                align-items: center;
                justify-content: space-between;
                
            }
            .invoice-box .box-head .head-details >*{


                margin-bottom: 3rem;
            }
            .invoice-box .box-head .head-details >*:first-child{

                padding-left: 30px;
            }

            .invoice-box .box-head .head-details .details-items-wrap .table{

                margin-bottom: 0;
            }
            .invoice-box .box-head .head-details .details-items-wrap .table tbody tr td{

                 font-size: 16px;
                 font-weight: bold;
                 color: #696969;
                 padding: 0 0 1rem 0;

            }
            .invoice-box .box-head .head-details .details-items-wrap .table tbody tr td:first-of-type{

                padding-left: 2rem;
            }
            .invoice-box .box-head .head-details .details-items-wrap .table tbody tr:last-of-type td{

                padding-bottom: 0;
            }
            .invoice-box .box-head .head-details .item-qr-code{

                flex-shrink: 0;
            }
            .invoice-box .box-head .head-details .item-qr-code svg{

                width: 180px;
                height: 180px;

            }

            /*
            .invoice-box .box-head .head-banner-area{

                display: flex;
                align-items: flex-start;
                justify-content: flex-start;
                padding: 1rem;
            }
            .invoice-box .box-head .head-banner-area>*{
                margin-bottom: 2rem;
            }
            .invoice-box .box-head .head-banner-area>*:first-child{
                padding-left: 30px;
            }
            */

            .invoice-box .box-head .head-banner-area .banner-details{

                        display: none;
            }
            .invoice-box .box-head .head-banner-area .banner-details .banner-title{

                font-size: 18px;
                font-weight: bold;
                margin-bottom: 10px;
                color: #696969;
            }
            .invoice-box .box-head .head-banner-area .banner-details .banner-text{

                font-size: 14px;
                color: #696969;
                font-weight: bold;
                text-overflow: ellipsis;
                overflow: hidden;
                display: -webkit-box;
                -webkit-line-clamp: 4;
                -webkit-box-orient: vertical;
            }

            .invoice-box .box-head  .head-banner{


                flex-shrink: 0;
                margin-bottom: 3rem;

            }
            .invoice-box .box-head  .head-banner img{

                display: block;
                text-align: center;
                max-height: 300px;
                object-fit: cover;
                border-radius: 10px;
                width: 100%;
            }



            .invoice-box  .box-body .body-title{

                padding: 10px;
                background-color: #5E8C70;
                color: #fff;
                font-size: 16px;
                font-weight: bold;
            }

            .invoice-box  .box-body .body-deatlis-items .deatlis-item{

                display: flex;
                justify-content: space-between;
                flex-wrap: wrap;
                border-bottom: 1px solid #5E8C70;
                padding: 10px;
                padding-bottom: 0;
            }
            .invoice-box  .box-body .body-deatlis-items .deatlis-item > span{

                font-size: 16px;
                color: #696969;
                font-weight: bold;
                display: inline-block;
                padding-bottom: 10px;
            }
            .invoice-box  .box-body .body-deatlis-items .deatlis-item > span:last-child{

                font-weight: 100;
            }
            .invoice-box  .box-body .body-deatlis-items .deatlis-item:last-child{

                border-bottom: none;
            }

            .invoice-box  .box-body .body-deatlis-items  .deatlis-item.total{

                justify-content: flex-end;

            }

            .invoice-box  .box-body .body-deatlis-items  .deatlis-item.total .total-val{

                font-size: 18px;
                font-weight: bold;
                 color: #5E8C70;
            }

            .invoice-box  .box-body{

                padding-bottom: 3rem;
                margin-bottom: 1.5rem;
                border-bottom: 1px solid #696A69
            }


            .invoice-box .box-footer .terms-area .terms-title{

                font-size: 22px;
                color:#696969 ;
                font-weight: bold;
                margin-bottom: 0.5rem;
                margin-top: 0;
            }

            .invoice-box .box-footer .terms-area  .terms-text{

                font-size: 14px;
                color: #696969;
                line-height: 2;
                margin-bottom: 0;
                margin-top: 0;
                text-align: justify;
            }
            .invoice-box .box-footer .terms-area  .terms-text .bold-text{

                display: block;
                font-size:16px;
                font-weight: bold;
            }

            .invoice-box .box-footer .about-us-info{

                display: flex;
                flex-direction: column;
                align-items: flex-end;
                margin-top: 1.5rem;

            }
            .invoice-box .box-footer .about-us-info .info-item{

                display: block;
                margin-bottom: 5px;
                font-size: 14px;
                font-weight: bold;
                color: #696969;
                direction: ltr;
            }


            @media(max-width:575.98px){

                .invoice-box .box-head .head-details .item-qr-code{

                    flex-shrink: inherit;
                }

                .invoice-box .box-head .head-info,
                .invoice-box .box-head .head-details{

                    flex-direction: column;
                    align-items: flex-start;
                    justify-content: flex-start;
                }
                .invoice-box .box-head .head-info .info-logo{

                    width: 100%;
                }
                .invoice-box .box-head .head-info .info-logo img{

                   margin: auto;

                }

                .invoice-box .box-head .head-details >*:first-child{

                    padding-left: 0;
                }
                .invoice-box .box-head .head-details >*{

                    width: 100%;
                }
                .invoice-box .box-head .head-details .details-items-wrap .table tbody tr td:last-child{

                    text-align: left;
                }
                .invoice-box .box-head .head-details .item-qr-code {

                 text-align: center
                }
                .invoice-box .box-head .head-details .item-qr-code svg{

                    text-align: center;
                    margin: auto;
                }
                
                .invoice-box{
                    
                    padding:30px 15px;
                    
                }
            }


    </style>

</head>

<body>
    
    
    

    
     
        <!-- ***** invoice-section Start ***** -->
        
        <div class="invoice-section">
        
        
            <div class="invoice-box">
            
                <div class="box-head">
                
                    <div class="head-info">
                        
                        <div class="info-logo">
                        
                            <a href="https://thumamahvillage.com/" class="d-block" target="_blank">
                                <img class="img-fluid" src="{{asset('backend')}}/img/ivv-logo.svg">
                            </a>
                        
                        </div>
                        
                        <div class="info-items-wrap">
                        
                            <div class="info-item">
                            
                                <span class="info-title">رقم الحجز : </span>
                                <span class="info-val">{{$booking->id}}#</span>
                            
                            </div>
                            <div class="info-item">
                            
                                <span class="info-title">تاريخ الحجز :  </span>
                                <span class="info-val">{{$booking->created_at}}</span>
                            
                            </div>
                            <div class="info-item">
                            
                                <span class="info-title">الرقم الضريبي : </span>
                                <span class="info-val"> 30004887970000 </span>
                            
                            </div>
                            
                        </div>
                        
                    </div>
                    
                    <div class="head-banner-area">
                        
                        <div class="head-banner">
                    
                            <img class="img-fluid" src="{{url('uploads/trips/'.$booking->trip->image)}}">
                    
                        </div>
                    
                        <div class="banner-details d-none">
                        
                            <h1 class="banner-title">{{$booking->trip->title}} </h1>
                            <p class="banner-text">{{$booking->trip->description}} </p>
                            
                        </div>
                        
                    
                    </div>
                    
                    <div class="head-details">
                    
                        <div class="details-items-wrap">
                        
                            <div class="table-responsive-wrap">
                            
                                <table class="table table-borderless">
                                    
                                  <tbody>
                                      
                                    <tr>
                                      <td>الاسم</td>
                                      <td>{{$booking->name}}</td>
                                    </tr>
                                    <tr>
                                      <td>البريد الإلكتروني</td>
                                      <td>{{$booking->email}}</td>
                                    </tr>
                                    <tr>
                                      <td>رقم الجوال</td>
                                      <td>{{$booking->mobile}}</td>
                                    </tr>
                                    <tr>
                                      <td>رقم الهوية</td>
                                      <td>{{$booking->passport}}</td>
                                    </tr>
                                      
                                  </tbody>
                                </table>
                            
                            </div>
                        
                        </div>
                        
                        
                        <div class="item-qr-code">
                        
                            {!! QrCode::size(250)->generate(url('/entry/bookings/'.$booking->id)); !!}
                        
                        </div>
                        
                    </div>
                    
                </div>
                <div class="box-body">
                
                    <div class="body-title">بيانات الرحلة</div>
                    <div class="body-deatlis-items">
                    
                        <div class="deatlis-item">
                        
                            <span class="deatlis-title">نوع الحجز</span>
                            <span class="deatlis-val">{{$booking->category->name}}</span>
                        
                        </div>
                        <div class="deatlis-item">
                        
                            <span class="deatlis-title">فئة الرحلة	</span>
                            <span class="deatlis-val">{{$booking->trip->category->name}}</span>
                        
                        </div>
                        
                        <div class="deatlis-item">
                        
                            <span class="deatlis-title">كود الرحلة</span>
                            <span class="deatlis-val">{{$booking->trip->code}}</span>
                        
                        </div>
                        <div class="deatlis-item">
                        
                            <span class="deatlis-title">المشغل	</span>
                            <span class="deatlis-val">{{$booking->trip->operator->name}}</span>
                        
                        </div>
                        <div class="deatlis-item">
                        
                            <span class="deatlis-title">تاريخ الرحلة	</span>
                            <span class="deatlis-val">{{$booking->trip->trip_date}}</span>
                        
                        </div>
                        
                        <div class="deatlis-item total">
                        
                            <div class="total-val">
                            
                                
                                        المبلغ المدفوع: 
                                        <span>{{$booking->total_paid}}</span>
                            </div>
                        
                        </div>
                        
                        
                    </div>
                </div>
                <div class="box-footer">
                
                    <div class="terms-area">
                    
                        <h1 class="terms-title">الشروط والأحكام</h1>
                        
                        <p class="terms-text">
                        
                            <span class="bold-text">نصائح وارشادات</span>
                            الاحتياجات التي يوفرها كل مشارك:
                            <br>
                            - الحضور بزي رياضي كامل .
                            <br>
                            - يمنع ارتداء الجينز والثوب.
                            <br>
                            - نظارة شمسية .
                            <br>
                            - قبعة للرأس للحماية من الشمس.
                            <br>
                            - حقيبة ظهر فارغة لحمل الأغراض والمياه وغيرها.
                            <br>
                            - إحضار ملابس خفيفة .
                            <br>
                            - خالف الطبيعة في ألوان الملابس.
                            <br>
                            - إحضار واقي الشمس لأصحاب البشرة الحساسة.
                            <br>
                            - إحضار جاكيت للمطر.
                           
                            <br>
                            <br>
                            
                            
                            <span class="bold-text">تعليمات الرحلة</span>
                            - شرب المياه بكميات كافية للحماية من الجفاف والشد العضلي ويفضل الاستعداد قبل الرحلة بيوم بشرب كميات كبيرة حتى يتشبع الجسم من الماء.
                            <br>
                            - جميع الادوات المطلوبة سابقا هي لسلامتك ولذلك يمنع الحضور بدونها.
                            <br>
                            - الاستعداد للرحلة بالنوم المبكر.
                            <br>
                            - المشي على المسارات التي طرقت سابقا من الدواب أو غيرها ويمنع الخروج عن المسار (المشي بطريقة القافلة بحد أقصى شخصين بجانب بعضهم البعض).
                            <br>
                            - الالتزام بتعليمات قادة الرحلة.
                            <br>
                            - لا تأخذ إلا الصور ولاتترك إلا آثار اقدامك.
                            <br>
                            - النشاط مشاركة وليست منافسة، لذلك يمنع المشي السريع والتقدم على القائد (من يصل سالما وليس من يصل أولاً)
                            <br>
                            - احضار إثبات الشخصية (ابراز توكلنا يكفي).
                            <br>
                            - يمنع منعا باتا ً رمي المخلفات حفاظا على البيئة.
                            <br>
                            - شبكة الاتصال متقطعه.
                            <br>
                            - نود إعلامكم أن ّ نا سنعمل ما بوسعنا للت ٍ قيد بالبرنامج. ولكن قد يحدث هناك تغيير لأسباب خارجة عن إرادتنا.
                            <br>
                            - الالتزام و التقيد بكافة الأنظمة و العادات و التقاليد بالمظهر و السلوك داخل المنتزهالمسافة المقدرة للرحلة الاستكشافية حوالي ------------كم .
                            <br> 
                            - يمنع تصوير المشاركين بالرحلة
                            <br>
                            - الالتزام بعدم إدخال الأسلحة أو ممارسة الصيد بأي وسيلة
                            <br>
                            - المحافظة علي الأشجار و تمديدات الري التي حولها
                        
                        </p>
                    </div>
                    <div class="about-us-info">
                    
                        <span class="info-item">+966 55 814 9980</span>
                        <a class="info-item" href="mailto:Trips@thumamahvillage.com" target="_blank">Trips@thumamahvillage.com</a>
                        <a class="info-item" href="https://thumamahvillage.com/" target="_blank">www.thumamahvillage.com</a>
                        
                    </div>
                </div>
            
            </div>
            
        </div>
        
        <!-- ***** invoice-section End ***** -->
 
    
    
    
        
        

    
    
</body>

</html>