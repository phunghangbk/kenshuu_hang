@extends('layouts.app')

@section('content')
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="/css/app.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            @if(Session::has('error'))
                <div class="alert-box success">
                    <h2>{{ Session::get('error') }}</h2>
                </div>
            @endif
            {!! Form::open(array('url' => 'login', 'class' => 'form-signin')) !!}
                {!! csrf_field() !!}
                <span id="reauth-email" class="reauth-email"></span>
                {!! Form::text('email','',array('id'=>'inputEmail', 'class'=>'form-control', 'placeholder' => trans('messages.enter_email'))) !!}
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                {!! Form::password('password', array('id'=>'inputPassword', 'class'=>'form-control', 'placeholder' => trans('messages.enter_password'))) !!}
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> {{ trans('messages.remember_me') }}
                    </label>
                </div>
                <p>{!! Form::submit(trans('messages.login'), array('class'=>'btn btn-lg btn-primary btn-block btn-signin')) !!}</p>
            {!! Form::close() !!}
            <a href="{{ url('password/reset') }}" class="forgot-password">
                {{ trans('messages.forgot_password') }}
            </a>
        </div>
    </div>
</body>
</html>
@endsection
