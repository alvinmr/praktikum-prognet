@extends('layouts.admin-layout.blank-layout.master')

@section('title', 'Login')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="login-card">
                <form class="theme-form login-form" action="{{ route('admin.login') }}" method="POST">
                    @csrf
                    <h4>Login</h4>
                    <h6>Welcome back! Log in to your account.</h6>
                    <div class="form-group">
                        <label>Username</label>
                        <div class="input-group @error('username') is-invalid @enderror"><span
                                class="input-group-text"><i class="icon-email"></i></span>
                            <input class="form-control" type="text" required="" placeholder="admin" name="username">
                        </div>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group"><span class="input-group-text"><i class="icon-lock"></i></span>
                            <input class="form-control" type="password" name="password" required=""
                                placeholder="*********">
                            <div class="show-hide"><span class="show"> </span></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection