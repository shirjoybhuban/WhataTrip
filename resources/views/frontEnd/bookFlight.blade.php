
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book flight</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->

<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('/booking/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('/booking/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('/booking/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('/booking/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('/booking/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('/booking/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('/booking/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{asset('/booking/css/util.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('/booking/css/main.css')}}">
<!--===============================================================================================-->
<link rel="shortcut icon" href="favicon.ico">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="{{asset('/frontend/css/animate.css')}}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{asset('/frontend/css/icomoon.css')}}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{asset('/frontend/css/bootstrap.css')}}">
    <!-- Superfish -->
    <link rel="stylesheet" href="{{asset('/frontend/css/superfish.css')}}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('/frontend/css/magnific-popup.css')}}">
    <!-- Date Picker -->
    <link rel="stylesheet" href="{{asset('/frontend/css/bootstrap-datepicker.min.css')}}">
    <!-- CS Select -->
    <link rel="stylesheet" href="{{asset('/frontend/css/cs-select.css')}}">
    <link rel="stylesheet" href="{{asset('/frontend/css/cs-skin-border.css')}}">
    
    <link rel="stylesheet" href="{{asset('/frontend/css/style.css')}}">
</head>
<body>
  @include('frontEnd.includes.header')


  <div class="container-contact100">
    <div class="wrap-contact100">
      <form class="contact100-form"  action="/booksubmitflight/{{ $id }}"  method="POST"">
        {{ csrf_field() }}
        <span class="contact100-form-title">
          Please fill up
        </span>


        <div class="wrap-input100 " >
          <label class="label-input100" for="name">First name</label>
          <input id="name" class="input100" type="text" name="firstname" placeholder="Enter your first name..." required>
          <span class="focus-input100"></span>
        </div>


        <div class="wrap-input100 " >
          <label class="label-input100" for="email">Last name</label>
          <input id="email" class="input100" type="text" name="lastname" placeholder="Enter your last name..." required>
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 ">
          <label class="label-input100" for="email">Email Address</label>
          <input id="email" class="input100" type="text" name="email" placeholder="Enter your email..." required>
          <span class="focus-input100"></span>
        </div>

        <!-- <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
          <label class="label-input100" for="email">Phone Number</label>
          <input id="email" class="input100" type="text" name="phonenumber" placeholder="Enter your Phone Number...">
          <span class="focus-input100"></span>
        </div> -->
        <div class="container-contact100-form-btn">
          <button class="contact100-form-btn">
            Pay with Paypal
          </button>
        </div>
        <!-- <div class="container-contact100-form-btn">
        <input type="submit" value="Pay with Paypal">
        </div> -->
                @if(count($errors)>=1) 
                    <ul class="list-group list-group-flush" >
                       @foreach ($errors->all() as $value)
                        <li class="list-group-item list-group-item-danger">{{$value}}</li>
                       @endforeach
                    </ul>
                  @endif


      </form>

      <div class="contact100-more flex-col-c-m" style="background-image: url({{asset('/booking/images/bg-01.jpg')}});">
      </div>
    </div>
  </div>





<!--===============================================================================================-->
  <script src="{{asset('/booking/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('/booking/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('/booking/vendor/bootstrap/js/popper.js')}}"></script>
  <script src="{{asset('/booking/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('/booking/vendor/select2/select2.min.js')}}"></script>
  <script>
    $(".js-select2").each(function(){
      $(this).select2({
        minimumResultsForSearch: 20,
        dropdownParent: $(this).next('.dropDownSelect2')
      });
    })
    $(".js-select2").each(function(){
      $(this).on('select2:open', function (e){
        $(this).parent().next().addClass('eff-focus-selection');
      });
    });
    $(".js-select2").each(function(){
      $(this).on('select2:close', function (e){
        $(this).parent().next().removeClass('eff-focus-selection');
      });
    });

  </script>
<!--===============================================================================================-->
  <script src="{{asset('/booking/vendor/daterangepicker/moment.min.js')}}"></script>
  <script src="{{asset('/booking/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('/booking/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
  <script src="{{asset('/booking/')}}js/main.js"></script>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
  </script>
  @include('frontEnd.includes.footer')
</body>
</html>


