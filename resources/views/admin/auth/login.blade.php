<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admin Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/adminlte.css') }}" />

    <style>
        body {
            background-color: #f4f6f9;
        }

        .auth-container {
            max-width: 460px;
            margin: 4% auto;
        }

        .card {
            border-radius: 14px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.07);
        }

        .card-body {
            padding: 2rem;
        }

        .page-title {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 5px;
            text-align: center;
        }

        .page-subtitle {
            text-align: center;
            color: #6c757d;
            margin-bottom: 22px;
        }

        .form-control {
            padding: 0.7rem;
        }

        .btn-primary {
            padding: 0.65rem;
            font-weight: 600;
        }

        .footer-links {
            text-align: center;
            margin-top: 15px;
        }

        .footer-links a {
            font-size: 14px;
            color: #007bff;
        }
    </style>
</head>

<body>

    <div class="auth-container">

        {{-- Logo OR Title --}}
        <h2 class="page-title">Welcome Back</h2>
        <p class="page-subtitle">Login to continue</p>

        {{-- Validation Messages --}}
        {{-- @if ($errors->any())
            <div class="alert alert-danger py-2">
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li style="font-size: 15px">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        @if (session('success'))
            <div class="alert alert-success py-2">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email *</label>
                        <div class="input-group">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                placeholder="Enter your email">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        </div>
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password *</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password"
                                placeholder="Enter your password">
                            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        </div>
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>

                        <a href="#" class="text-primary">Forgot Password?</a>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>

                <div class="footer-links mt-3">
                    <p class="mb-0">
                        Don't have an account?
                        <a href="{{ route('registrationPage') }}">Register</a>
                    </p>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/admin/js/adminlte.js') }}"></script>
</body>

</html>
