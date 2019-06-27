<!DOCTYPE html>
<html>
<head>
	<title>voice Search</title>
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


 <link rel="stylesheet" href="{{asset('/voiceSearch/assets/css/main.css')}}" /> <!-- voice  search css -->
</head>
<body>
  @include('frontEnd.includes.header')

  <header id="header">
        <h1>VoiceFX</h1>
        <p></p>
      </header>

	<form id="labnol1" method="post" action="/voicecontrollehotel">
		{{ csrf_field() }}
  <div class="speech">
    <input type="text" name="q" id="transcript" placeholder="Search by your Destination (country)" class="typeahead form-control" />
    <img onclick="startDictationH()" src="//i.imgur.com/cHidSVu.gif" />
  </div>
</form>


  <form id="labnol2" method="post" action="/voicecontrolleflight">
    {{ csrf_field() }}
  <div class="speech">
    <input type="text" name="f" id="transcript1" placeholder="Search by Flight name" class="typeahead form-control" />
    <img onclick="startDictationF()" src="//i.imgur.com/cHidSVu.gif" />
  </div>
</form>



<script>
  function startDictationH() {

    if (window.hasOwnProperty('webkitSpeechRecognition')) {

      var recognition = new webkitSpeechRecognition();

      recognition.continuous = false;
      recognition.interimResults = false;

      recognition.lang = "en-US";
      recognition.start();

      recognition.onresult = function(e) {
        document.getElementById('transcript').value
                                 = e.results[0][0].transcript;
        recognition.stop();
        document.getElementById('labnol1').submit();
      };

      recognition.onerror = function(e) {
        recognition.stop();
      }

    }
  }
</script>
<script>
  function startDictationF() {

    if (window.hasOwnProperty('webkitSpeechRecognition')) {

      var recognition = new webkitSpeechRecognition();

      recognition.continuous = false;
      recognition.interimResults = false;

      recognition.lang = "en-US";
      recognition.start();

      recognition.onresult = function(e) {
        document.getElementById('transcript1').value
                                 = e.results[0][0].transcript;
        recognition.stop();
        document.getElementById('labnol2').submit();
      };

      recognition.onerror = function(e) {
        recognition.stop();
      }

    }
  }
</script>


<script src="{{asset('/voiceSearch/assets/js/main.js')}}"></script>

</body>
</html>
