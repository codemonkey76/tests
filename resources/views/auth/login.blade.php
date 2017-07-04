@extends('layouts.master')

@section('content')

    <section class="imageblock switchable feature-large switchable--switch height-100">

        <div class="imageblock__content col-md-6 col-sm-4 pos-right">
            <div class="background-image-holder" style="max-width: 50%!important;">
                <img alt="image" src="{{ asset('images/') }}">
            </div>
        </div>

        <div class="container pos-vertical-center">
            <div class="row">
                <div class="col-sm-7 col-md-4">
                    <h2 class="type--uppercase">Dashboard Login</h2>

                    <form class="form-horizontal" role="form" method="POST" action="{{ ('#') }}">
                        {{ csrf_field() }}

                        <a class="btn block btn--icon bg--facebook type--uppercase" href="#">
                            <span class="btn__text">
                            <i class="socicon-facebook"></i>LOGIN with Facebook
                            </span>
                        </a>

                        <a class="btn block btn--icon bg--twitter type--uppercase" href="#">
                            <span class="btn__text">
                            <i class="socicon-google"></i>login with GOOGLE
                            </span>
                        </a>

                        <hr data-title="OR">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-3 text-center">

                                <div class="row" style="padding-top: 30px">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
                                </div>

                                <div class="row" style="padding-top: 30px">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </section>

@endsection

