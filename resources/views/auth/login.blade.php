<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="d-flex bg-white rounded-lg shadow-lg overflow-hidden" style="width: 800px; height: 500px;">
        <div class="col-6 p-5">
            <h2 class="text-center text-dark fw-bold">RA NURUL HIDAYAH</h2>
            <p class="text-center text-secondary fs-5 mt-3">LOGIN</p>
            
            <form class="mt-4" action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label text-dark fw-bold">Username</label>
                    <input type="text" value="{{ old('username') }}" name="username" id="username" placeholder="Username" required class="form-control">
                </div>
                
                <div class="mb-3">
                    <label for="password" class="form-label text-dark fw-bold">Password</label>
                    <input type="password" name="password" id="password" placeholder="Password" required class="form-control">
                </div>

                <div class="d-flex justify-content-between mt-3">
                    <a href="#" class="text-primary text-decoration-none">Forgot Password?</a>
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-4">
                    Login
                </button>
            </form>
        </div>
        
        <div class="col-6 d-flex align-items-center justify-content-center bg-primary bg-gradient">
            <img src="{{ asset('images/admin_login_graphic.png') }}" alt="Login Graphic" class="img-fluid" style="max-height: 75%;">
        </div>
    </div>

    <!-- Modal for Login Error -->
    @if ($errors->has('login'))
    <div class="modal fade" id="loginErrorModal" tabindex="-1" role="dialog" aria-labelledby="loginErrorModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="loginErrorModalLabel">Login Gagal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Username atau Password yang dimasukkan tidak sesuai.
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        // Show modal if there is a login error
        $(document).ready(function() {
            @if ($errors->has('login'))
                $('#loginErrorModal').modal('show');
            @endif
        });
    </script>
</body>
</html>
