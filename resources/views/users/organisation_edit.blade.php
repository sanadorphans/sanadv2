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
     <form method="post" action="{{route('users.organisation.update')}}" class="main-form was-validated px-5" enctype="multipart/form-data">
        @method('put')
        @csrf
         <div class="form-container container bg-white p-3" style="border-radius:15px; ">
            <div class="avatar-upload">
                <div class="avatar-edit">
                    <input type='file' id="imageUpload" class="@error('image') error @enderror"  name="image"  accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload"></label>
                </div>
                <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url({{ filter_var(Auth::user()->avatar, FILTER_VALIDATE_URL) ? Auth::user()->avatar : Voyager::image( Auth::user()->avatar ) }});">
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
                 <div class="col-12 ">
                   <div class="org-data">
                        <div class="row">
                            <div class="mb-3 col-md-4">

                                <label  class="org-name">اﺳﻢ الجهة<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('name') error @enderror"  name="name" value="{{$organisation->name}}" placeholder="ادخل اسم الجهة" >
                                <small>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="mb-3 col-md-4">

                                <label  class="org-name">مجال العمل<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('field') error @enderror"  name="field" value="{{$organisation->field}}" placeholder="ادخل مجال العمل" >
                                <small>
                                    @error('field')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="mb-3 col-md-4">

                                <label  class="org-name">نوع الجهة<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                {{-- <input type="text" class="form-custom @error('category') error @enderror"  name="category" value="{{$organisation->category}}"> --}}
                                <select class="form-custom @error('category') error @enderror" id="category" name="category" value="{{$organisation->category}}">
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
                                <input type="year" class="form-custom @error('year') error @enderror" name="year" value="{{$organisation->year}}" >
                                <small>
                                    @error('year')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label  class="form-label">الموقع الإلكترونى<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('website') error @enderror" name="website" value="{{$organisation->website}}" >
                                <small>
                                    @error('website')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label  class="form-label">صفحة الفيس بوك<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('facebook') error @enderror" name="facebook" value="{{$organisation->facebook}}" >
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
                                <input type="text" class="form-custom @error('phone') error @enderror" name="phone" value="{{$organisation->phone}}" >
                                <small>
                                    @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label  class="form-label">البريد الإلكترونى<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="email" class="form-custom @error('email') error @enderror" name="email" value="{{$organisation->email}}" >
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
                                <input type="text" class="form-custom @error('country') error @enderror" name="country" value="{{$organisation->country}}" >
                                <small>
                                    @error('country')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label  class="form-label">المحافظة<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('governorate') error @enderror" name="governorate" value="{{$organisation->governorate}}" >
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
                                <input type="text" class="form-custom @error('address') error @enderror" name="address" value="{{$organisation->address}}" >
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
                                <input type="number" class="form-custom @error('employees_no') error @enderror" name="employees_no" value="{{$organisation->employees_no}}" >
                                <small>
                                    @error('employees_no')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label  class="form-label">النطاق الجغرافى<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('geo') error @enderror" name="geo" value="{{$organisation->geo}}" >
                                <small>
                                    @error('geo')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label  class="form-label">أفضل طريقة للتواصل<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('communication_way') error @enderror" name="communication_way" value="{{$organisation->communication_way}}" >
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
                                <input type="text" class="form-custom @error('point_of_contact_name') error @enderror" name="point_of_contact_name" value="{{$organisation->point_of_contact_name}}" >
                                <small>
                                    @error('point_of_contact_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label  class="form-label">وظيفة مسئول الاتصال<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('point_of_contact_position') error @enderror" name="point_of_contact_position" value="{{$organisation->point_of_contact_position}}" >
                                <small>
                                    @error('point_of_contact_position')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label  class="form-label">البريد الإلكترونى لمسئول الاتصال<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="email" class="form-custom @error('point_of_contact_email') error @enderror" name="point_of_contact_email" value="{{$organisation->point_of_contact_email}}" >
                                <small>
                                    @error('point_of_contact_email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label  class="form-label">هاتف مسئول الاتصال<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('point_of_contact_phone') error @enderror" name="point_of_contact_phone" value="{{$organisation->point_of_contact_phone}}" >
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
                                <input type="text" class="form-custom @error('about_wataneya') error @enderror" name="about_wataneya" value="{{$organisation->about_wataneya}}" >
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
