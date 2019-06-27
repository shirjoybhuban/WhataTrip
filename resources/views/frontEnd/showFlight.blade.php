


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Flight search result</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="{{asset('/table/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/table/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/table/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/table/vendor/animate/animate.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/table/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/table/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('/table/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/table/css/main.css')}}">
<!--===============================================================================================-->
        <link rel="shortcut icon" href="favicon.ico"> <!-- CSS FOR NAV --> 

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
    @include('frontEnd.includes.header')    <!-- IF THERE IS NO RESULT -->
    
    @if (count($flight) === 0)
    <!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="{{asset('notfound/css/style.css')}}">
    <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:400,200italic,200,300,300italic,400italic,600,600italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    

</head>
<body>
    <div class="main w3l">
        <h2>Sorry Not Found</h2>
        
        <a href="{{ route('triphome') }}" class="back">Search again</a>
        <div class="social-icons w3">
            <ul>
                <li><a class="twitter" href="#"></a></li>
                <li><a class="facebook" href="#"></a></li>
                <li><a class="pinterest" href="#"></a></li>
            </ul>
        </div>
    
    </div>
    
</body>
</html>
    @else

    

            
    <div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table100 ver3 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                                <tr class="row100 head ">
                                    <th class="cell100 column1 ">Flight Name</th>
                                    <th class="cell100 column2">Departure Time</th>
                                    <th class="cell100 column3">Arrival Time</th>
                                    <th class="cell100 column4">Price(USD)</th>
                                    
                                    <th class="cell100 column5">Book</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                @foreach ($flight as $flight)
                    <div class="table100-body js-pscroll">
                        <table>
                            <tbody>
                                <tr class="row100 body">
                                    <!-- <td class="cell100 column1">{{$flight->id}}</td> -->
                                    <td class="cell100 column1">{{$flight->AirlinesName}}</td>
                                    <td class="cell100 column2">{{$flight->DepartureTime}}</td>
                                    <td class="cell100 column3">{{$flight->ArrivalTime}}</td>
                                    <td class="cell100 column4">{{$flight->Price}}</td>
                                    <td class="cell100 column5"><a href="{{ url('/bookFlight/'. $flight->id) }}" >Book</a></td>
                                     
                                    
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>      
                </div>
            </div>
        </div>
    </div>

    @endforeach 
<!--===============================================================================================-->  
    <script src="{{asset('/table/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('/table/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('/table/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('/table/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
    <script src="{{asset('/table/vendor/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script>
        $('.js-pscroll').each(function(){
            var ps = new PerfectScrollbar(this);

            $(window).on('resize', function(){
                ps.update();
            })
        });
            
        
    </script>
<!--===============================================================================================-->
    <script src="{{asset('/table/js/main.js')}}"></script>

    @endif
</body>


</html>
