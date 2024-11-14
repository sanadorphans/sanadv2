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
     <form method="post" action="{{route('users.orphanage.update')}}" class="main-form was-validated px-5" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
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

                                <label  class="org-name">اﺳﻢ الجمعية<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('name') error @enderror"  name="name" value="{{$orphanage->name}}">
                                <small>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="mb-3 col-md-4">

                                <label  class="org-name">رقم الترخيص<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('license_number') error @enderror"  name="license_number" value="{{$orphanage->license_number}}">
                                <small>
                                    @error('license_number')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>

                            <div class="mb-3 col-md-4">

                                <label  class="org-name">رقم الموبايل<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('mobile') error @enderror"  name="mobile" value="{{$orphanage->mobile}}">
                                <small>
                                    @error('mobile')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label  class="form-label">الدولة<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('country') error @enderror" name="country" value="{{$orphanage->country}}" >
                                <small>
                                    @error('country')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label  class="form-label">المحافظة<small class="text-danger mx-2">'{{__( 'lang.field_required' )}}'</small></label>
                                <input type="text" class="form-custom @error('governorate') error @enderror" name="governorate" value="{{$orphanage->governorate}}" >
                                <small>
                                    @error('governorate')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>

                        </div>







                   </div>
                 </div>
             </div>


             {{-- <div class="button-holder mb-5 mt-4">
                <input type="submit" class="btn btn-primary btn-block" value="{{__('lang.save')}}">
             </div> --}}
         </div>

         <div class="form-container container bg-white p-3 mt-4" style="border-radius:15px; ">
            <div class="py-3">
                <h3>
                    الاحتياجات التعليمية
                </h3>
            </div>


             <div class="row">


                 <div class="col-12 ">

                   <div class="org-data">
                        <div class="row">
                            <div class="mb-3 col-md-12">

                                <label  class="org-name"> أعداد الاطفال في كل مرحلة دراسية والمراحل الجامعية ؟
                                    توضيح (رجاء كتابة السنوات الدراسية واعداد الأطفال بها  مثال  الصف الاول الابتدائى 10 اطفال  / الصف الثانى الابتدائى 5 اطفال )</label>
                                <input type="text" class="form-custom @error('children_no') error @enderror"  name="children_no" value="{{$orphanage->children_no}}" >
                                <small>
                                    @error('children_no')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="mb-3 col-md-4">

                                <label  class="org-name">
                                    ما هي أنواع المدارس المقيد بها الأطفال؟

                                </label>
                                <select class="form-control" name="schools_type" id="schools_type">
                                    {{-- <option value="" selected></option>
                                    <option value="حكومية">حكومية</option>
                                    <option value="خاصة">خاصة</option>
                                    <option value="تجريبى">تجريبى</option>
                                    <option value="لغات">لغات</option> --}}
                                    @if ($orphanage->schools_type =='حكومية')
                                        <option value="حكومية" selected>حكومية</option>
                                    @else
                                        <option value="حكومية">حكومية</option>
                                    @endif
                                    @if ($orphanage->schools_type =='خاصة')
                                        <option value="خاصة" selected>خاصة</option>
                                    @else
                                        <option value="خاصة">خاصة</option>
                                    @endif
                                    @if ($orphanage->schools_type =='تجريبى')
                                        <option value="تجريبى" selected>تجريبى</option>
                                    @else
                                        <option value="تجريبى">تجريبى</option>
                                    @endif
                                    @if ($orphanage->schools_type =='لغات')
                                        <option value="لغات" selected>لا</option>
                                    @else
                                        <option value="لغات">لغات</option>
                                    @endif

                                </select>
                                {{-- <input type="text" class="form-custom @error('schools_type') error @enderror"  name="schools_type" value="{{$orphanage->schools_type}}"> --}}
                                <small>
                                    @error('schools_type')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>

                            <div class="mb-3 col-md-12">

                                <label  class="org-name">
                                    ما هى أنواع الجامعات المقيد بها الشباب؟
                                    (اسم الجامعة و الكلية)
                                </label>
                                <input type="text" class="form-custom @error('Universities_names_with_colleges') error @enderror"  name="Universities_names_with_colleges" value="{{$orphanage->Universities_names_with_colleges}}"  >
                                <small>
                                    @error('Universities_names_with_colleges')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>

                        </div>



                   </div>
                 </div>
             </div>

         </div>

         <div class="form-container container bg-white p-3 mt-4" style="border-radius:15px; ">
            <div class="py-3">
                <h3>
                    الاحتياجات الصحية
                </h3>
            </div>


             <div class="row">


                 <div class="col-12 ">

                   <div class="org-data">
                        <div class="row">
                            <div class="mb-3 col-md-4">

                                <label  class="org-name">
                                    هل توجد حقيبة إسعافات أولية؟
                                </label>
                                <select class="form-control" name="first_aid_kit" id="first_aid_kit">
                                    @if ($orphanage->first_aid_kit =='')
                                        <option value="" selected></option>
                                    @else
                                        <option value=""></option>
                                    @endif
                                    @if ($orphanage->first_aid_kit =='1')
                                        <option value="1" selected>نعم</option>
                                    @else
                                        <option value="1">نعم</option>
                                    @endif
                                    @if ($orphanage->first_aid_kit =='0')
                                        <option value="0" selected>لا</option>
                                    @else
                                        <option value="0">لا</option>
                                    @endif



                                </select>
                                <small>
                                    @error('first_aid_kit')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>



                            <div class="mb-3 col-md-12">

                                <label  class="org-name">
                                    هل تحتاج الى توفير اأدوية شهرية للأطفال لديها أمراض مزمنة؟
                                    فى حالة الإجابة بنعم برجاء تحديد نوع المرض واعداد الأطفال مثال ( مرض السكر  عدد 4 اطفال )
                                </label>
                                <input type="text" class="form-custom @error('medical_drugs_clarifications') error @enderror"  name="medical_drugs_clarifications" value="{{$orphanage->medical_drugs_clarifications}}"  >

                                <small>
                                    @error('medical_drugs_clarifications')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>

                            <div class="mb-3 col-md-12">

                                <label  class="org-name">
                                    هل يوجد حالات تحتاج إلى إجراء عمليات باهظة التكلفة ؟
                                    فى حالة الإجابة بنعم  برجاء كتابة  نوع العملية و العدد  مثال ( عملية قلب مفتوح  عدد 3 أطفال )
                                </label>
                                <input type="text" class="form-custom @error('medical_operations_clarifications') error @enderror"  name="medical_operations_clarifications" value="{{$orphanage->medical_operations_clarifications}}"  >

                                <small>
                                    @error('medical_operations_clarifications')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>

                            <div class="mb-3 col-md-12">

                                <label  class="org-name">
                                                                            هل يوجد حالات بحاجة إلى إجراء فحوصات وتحاليل دورية؟
                                        فى حالة الإجابة بنعم  برجاء كتابة  نوع الحالات والفحوصات والتحاليل المطلوبة  و العدد
                                </label>
                                <input type="text" class="form-custom @error('medical_tests_clarifications') error @enderror"  name="medical_tests_clarifications" value="{{$orphanage->medical_tests_clarifications}}"  >

                                <small>
                                    @error('medical_tests_clarifications')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>




                        </div>



                   </div>
                 </div>
             </div>


             {{-- <div class="button-holder mb-5 mt-4">
                <input type="submit" class="btn btn-primary btn-block" value="{{__('lang.save')}}">
             </div> --}}
         </div>


        <div class="form-container container bg-white p-3 mt-4" style="border-radius:15px; ">
            <div class="py-3">
                <h3>
                    احتياجات لدعم اجتماعي
                </h3>
            </div>


             <div class="row">


                 <div class="col-12 ">

                   <div class="org-data">
                        <div class="row">

                            <div class="mb-3 col-md-12">

                                <label  class="org-name">
                                                                        هل يوجد فتيات  بحاجة إلى تيسير الزواج و تكوين أسرة  ( جهاز العروسة ) ؟
                                    في حالة الإجابة بنعم  يرجى توضيح العدد و الاحتياجات المطلوبة
                                </label>
                                <input type="text" class="form-custom @error('marriage_needs_clarifications') error @enderror"  name="marriage_needs_clarifications" value="{{$orphanage->marriage_needs_clarifications}}"  >

                                <small>
                                    @error('marriage_needs_clarifications')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>

                            <div class="mb-3 col-md-12">

                                <label  class="org-name">
                                    هل يوجد لدى الدار شباب أو شابات بحاجة الى إيجاد مورد رزق دائم لهم عن طريق توفير عمل يتناسب مع قدراته واستعداداته وتعليمه حتى يوفر لنفسه الطعام والشراب والحماية ؟
                                    في حالة الإجابة بنعم يرجى كتابة عدد الشباب  أو شابات و المؤهل الدارسى
                                </label>
                                <input type="text" class="form-custom @error('job_needs_clarifications') error @enderror"  name="job_needs_clarifications" value="{{$orphanage->job_needs_clarifications}}"  >

                                <small>
                                    @error('job_needs_clarifications')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>




                        </div>



                   </div>
                 </div>
             </div>


             {{-- <div class="button-holder mb-5 mt-4">
                <input type="submit" class="btn btn-primary btn-block" value="{{__('lang.save')}}">
             </div> --}}
        </div>

        <div class="form-container container bg-white p-3 mt-4" style="border-radius:15px; ">
            <div class="py-3">
                <h3>
                    احتياجات تجهيزية للدار

                </h3>
            </div>


             <div class="row">


                 <div class="col-12 ">

                   <div class="org-data">
                        <div class="row">

                            <div class="mb-3 col-md-12">

                                <label  class="org-name">
                                    هل الدار تحتاج إلى ترميم أو اثاث؟
                                    في حالة الإجابة بنعم برجاء تحديد نوع الترميم او الأثاث المطلوب
                                </label>
                                <input type="text" class="form-custom @error('construction_needs_clarifications') error @enderror"  name="construction_needs_clarifications" value="{{$orphanage->construction_needs_clarifications}}"  >

                                <small>
                                    @error('construction_needs_clarifications')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>

                            <div class="mb-3 col-md-12">

                                <label  class="org-name">
                                    هل يوجد فرش للأرضيات من خامات صحية و جيدة (سجاد أو كليم ) ؟
                                    في حالة الإجابة  ب ( لا)  يرجى كتابة العدد المطلوب
                                </label>
                                <input type="text" class="form-custom @error('carpets') error @enderror"  name="carpets" value="{{$orphanage->carpets}}"  >

                                <small>
                                    @error('carpets')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>
                            <div class="mb-3 col-md-12">

                                <label  class="org-name">
                                    هل لدى الدار مفروشات تكفي عدد الأطفال و الشباب الموجودين في الدار  مثل ( ستائر - ملاءات - كوفرتات  - الفوط ) ؟
                                    في حالة الإجابة  ب (لا)  يرجى كتابة  نوع الفرش المطلوب  والعدد
                                </label>
                                <input type="text" class="form-custom @error('curtains') error @enderror"  name="curtains" value="{{$orphanage->curtains}}"  >

                                <small>
                                    @error('curtains')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>

                            <div class="mb-3 col-md-12">

                                <label  class="org-name">
                                    هل يوجد ألعاب للأطفال ملائمة لأعمارهم؟
                                    في حالة الإجابة ب (لا)  يرجي ذكر العدد و عمر الأطفال
                                </label>
                                <input type="text" class="form-custom @error('toys') error @enderror"  name="toys" value="{{$orphanage->toys}}"  >

                                <small>
                                    @error('toys')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>

                            <div class="mb-3 col-md-12">

                                <label  class="org-name">
                                    هل يوجد مكتبة بالدار ؟
                                    في حالة الإجابة ب (لا)  يرجي ذكر العدد و عمر الأطفال
                                </label>
                                <input type="text" class="form-custom @error('library') error @enderror"  name="library" value="{{$orphanage->library}}"  >

                                <small>
                                    @error('library')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>

                            <div class="mb-3 col-md-12">

                                <label  class="org-name">
                                    هل يوجد أواني للطبخ صحية  نوعها  ستانلس ستيل ؟
                                    في حالة الإجابة بنعم  يرجى ذكر  عدد الأواني
                                </label>
                                <input type="text" class="form-custom @error('utensils') error @enderror"  name="utensils" value="{{$orphanage->utensils}}"  >

                                <small>
                                    @error('utensils')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>

                            <div class="mb-3 col-md-12">

                                <label  class="org-name">
                                    هل الدرا في حاجة إلى أجهزة كمبيوتر ؟
                                    في حالة الإجابة بنعم يرجى ذكر عدد الأجهزة المطلوبة
                                </label>
                                <input type="text" class="form-custom @error('computers') error @enderror"  name="computers" value="{{$orphanage->computers}}"  >

                                <small>
                                    @error('computers')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>

                            <div class="mb-3 col-md-12">

                                <label  class="org-name">
                                    هل الدار في حاجة إلى كسوة للشتاء - كسوة للصيف ( ملابس شتوية - صيفية ) ؟
                                    في حالة الإجابة بنعم يرجى توضيح الأعمار والملابس المطلوبة والمقاسات
                                </label>
                                <input type="text" class="form-custom @error('clothes') error @enderror"  name="clothes" value="{{$orphanage->clothes}}"  >

                                <small>
                                    @error('clothes')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </small>
                            </div>

                            <div class="mb-3 col-md-12">

                                <label  class="org-name">
                                    هل يوجد للدار أي إحتياجات أخرى لم يتم ذكرها ؟
                                </label>
                                <input type="text" class="form-custom @error('other_needs') error @enderror"  name="other_needs" value="{{$orphanage->other_needs}}"  >

                                <small>
                                    @error('other_needs')
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
