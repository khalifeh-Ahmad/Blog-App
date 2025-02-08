<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pages / Reset Password - NiceAdmin Bootstrap Template</title>
    <meta content="Reset Password Page" name="description">
    <meta content="password reset, admin panel" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .card {
            border-radius: 8px;
            border: none;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 2rem;
        }

        .form-label {
            font-weight: 600;
            color: #4c4c4c;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            font-size: 16px;
            padding: 0.8rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .back-to-top {
            background-color: #007bff;
            border-radius: 50%;
            padding: 15px;
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 99;
            display: none;
        }

        .back-to-top i {
            color: #fff;
            font-size: 20px;
        }

        .credits {
            text-align: center;
            margin-top: 2rem;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .credits a {
            text-decoration: none;
            color: #007bff;
        }

        .credits a:hover {
            text-decoration: underline;
        }

        .alert {
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .logo img {
            max-width: 40px;
        }
    </style>
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <!-- Logo -->
                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">Admin Panel</span>
                                </a>
                            </div>

                            <!-- Card -->
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Create Your New Password</h5>
                                        <p class="text-center small">Please enter your new password below</p>
                                    </div>

                                    <!-- Flash Messages -->
                                    @if (Session::has('success'))
                                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                                    @endif
                                    @if (Session::has('error'))
                                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                    @endif

                                    <!-- Form -->
                                    <form class="row g-3" action="{{ route('ResetPassword') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user_data->id }}">
                                        <input type="hidden" name="user_email" value="{{ $user_data->email }}">

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">New Password</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Enter new password">
                                            <span class="text-danger">
                                                @error('password')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPasswordConfirmation" class="form-label">Confirm
                                                Password</label>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                placeholder="Confirm your password">
                                            <span class="text-danger">
                                                @error('cpassword')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Reset Password</button>
                                        </div>

                                        <div class="col-12 text-center">
                                            <p class="small mb-0"> <a href="/login">Login</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Credits -->
                            <div class="credits">
                                Designed by <a href="https://www.linkedin.com/in/khalifeh-ahmad/">Eng. Khalifeh
                                    Ahmad</a>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
