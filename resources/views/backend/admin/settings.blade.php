@extends('backend.admin.layouts.app')

@section('title', 'الإعدادات')
@section('mobile_breadcrumb', 'الإعدادات')

@section('content')

<div class="section-style duplicated-add-section ">
        
        <div class="container">
        
            <div class="row">
            
                <div class="col-12">
                
                    <div class="duplicated-add-area add-settings">
                    
                        <!--div class="add-area-title title-4">
                        
                            <p>الإعدادات</p>
                        
                        </div-->
                        <div class="add-box-wrap">
                        
                            <form class="add-form add-settings-form " method="POST" action="{{route('admin.settings.update', $settings->id)}}">
                                @csrf
                                <div class="row">
                                    
                                    <!--div class="col-12">                                                        
                                        <div class="form-group">                                                        
                                            <label class="form-label">من نحن</label>
                                            <textarea name="about" id="about" class="form-control input-focus {{$errors->has('description') ? 'is-invalid' : ''}}" placeholder="من نحن" required>{{$settings->about}}</textarea>
                                        </div>                                                       
                                    </div-->
                                    <div class="col-12">                                                        
                                        <div class="form-group">                                                        
                                            <label class="form-label">عن محمية المالك الخالد</label>
                                            <textarea name="king_reserve" id="king_reserve" class="form-control input-focus {{$errors->has('king_reserve') ? 'is-invalid' : ''}}" placeholder="عن محمية المالك الخالد" required>{{$settings->king_reserve}}</textarea>
                                        </div>                                                       
                                    </div>
                                    <div class="col-12">                                                        
                                        <div class="form-group">                                                        
                                            <label class="form-label">الشروط والأحكام</label>
                                            <textarea name="terms" id="terms" class="form-control input-focus {{$errors->has('description') ? 'is-invalid' : ''}}" placeholder="الشروط والأحكام" required>{{$settings->terms}}</textarea>
                                        </div>                                                       
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">رابط فيسبوك</label>
                                            <input type="text" name="facebook" value="{{$settings->facebook}}" class="form-control input-focus {{$errors->has('facebook') ? 'is-invalid' : ''}}" placeholder="رابط فيسبوك" required>
                                        </div>                                                   
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">رابط تويتر</label>
                                            <input type="text" name="twitter" value="{{$settings->twitter}}" class="form-control input-focus {{$errors->has('twitter') ? 'is-invalid' : ''}}" placeholder="رابط تويتر" required>
                                        </div>                                                   
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">رابط انستجرام</label>
                                            <input type="text" name="instagram" value="{{$settings->instagram}}" class="form-control input-focus {{$errors->has('instagram') ? 'is-invalid' : ''}}" placeholder="رابط انستجرام" required>
                                        </div>                                                   
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">رابط سناب شات</label>
                                            <input type="text" name="snapchat" value="{{$settings->snapchat}}" class="form-control input-focus {{$errors->has('snapchat') ? 'is-invalid' : ''}}" placeholder="رابط سناب شات" required>
                                        </div>                                                   
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">إيميل الدعم</label>
                                            <input type="text" name="support_email" value="{{$settings->support_email}}" class="form-control input-focus {{$errors->has('snapchat') ? 'is-invalid' : ''}}" placeholder="رابط سناب شات" required>
                                        </div>                                                   
                                    </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="col-12">
                                    
                                        <button type="submit" class="add-btn">تحديث</button>
                                    
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

<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
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
        CKEDITOR.replace('about', {
            contentsLangDirection : 'rtl',
        });
        CKEDITOR.replace('terms', {
            contentsLangDirection : 'rtl',
        });
        CKEDITOR.replace('king_reserve', {
            contentsLangDirection : 'rtl',
        });
    </script>
@endpush