<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        body {
            background-color: #e0ab69;
        }

        /* body {
            background-image: url(../images/bg.jpg);
            /* width: 100%;*/
        /* width: 100%;*/
        /* height: 100vh; */
        /* background-size: cover; */
        /* float: right; */
        /* background-color: #e0ab69;
            background-repeat: no-repeat;
            background-size: contain;
            background-position: right; */

        /* }  */

        /* .full-height {
            height: 100vh;
        } */

        .bg-image-vertical {
            position: relative;
            overflow: hidden;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: right center;
            /* background-size: auto 100%; */
            background-size: contain;
            /* height: 100%; */
        }

        @media (min-width: 1025px) {
            .h-custom-2 {
                height: 100%;
            }
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-black">

                    <div class="px-5 ms-xl-4 text-center">

                        <span class="navbar-brand mb-2 mt-3 mr-auto ml-auto">
                            <img src="{{ asset('../images/logo.png') }}" width="200px" height="auto" class="d-inline-block align-center" alt="">
                        </span>
                    </div>

                    <div class=" align-items-center  pr-5 pl-5">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class=" card-body ">
                                <div class="tab-pane fade show active">
                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                        <input id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                                        <div class="form-control-feedback">
                                            <i class="icon-user text-muted"></i>
                                        </div>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group form-group-feedback form-group-feedback-left">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password" autocomplete="current-password">
                                        <div class="form-control-feedback">
                                            <i class="icon-lock2 text-muted"></i>
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group d-flex align-items-center">
                                        <div class="form-check mb-0">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark btn-block">
                                            Log in
                                        </button>
                                    </div>
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif

                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="{{ asset('../images/bg.jpg') }}" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>