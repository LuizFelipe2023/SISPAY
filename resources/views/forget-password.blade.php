@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Forget Password</div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success">{{ session('message') }}</div>
                        @endif

                        <form method="POST" action="{{ route('submit-forget-password') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Send Password Reset Link</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
@endsection
