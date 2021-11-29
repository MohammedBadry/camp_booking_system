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


                max-width: 380px;


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
                text-align: justify;
                margin-top: 0;
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


            @media(max-width:767.98px){



                .invoice-box .box-head .head-details{

                    flex-direction: column;
                    align-items: flex-start;
                    justify-content: flex-start;
                }

                .invoice-box .box-head .head-details >*:first-child{

                    padding-left: 0;
                }
                .invoice-box .box-head .head-details >*{

                    width: 100%;
                    max-width: none;
                }
                .invoice-box .box-head .head-details .details-items-wrap .table tbody tr td:last-child{

                    text-align: left;
                }


            }
            @media(max-width:575.98px){
                .invoice-box{

                    padding: 30px 15px;
                }
                .invoice-box .box-head .head-info{

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


                          <div class="head-banner">

                            <img class="img-fluid" src="{{url('uploads/trips/'.$booking->trip->image)}}">

                        </div>

                    </div>

                </div>
                <div class="box-body">

                    <div class="body-title">بيانات المخيم</div>
                    <div class="body-deatlis-items">

                        <div class="deatlis-item">

                            <span class="deatlis-title">نوع المخيم</span>
                            <span class="deatlis-val">{{$booking->trip->category->name}}</span>

                        </div>
                        <div class="deatlis-item">

                            <span class="deatlis-title">حجم المخيم	</span>
                            <span class="deatlis-val">{{$booking->trip->size}}</span>

                        </div>

                        <div class="deatlis-item">

                            <span class="deatlis-title">كود المخيم</span>
                            <span class="deatlis-val">{{$booking->trip->code}}</span>

                        </div>
                        <div class="deatlis-item">

                            <span class="deatlis-title">تاريخ الحجز	</span>
                            <span class="deatlis-val">{{$booking->period}}</span>

                        </div>

                        @if($booking->extras != '[]')
                            <div class="deatlis-item">
                                <span class="deatlis-title">الإضافات	</span>
                                <span class="deatlis-title">&nbsp;	</span>
                            </div>
                            @foreach($booking->extras as $extra)
                            <div class="deatlis-item">
                                <span class="deatlis-title">&nbsp;</span>
                                <span class="deatlis-val">{{$extra->extra->name}}</span>
                                <span class="deatlis-val d-none">{{$extra->extra->price}}  ريال لليوم الواحد</span>
                            </div>
                            @endforeach
                        @endif

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

                            1- المخيمات للتأجير ( شباب / عوائل).
                            <br>
                            2- يتوجب ابراز الهوية الوطنية لمستأجري مخيمات الشباب وبطاقة العائلة لمخيمات العوائل.
                            <br>
                            3- يشترط ان تكون الحالة الصحية في تطبيق توكلنا محصن بجرعتين لجميع الزوار.
                            <br>
                            4- يتم تشغل مولد الكهرباء من غروب الشمس إلى فجر اليوم التالي خلال فترة الإقامة.
                            <br>
                            5- يصرح بالدخول لسبع سيارات لكل خيمة بموجب بطاقة تصريح رسمية ومازاد عن ذلك يتم احتساب رسم إضافي مقداره عشرون ريال لكل سيارة.
                            <br>
                            6- يقتصر إشعال النار على الموقع المخصص لذلك وإبعادها عما قد يسبب حريق لا قدر الله.
                            <br>
                            7- يلتزم الطرف الثاني بالمحافظة على العين المؤجرة وتجهيزات الشوي وإبقائها في الأماكن المخصصة لها والمحافظة التامة وأن لا يتنازل كلياً أو جزئياً للغير بعوض أو بغير عوض.
                            <br>
                            8- يلتزم الطرف الثاني ومرافقيه بالتقيد بكافة الأنظمة والعادات والتقاليد في المظهر والسلوك داخل المنتره, ويكون الطرف الثاني مسؤول عن تصرفات مرافقيه.
                            <br>
                            9- يلتزم الطرف الثاني بالتقيد بالحد الأقصى للسرعة داخل المنتزه 40كم/ساعة من أجل سلامة الجميع.
                            <br>
                            10- في حال رغبة الطرف الثاني بإقامة فعاليات أو أنشطة عامة في الموقع المؤجر يتوجب الحصول على موافقة خطية من قبل الطرف الأول وفي حال مخالفة ذلك يتم إلغاء الفعالية وإنهاء العقد دون حق استرجاع مبلغ التأجير المدفوع .
                            <br>
                            11- يمنع منعاً باتاً دخول الأسلحة وممارسة الصيد بأي وسيلة ولا يسمح بإدخال أو نصب خيام بالموقع ويحظر استعمال العربات والدراجات النارية في الموقع بتاتا.
                            <br>
                            12- المحافظة على الأشجار وعلى تمديدات الري التي حولها.
                            <br>
                            13- إيقاف السيارات في الأماكن المخصصة لها عند المخيم وعدم التعدي على المحمية وعلى حدود المخيم .
                            <br>
                            14- إبقاء أبواب دورات المياه مغلقة لكي لا تتعرض للغبار والأتربة والتأكد من عدم وجود حشرات أو قوارض في دورات المياه عند الدخول بها, والتأكد من إغلاق صنابير المياه بعد الاستعمال.
                            <br>
                            15- يحق للعميل التأجيل قبل موعد الحجز ب 48 ساعة من تاريخ الحجز وساعة الدخول لفترة اقصاها شهر من تاريخ الحجز ولايحق له إلغاء الحجز واسترداد المبلغ المدفوع.
                            <br>
                            16- الالتزام بمواعيد التأجير من الساعة 1 ظهرا وحتى الساعة 9 صباحا من المستأجر ومرافقيه ويتجدد العقد تلقائيا في حال التأخير .
                            <br>
                            17- يحق للإدارة إلغاء الإيجار متى صدر من الطرف الثاني أو أي من مرافقيه ما يعتبره الطرف الأول إخلالاً بأي من الالتزامات المحددة , ولا يحق للطرف الثاني في هذه الحالة استعادة ما دفع من مبالغ لقاء استئجاره المخيم المذكور في هذا العقد.
                            <br>
                            18- يخضع هذا العقد لجميع قوانين وأنظمة المملكة العربية السعودية.
                            <br>
                            19- حرر هذا العقد من أصل ونسختين.

                        </p>
                    </div>
                    <div class="about-us-info">

                        <span class="info-item">+966 53 500 0093</span>
                        <span class="info-item">+966 53 500 0096</span>
                        <a class="info-item" href="mailto:info@thumamahvillage.com" target="_blank">info@thumamahvillage.com</a>
                        <a class="info-item" href="https://thumamahvillage.com/" target="_blank">www.thumamahvillage.com</a>

                    </div>
                </div>

            </div>

        </div>

        <!-- ***** invoice-section End ***** -->









</body>

</html>
