
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Table V04</title>
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

</head>
<body>
    


    

            
    <div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table100 ver3 m-b-110">
                    <div class="table100-head">
                        <table>
                            <thead>
                                <tr class="row100 head ">
                                    <th class="cell100 column1 ">HotelID</th>
                                    <th class="cell100 column2">Hotel Name</th>
                                    <th class="cell100 column3">City</th>
                                    <th class="cell100 column4">Country</th>
                                    <th class="cell100 column5">Price</th>
                                    <th class="cell100 column6"></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                @foreach ($hotel as $hotel)
                    <div class="table100-body js-pscroll">
                        <table>
                            <tbody>
                                <tr class="row100 body">
                                    <td class="cell100 column1">{{$hotel->id}}</td>
                                    <td class="cell100 column2">{{$hotel->HotelName}}</td>
                                    <td class="cell100 column3">{{$hotel->City}}</td>
                                    <td class="cell100 column4">{{$hotel->Country}}</td>
                                    <td class="cell100 column5">{{$hotel->Price}}</td>
                                    <td class="cell100 column6"><a href="{{ url('/book/'. $hotel->id) }}" >Book</a></td>
                                      <!-- <ul>
        <li>{{$hotel->id}}</li>
        <li>{{$hotel->HotelName}}</li>
        <li>{{$hotel->City}}</li>
        <li>{{$hotel->Country}}</li>
        <li>{{$hotel->Price}}</li>
        
        <a href="{{ url('/book/'. $hotel->id) }}" >Edit</a>
    </ul> -->
                                    
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


</body>


</html>
