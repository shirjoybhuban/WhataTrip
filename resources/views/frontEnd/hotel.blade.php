 <html>
    <head>
    	<title>Hotel</title>
    </head>
    <body>
  

<h1>no use</h1>

      @foreach ($hotel as $hotel)
    <ul>
    	<li>{{$hotel->id}}</li>
    	<li>{{$hotel->HotelName}}</li>
    	<li>{{$hotel->City}}</li>
    	<li>{{$hotel->Country}}</li>
    	<li>{{$hotel->Price}}</li>
        
        <a href="{{ url('/book/'. $hotel->id) }}" >Edit</a>
    </ul>
     @endforeach 
    

   
   

    </body>
    </html>


