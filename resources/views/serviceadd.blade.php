<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Font Icon -->
    <link rel="stylesheet" >

    <!-- Main css -->
    <link rel="stylesheet" >
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                        <h2 class="form-title\">Add sevices</h2>
                        <hr>
                        <form action = "/addservice" method="POST" class="register-form" id="register-form">
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                        @endif
                        @if(Session::has('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                        @endif
                        @csrf 
                            <div class="form-group">
								<label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
								<input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="Ниаменование услуги"/>
                                <span class="text-danger">@error('name'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" placeholder="Стоимость услуги"/>
                                <span class="text-danger">@error('email'){{$message}}@enderror</span>
                            </div><br>
                           
                            <div class="form-group">
                                <button class="btn btn-block btn-primary" type="submit" value="Register">Отправить</button> 
                            </div>
                        </form>
                    </div>
                   
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>