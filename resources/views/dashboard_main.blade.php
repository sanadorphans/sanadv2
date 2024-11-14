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

 </main>
 <!--end main section-->





    <!--start js files-->


@endsection
@section('js')
<script>
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
