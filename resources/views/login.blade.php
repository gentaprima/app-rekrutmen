<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/x-icon" href="LOGO_TVUPI_PLAYSTORE_1.png" style="border-radius: 50%;">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css_login/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css_login/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css_login/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css_login/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css_login/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css_login/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('dashboard/new-style.css') }}">
    <!--===============================================================================================-->
</head>

<body>

    @if (Session::has('message'))
    <p hidden="true" id="message">{{ Session::get('message') }}</p>
    <p hidden="true" id="icon">{{ Session::get('icon') }}</p>
    @endif
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{asset('/logo.png')}}" alt="IMG" class="size-logo">
                </div>

                <form class="login100-form validate-form" method="post" action="/process-login">
                    @csrf
                    <span class="login100-form-title">
                        Users Login
                    </span>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="email" name="email" id="username" value="{{old('email')}}" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" id="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        <span class="txt1">

                        </span>
                        <a class="txt2" href="/sign-up">
                            Sign Up
                        </a>
                    </div>

                    <div class="text-center p-t-136">

                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="{{asset('css_login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('css_login/vendor/bootstrap/js/popper.js')}}"></script>
    <script src="{{asset('css_login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('css_login/vendor/select2/select2.min.js')}}"></script>
    <!--===============================================================================================-->
    <script src="{{asset('css_login/vendor/tilt/tilt.jquery.min.js')}}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{asset('css_login/js/main.js')}}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast'
            },
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true
        })
        let icon = document.getElementById('icon');
        if (icon != null) {
            let message = document.getElementById('message');
            Toast.fire({
                icon: icon.innerHTML,
                title: message.innerHTML
            });
        }
    </script>

</body>

</html>