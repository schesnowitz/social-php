<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>This is a blade baby!</h1>
   <p>dynamic data 
    {{date("F j, Y, g:i a")}}
   </p>
   <p>dynamic from controller {{$name}} <br> {{$message}}</p>

   <ul>
    @foreach ($listOfStuff as $someitem)
    <li>{{$someitem}}</li>
           
    @endforeach(listOfStuff)
 
   </ul>
</body>
</html>