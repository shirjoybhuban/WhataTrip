 <html>
    <head>
    	<title>Flight</title>
    </head>
    <body>
  
<h1>no USed</h1>


      @foreach ($flight as $flight)
    <ul>
    	<li>{{$flight->id}}</li>
    	<li>{{$flight->AirlinesName}}</li>
    	<li>{{$flight->DepartureTime}}</li>
    	<li>{{$flight->ArrivalTime}}</li>
    	<li>{{$flight->Price}}</li>
        <a href="{{ url('/bookFlight/'. $flight->id) }}" >Book</a>
    </ul>
     @endforeach 
    

   
   

    </body>
    </html>


