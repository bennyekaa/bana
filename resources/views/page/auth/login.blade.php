<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - Admin</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}">

    <!-- Matrix CSS -->
    <link href="{{ asset('assets/dist/css/style.min.css') }}" rel="stylesheet">

    <!-- FIX BACKGROUND & CENTER LOGIN -->
    <style>
        html,
        body {
            height: 100%;
            background: #2f323e;
        }

        .main-wrapper {
            min-height: 100vh;
        }

        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>

    <div class="main-wrapper">

        <!-- Preloader -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

        <!-- Login Wrapper -->
        <div class="auth-wrapper bg-dark">

            <div class="auth-box bg-dark border-top border-secondary">

                <div class="text-center pt-3 pb-3">
                    <img src="{{ asset('assets/images/logo.png') }}" width="140">
                </div>

                {{-- ERROR LOGIN --}}
                @if (session('error'))
                    <div class="alert alert-danger text-center">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- FORM LOGIN LARAVEL --}}
                <form method="POST" action="{{url('actionlogin')}}" class="form-horizontal mt-3">
                    @csrf

                    <div class="input-group mb-3">
                        <span class="input-group-text bg-success text-white">
                            <i class="ti-user"></i>
                        </span>
                        <input type="text" name="username" class="form-control form-control-lg"
                            placeholder="Username" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text bg-warning text-white">
                            <i class="ti-lock"></i>
                        </span>
                        <input type="password" name="password" class="form-control form-control-lg"
                            placeholder="Password" required>
                    </div>

                    <div class="form-group mt-3">
                        <button class="btn btn-success w-100" type="submit">
                            Login
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        $(".preloader").fadeOut();
    </script>

</body>

</html>
