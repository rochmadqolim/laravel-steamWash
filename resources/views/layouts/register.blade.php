<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Steam Wash | Register</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="register" class="h1"><b>Steam</b>Wash</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Register account</p>
                <form action="register" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input name="fullname" type="text" class="form-control" placeholder="Full name" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="username" type="username" class="form-control" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>

            </div>
            </form>
            <a href="login" class="text-center">Already have an account</a>
        </div>

    </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

    <!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form[action="register"]');
    form.addEventListener('submit', function(event) {
      event.preventDefault();
      setTimeout(() => {
        Swal.fire({
          icon: 'success',
          title: 'Registration Successful!',
          text: 'Welcome to SteamWash!',
        }).then(() => {
          window.location.href = 'login';
        });
      }, 1000);
    });
  });
</script>

</body>

</html>
