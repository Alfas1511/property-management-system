<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register | PMS</title>

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/adminlte.css') }}">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css">
</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <div class="col-md-5 col-lg-4">

            <div class="card shadow-sm border-0 rounded-4">

                <div class="card-body p-4">

                    <h4 class="text-center mb-3 fw-bold">Create an Account</h4>
                    <p class="text-center text-muted mb-4">Register to get started</p>

                    {{-- Success Message --}}
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    {{-- Error Message --}}
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('register') }}" method="post">
                        @csrf

                        {{-- Name --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Full Name *</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Enter full name" name="name" value="{{ old('name') }}">
                            </div>
                            @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email *</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Enter your email" name="email" value="{{ old('email') }}">
                            </div>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password *</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Enter password" name="password">
                            </div>
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Terms --}}
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="terms" id="agree"
                                {{ old('terms') ? 'checked' : '' }}>
                            <label class="form-check-label" for="agree">
                                I agree to the <a href="#">Terms & Conditions</a> *
                            </label>
                        </div>
                        @error('terms')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror

                        {{-- Submit --}}
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                            Create Account
                        </button>

                        <div class="text-center mt-3">
                            <small class="text-muted">
                                Already have an account?
                                <a href="{{ route('loginPage') }}">Login</a>
                            </small>
                        </div>

                    </form>

                </div>
            </div>
        </div>

    </div>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/admin/js/adminlte.js') }}"></script>

</body>

</html>
