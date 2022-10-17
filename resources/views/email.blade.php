<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>
    @if(session()->has('message'))
    <div class="alert alert-success">
       {{ session()->get('message') }}
   </div>
  @endif

  <form action="{{route('send.email')}}" method="post">
      @csrf
      <input type="text" placeholder="First Name" name="firstname">
      <input type="text" placeholder="Last Name" name="lastname">
      <input type="email" placeholder="Email" name="email">
      <input type="text" placeholder="Description" name="text">
       <button type="submit">Send</button>
      
      
  </form>


    
</body>
</html>