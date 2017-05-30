@extends('layouts.index')

@section('content')
    <div class="container">
      <h1 class="page-heading">LOG IND</h1>
    </div>

    <div class="container">
        <div class="row">

            <div class="col-md-6">

                <form class="form-box" role="form" method="POST" action="{{ url('auth/save-email') }}">
                  <h3 class="page-subheading">OPRET EN KONTO</h3>

                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="form-group row">
                    <div class="col-md-7">
                      <label class="control-label">Email</label>
                      <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="button btn btn-default button-medium" style="margin-right: 15px;">
                        Create An Account
                    </button>
                  </div>

                </form>
            </div>

             <div class="col-md-6">
                <form class="form-box" role="form" method="POST" action="{{ url('login') }}">
                  <h3 class="page-subheading">ALLEREDE KUNDE?</h3>

                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="form-group row">
                    <div class="col-md-7">
                      <label class="control-label">Email</label>
                      <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-7">
                      <label class="control-label">Password</label>
                      <input type="password" class="form-control" name="password">
                    </div>
                  </div>

                  <div class="form-group">
                    <a href="{{ route('auth.password.reset') }}">Forgot your password?</a>
                  </div>

                  <div class="form-group">
                    <label>
                        <input type="checkbox" name="remember"> Remember me
                    </label>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="button btn btn-default button-medium" style="margin-right: 15px;">
                      Log In
                    </button>
                  </div>
                </form>
             </div>
        </div>
    </div>

@endsection
