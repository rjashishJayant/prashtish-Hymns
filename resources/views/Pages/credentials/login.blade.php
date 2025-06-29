<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prasthish - LogIn</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body class="log_in_gif">
<div class="container">
    <div class="card" style="width: 60%;margin-left: 260px;margin-top: 215px;">
        <div class="card-header">
            <h4 style="color: #ffffff">Log In</h4>
        </div>
        <div class="card-body">
            <form action="{{route('prashtish.login')}}" method="post">
                @csrf
                <div class="form-group row mb-md-3">
                    <label for="email" style="margin-bottom: 10px">Email</label>
                    <div class="col-md-12">
                        <input type="email" name="email" id="email" class="form-control" autocomplete="off">
                    </div>
                    @error('email')
                    <div style="color:red;">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group row">
                    <label for="password" style="margin-bottom: 10px">Password</label>
                    <div class="col-md-12">
                        <input type="password" name="password" id="password" class="form-control" autocomplete="off">
                    </div>
                    @error('password')
                    <div style="color:red;">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="btn-group-md text-md-center mt-md-3">
                    <button type="submit" class="btn btn-login m-md-2">Log In</button>
                    <a href="{{route('register')}}" class="btn btn-outline-warning text-black me-md-2">Register</a>
                    <a href="{{route('homepage.guest')}}" class="btn btn-outline-info text-black">Back To Website</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>
