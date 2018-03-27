<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  <script src='https://cdn.jsdelivr.net/jquery.validation/1.13.1/jquery.validate.js'></script>
  <script src='https://cdn.jsdelivr.net/jquery.validation/1.13.1/additional-methods.js'></script>
</head>
<body>

<div class="container">
  <h2>Google Recaptcha Code validation</h2>
  <form action="{{route('getForm')}}" method="post" id="form_validate">
    {{csrf_field()}}
    <div class="form-group {{ $errors->first('email') ? 'has-error':''}}">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" >
      <p style="color: red">{{ $errors->first('email') }}</p>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
       {!! app('captcha')->display() !!}
    
    <p style="color: red">{{$errors->first('g-recaptcha-response')}}</p>
    <div class="checkbox">
      <label><input type="checkbox" name="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

<script type="text/javascript" src="{{asset('validate/jquery-validate.bootstrap-tooltip.js')}}"></script>
<script type="text/javascript" src="{{asset('validate/jquery-validate.bootstrap-tooltip.min.js')}}"></script>
<script type="text/javascript">
  $(document).ready(function(){
  
    $("#form_validate").validate({
        rules: {
           email: { required: true }
        },
        tooltip_options: {
           email: { placement: 'top' }
        }
   

      });

    });

</script>
</body>
</html>
