@extends('layouts.master')

@section('content')
    <section class="imageblock switchable feature-large switchable--switch height-100">
        <div class="imageblock__content col-md-6 col-sm-4 pos-right">
            <div class="background-image-holder">
                <img alt="image" src="{{ asset('images/brand/jitz.jpg') }}">
            </div>
        </div>
        <div class="container pos-vertical-center">
            <div class="row">
                <div class="col-sm-7 col-md-4">
                    <h2 class="type--uppercase">Dashboard Register </h2>

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}


                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">

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

                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-4 control-label">Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="instrcutor" class="col-md-4 control-label">Instructor</label>

                                    <div class="col-md-6">
                                        <div class="dropdown">
                                            <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Instructor
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                              <?php
                                                $users = App\User::where('belt_id','>',24)->get();
                                              ?>
                                              @foreach ($users as $user)
                                              <li role="presentation">
                                                <a role="menuitem" tabindex="-1" href="#">
                                                  {{ $user->name }}
                                                </a>
                                              </li>
                                              @endforeach
                                            </ul>
                                          </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="rank" class="col-md-4 control-label">Rank</label>

                                        <div class="col-md-6">
                                            <div class="dropdown">
                                                <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
                                                    <img src="/images/white.png">
                                                    <span class="caret"></span>
                                                </button>
                                                
                                                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                                    <?php
                                                        $belts = App\Belts::all();
                                                    ?>
                                            
                                                    @foreach ($belts as $belt)
                                                        <li role="presentation">
                                                            <a role="menuitem" tabindex="-1" href="#">
                                                                <img src="/images/{{ $belt->picture }}.png">
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

