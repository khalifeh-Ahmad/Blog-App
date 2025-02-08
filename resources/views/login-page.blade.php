<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login - Admin Panel</title>

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom Styles -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <style>
        /* Custom Styles */
        body {
            font-family: 'Poppins', sans-serif;
        }

        .form-control {
            border-radius: 15px;
            box-shadow: none;
        }

        .btn-primary {
            border-radius: 25px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0069d9;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body class="bg-light">

    <main>
        <div class="container">

            <section class="section login min-vh-100 d-flex flex-column align-items-center justify-content-center py-5">
                <div class="row justify-content-center">
                    <div
                        class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center bg-white p-5 rounded shadow-lg">

                        <div class="text-center mb-4">
                            <a href="index.html" class="logo d-flex justify-content-center align-items-center">
                                <img src="assets/img/logo.png" alt="Logo" class="mb-3">
                                <span class="h4 font-weight-bold">Admin Panel</span>
                            </a>
                        </div>

                        <h5 class="text-center font-weight-bold mb-4">Login to Your Account</h5>
                        <p class="text-center text-muted mb-4">Enter your username & password to login</p>

                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        <form class="row g-3" action="{{ route('LoginUser') }}" method="POST">
                            @csrf
                            <div class="col-12">
                                <label for="yourUsername" class="form-label">Username</label>
                                <div class="input-group">
                                    <input type="text" name="username" class="form-control rounded"
                                        value="{{ old('username') }}" placeholder="Enter your username">
                                </div>
                                <span class="text-danger">
                                    @error('username')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control rounded"
                                    placeholder="Enter your password">
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-12">
                                <p class="small mb-0">Forgot password? <a href="/forgot/password"
                                        style="font-weight: bold">Recover here!</a></p>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-2 rounded-pill shadow-sm"
                                    type="submit">Login</button>
                            </div>

                            <div class="col-12 text-center mt-3">
                                <p class="small mb-0">Don't have an account? <a
                                        href="/register"style="font-size: 20px;font-weight: bolder">Create an
                                        account</a>
                                </p>
                            </div>
                        </form>

                    </div>
                </div>
            </section>

        </div>
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Error!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'Okay'
            });
        </script>
    @endif
</body>

</html>
