<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>foodSaver - Login</title>
</head>
<body>
    @extends('templates.footer')
    @section('content')

        <div class="container-fluid d-flex flex-column" style="background-color: white; height: 91vh">
            <div class="text-center">
                <img src="foodSaver_logo.svg" style="width: 50vw" class="align-center">
                <p class="fs-4 fst-italic">Your food logging app</p>
            </div>
            <div name="loginBox" class="container d-flex flex-column justify-content-center rounded-5 shadow-lg" style="background-color: snow">
                <p class="fs-1 fw-bold text-center m-4">Login</p>
                <form>
                    <div class="mb-3">
                        <div class="container col-4">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="container col-4">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                    </div>
                    <div class="container col-2 mb-4">
                        <div class="d-grid gap-2">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    @endsection
</body>
</html>
