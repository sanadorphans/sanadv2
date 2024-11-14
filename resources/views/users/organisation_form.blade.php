@extends('users.layout.app')
    <!--nav-->

 <!--nav-->
 <!--start main section-->
 @section('css')
 <style>
input{
    font-family: 'dli' !important;

}
.avatar-upload {
    position: relative;
    max-width: 205px;
    margin: 10px auto;
   
   
}

.avatar-upload .avatar-edit {
    position: absolute;
    right: 12px;
    z-index: 1;
    top: 10px;
}
.avatar-upload .avatar-edit input {
    display: none;
}

.avatar-upload .avatar-edit input + label {
    display: inline-block;
    width: 34px;
    height: 34px;
    margin-bottom: 0;
    border-radius: 100%;
    background: #FFFFFF;
    border: 1px solid transparent;
    box-shadow: 0px 2px 4px 0px rgb(0 0 0 / 12%);
    cursor: pointer;
    font-weight: normal;
    transition: all 0.2s ease-in-out;
}

.avatar-upload .avatar-edit input + label:after {
    content: "\f040";
    font-family: 'FontAwesome';
    color: #757575;
    position: absolute;
    top: 6px;
    left: 0;
    right: 0;
    text-align: center;
    margin: auto;
}





        
        
        
       
.avatar-upload .avatar-preview {
  width: 192px;
  height: 192px;
  position: relative;
  border-radius: 100%;
  border: 6px solid #F8F8F8;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
  width: 100%;
  height: 100%;
  border-radius: 100%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}

.form-control.is-invalid, .was-validated .form-control:invalid {
    border: 0 !important;
    box-shadow: none;
}
.form-control:focus{
    border: 1px solid blue !important;
}
.form-control.is-valid, .was-validated .form-control:valid {
    border-color: blue;
    padding-right: calc(1.5em + 0.75rem);
    background-image: none !important;
    background-repeat: no-repeat;
    background-position: right calc(0.375em + 0.1875rem) center;
    background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}

element.style {
}
.form-control.is-invalid, .was-validated .form-control:invalid {
    border: 0 !important;
    box-shadow: none;
}
.main-form .org-data .form-control {
    background-color: #ECECEC;
    border: 1px solid #D1D1D1;
    box-sizing: border-box;
    border-radius: 5px;
}

.form-custom{
    padding: 8px;
    display: block;
    width: 100%;
    background: #ECECEC;
    border: 1px solid #D1D1D1;
    box-sizing: border-box;
    border-radius: 5px;
    cursor: pointer;
}
.form-custom:focus{
    /* border: 3px solid rgba(0, 128, 0, 0.479) !important; */
}
input:focus,textarea:focus{
 outline: 2px solid rgba(0, 128, 0, 0.24);
}
input.form-custom.error{
    outline: 2px solid rgba(211, 1, 1, 0.664);
}

 </style>
     
 @endsection
 @section('content')
 
     
 
 <main class="pt-5 pb-5">
    {{-- @if ($errors->any())
    <div  style="margin-top: 100px">
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger  mx-4 mb-2">
                
                   {{ $error }}
            
        </div>
        @endforeach
    </div>    
    @endif --}}
     <form method="post" action="{{route('users.organisation.store')}}" class="main-form was-validated px-5" enctype="multipart/form-data">
        @csrf
         <div class="form-container container bg-white p-3" style="border-radius:15px; ">
            <div class="avatar-upload">
                <div class="avatar-edit">
                    <input type='file' id="imageUpload" class="@error('image') error @enderror"  name="image" value="{{old('image')}}" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload"></label>
                </div>
                <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url({{asset('img/camera.jpg')}});">
                    </div>
                </div>
                <div class="text-center mt-2">
                    {{-- <label class="ml-3" for="">أﺿﻒ صورة</label> --}}
                    <small class="ml-3">
                        @error('image')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </small>
                </div>
                
            </div>

            
             <div class="row">
                 {{-- <div class="col-12 col-lg-4 pr-5 pt-5 ">
                     <div id="image_container" class="image-input position-relative">
                            <img id="trial" src="" class="img-fluid rounded-circle h-100">
                            <div class="svg-holder">
                                <svg  width="56" height="52" viewBox="0 0 56 52" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="56" height="52" fill="url(#pattern0)"/>
                                    <defs>
                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0" transform="translate(0 -0.039532) scale(0.00198807 0.002141)"/>
                                    </pattern>
                                    <image id="image0" width="503" height="504" xlink:href="data:image/png;base64,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"/>
                                    </defs>
                                </svg>   
                            </div> 
                            <input id="input-image" class="is-valid" name="image" type="file" accept="image/png, image/gif, image/jpeg" >
                            <div id="input-text" class="input-text ">أﺿﻒ ﺷﻌﺎر المنظمة </div>
                     </div>
                 </div> --}}

                 <div class="col-12 ">
                   <div class="org-data">
                        <div class="row">
                            <div class="mb-3 col-md-4">
                            
                                <label  class="org-name">اﺳﻢ الجهة<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('name') error @enderror"  name="name" value="{{old('name')}}" placeholder="ادخل اسم الجهة" >
                                <small>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="mb-3 col-md-4">
                            
                                <label  class="org-name">مجال العمل<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('field') error @enderror"  name="field" value="{{old('field')}}" placeholder="ادخل مجال العمل" >
                                <small>
                                    @error('field')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="mb-3 col-md-4">
                            
                                <label  class="org-name">نوع الجهة<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                {{-- <input type="text" class="form-custom @error('category') error @enderror"  name="category" value="{{old('category')}}"> --}}
                                <select class="form-custom @error('category') error @enderror" id="category" name="category" value="{{old('category')}}">
                                    <option>جمعية</option>
                                    <option>مؤسسة</option>
                                    <option>مبادرة</option>
                                    <option>شركة غير هادفة للربح</option>
                                    
                                </select>
                                <small>
                                    @error('category')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label  class="form-label">سنة الإشهار<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="year" class="form-custom @error('year') error @enderror" name="year" value="{{old('year')}}" >
                                <small>
                                    @error('year')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label  class="form-label">الموقع الإلكترونى<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('website') error @enderror" name="website" value="{{old('website')}}" >
                                <small>
                                    @error('website')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label  class="form-label">صفحة الفيس بوك<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('facebook') error @enderror" name="facebook" value="{{old('facebook')}}" >
                                <small>
                                    @error('facebook')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label  class="form-label">رقم التليفون<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('phone') error @enderror" name="phone" value="{{old('phone')}}" >
                                <small>
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label  class="form-label">البريد الإلكترونى<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="email" class="form-custom @error('email') error @enderror" name="email" value="{{old('email')}}" >
                                <small>
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                           
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label  class="form-label">الدولة<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('country') error @enderror" name="country" value="{{old('country')}}" >
                                <small>
                                    @error('country')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label  class="form-label">المحافظة<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('governorate') error @enderror" name="governorate" value="{{old('governorate')}}" >
                                <small>
                                    @error('governorate')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label  class="form-label">العنوان<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('address') error @enderror" name="address" value="{{old('address')}}" >
                                <small>
                                    @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            
                            
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label  class="form-label">عدد العاملين<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="number" class="form-custom @error('employees_no') error @enderror" name="employees_no" value="{{old('employees_no')}}" >
                                <small>
                                    @error('employees_no')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label  class="form-label">النطاق الجغرافى<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('geo') error @enderror" name="geo" value="{{old('geo')}}" >
                                <small>
                                    @error('geo')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label  class="form-label">أفضل طريقة للتواصل<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('communication_way') error @enderror" name="communication_way" value="{{old('communication_way')}}" >
                                <small>
                                    @error('communication_way')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label  class="form-label">اسم مسئول الاتصال<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('point_of_contact_name') error @enderror" name="point_of_contact_name" value="{{old('point_of_contact_name')}}" >
                                <small>
                                    @error('point_of_contact_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label  class="form-label">وظيفة مسئول الاتصال<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('point_of_contact_position') error @enderror" name="point_of_contact_position" value="{{old('point_of_contact_position')}}" >
                                <small>
                                    @error('point_of_contact_position')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label  class="form-label">البريد الإلكترونى لمسئول الاتصال<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="email" class="form-custom @error('point_of_contact_email') error @enderror" name="point_of_contact_email" value="{{old('point_of_contact_email')}}" >
                                <small>
                                    @error('point_of_contact_email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label  class="form-label">هاتف مسئول الاتصال<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('point_of_contact_phone') error @enderror" name="point_of_contact_phone" value="{{old('point_of_contact_phone')}}" >
                                <small>
                                    @error('point_of_contact_phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            
                        </div>

                        <div class="row">
                            
                            <div class="col-md-4 mb-3">
                                <label  class="form-label">كيف عرفت عن وطنية؟<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('about_wataneya') error @enderror" name="about_wataneya" value="{{old('about_wataneya')}}" >
                                <small>
                                    @error('about_wataneya')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            
                        </div>
                        
                        
                   </div>
                 </div>
             </div>
             
             
             <div class="button-holder mb-5 mt-4">
                <input type="submit" class="btn btn-primary btn-block" value="{{__('lang.save')}}">
             </div>
         </div>
     </form>
 </main>
 <!--end main section-->





    <!--start js files-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
   
@endsection
@section('js')
<script>
    // var x= $(".error:first");
    // console.log(x);
    // x.scrollIntoView({
    //     behavior: 'smooth'
    // });
    if($('.error').length > 0){
        $('html, body').animate({
            scrollTop: ($('.error').first().offset().top)
        },500);
        var img= $("#imageUpload").val();
    }
    console.log(img);
    
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
    });
</script>
@endsection