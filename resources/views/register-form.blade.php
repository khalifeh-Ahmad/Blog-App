<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Register - Admin Panel</title>

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="assets/css/style.css" rel="stylesheet">
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

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-5">
                <div class="row justify-content-center">
                    <div
                        class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center bg-white p-5 rounded shadow-lg">

                        <div class="text-center mb-4">
                            <a href="index.html" class="logo d-flex justify-content-center align-items-center">
                                <img src="assets/img/logo.png" alt="Logo" class="mb-3">
                                <span class="h4 font-weight-bold">Admin Panel</span>
                            </a>
                        </div>

                        <h5 class="text-center font-weight-bold mb-4">Create an Account</h5>
                        <p class="text-center text-muted mb-4">Enter your personal details to create an account</p>

                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif

                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        <form class="row g-3" action="{{ route('registerUser') }}" method="POST">
                            @csrf
                            <div class="col-12">
                                <label for="yourName" class="form-label">Your Name</label>
                                <input type="text" name="name" class="form-control rounded"
                                    placeholder="Your Full Name">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-12">
                                <label for="yourEmail" class="form-label">Your Email</label>
                                <input type="email" name="email" class="form-control rounded"
                                    placeholder="Your Email">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-12">
                                <label for="yourUsername" class="form-label">Username</label>
                                <div class="input-group">
                                    <span class="input-group-text">@</span>
                                    <input type="text" name="username" class="form-control rounded"
                                        placeholder="Your Username">
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
                                    placeholder="Password">
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-12">
                                <label for="yourPassword" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control rounded"
                                    placeholder="Confirm Password">
                                <span class="text-danger">
                                    @error('password_confirmation')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="col-12 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" name="terms" type="checkbox" id="acceptTerms"
                                        required>
                                    <label class="form-check-label" for="acceptTerms">
                                        I agree and accept the <a href="#">terms and conditions</a>
                                    </label>
                                    <div class="invalid-feedback">You must agree before submitting.</div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-2 rounded-pill shadow-sm" type="submit">Create
                                    Account</button>
                            </div>

                            <div class="col-12 text-center mt-3">
                                <p class="small mb-0">Already have an account? <a href="/login"
                                        style="font-size: 20px;font-weight: bolder">Log in</a></p>
                            </div>
                        </form>

                    </div>
                </div>
            </section>

        </div>
    </main>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>
