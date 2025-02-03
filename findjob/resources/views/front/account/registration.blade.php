@extends('front.layout.app')

@section('main')
<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Register</h1>
                    <form action="registrationForm" id="registrationForm">
                        <div class="mb-3">
                            <label for="" class="mb-2">Name*</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
                            <p></p>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Email*</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email">
                            <p></p>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Password*</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                            <p></p>
                        </div> 
                        <div class="mb-3">
                            <label for="" class="mb-2">Confirm Password*</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Please confirm Password">
                            <p></p>
                        </div> 
                        <button class="btn btn-primary mt-2">Register</button>
                    </form>                    
                </div>
                <div class="mt-4 text-center">
                    <p>Have an account? <a  href="login.html">Login</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('customJs')
{{-- <script>
$("#registrationForm").submit(function(e){
e.preventDefault();

$.ajax({
    url:'{{ route("account.processRegistration") }}',
    type:'post',
    data:$("registrationForm").serializeArray(),
    dataType:'json',
    success:function(response){
        if(response.status==false){
            
            var errors=response.errors;
            //Name
            if(errors.name){
                $("#name").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback')
                .html(errors.name)
            }else{
                $("#name").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback')
                .html('')
            }
            //Email
            if(errors.email){
                $("#email").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback')
                .html(errors.email)
            }else{
                $("#email").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback')
                .html('')
            }
            //Password
            if(errors.password){
                $("#password").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback')
                .html(errors.password)
            }else{
                $("#password").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback')
                .html('')
            }
            //confirm password
            if(errors.confirm_password){
                $("#confirm_password").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback')
                .html(errors.confirm_password)
            }else{
                $("#confirm_password").addClass('is-invalid')
                .siblings('p')
                .addClass('invalid-feedback')
                .html('')
            }
        }else{
            $("#name").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback')
                .html('');

                $("#email").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback')
                .html('');

                $("#password").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback')
                .html('');

                $("#confirm_password").removeClass('is-invalid')
                .siblings('p')
                .removeClass('invalid-feedback')
                .html('');
                window.location.href='{{ route("account.login") }}';
        }
        
  }
});


</script> --}}
<script>
    $("#registrationForm").submit(function(e) {
    e.preventDefault();

    $.ajax({
        url: '{{ route("account.processRegistration") }}',
        type: 'post',
        data: $("#registrationForm").serialize(),
        dataType: 'json',
        success: function(response) {
            if (response.status === false) {
                var errors = response.errors;

                // Clear previous validation errors
                $(".is-invalid").removeClass("is-invalid");
                $(".invalid-feedback").html("");

                // Display new validation errors
                if (errors.name) {
                    $("#name").addClass("is-invalid")
                        .siblings("p")
                        .addClass("invalid-feedback")
                        .html(errors.name[0]);
                }
                if (errors.email) {
                    $("#email").addClass("is-invalid")
                        .siblings("p")
                        .addClass("invalid-feedback")
                        .html(errors.email[0]);
                }
                if (errors.password) {
                    $("#password").addClass("is-invalid")
                        .siblings("p")
                        .addClass("invalid-feedback")
                        .html(errors.password[0]);
                }
                if (errors.confirm_password) {
                    $("#confirm_password").addClass("is-invalid")
                        .siblings("p")
                        .addClass("invalid-feedback")
                        .html(errors.confirm_password[0]);
                }
            } else {
                // Reset form fields
                $("#registrationForm")[0].reset();
                window.location.href = '{{ route("account.login") }}';
            }
        }
    });
});
</script>
@endsection
