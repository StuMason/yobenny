@extends('layouts.app')

@section('content')
<section class="hero is-fullheight">
<div class="hero-body">
  <div class="container has-text-centered">
    <div class="column is-4 is-offset-4">
      <h3 class="title">Register</h3>
      <div class="box">
        <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="field">
                <div class="control">
                    <input id="name" placeholder="Name" type="text" class="input is-large" name="name" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input id="email" placeholder="Email" type="email" class="input is-large" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input id="password" placeholder="Password" type="password" class="input is-large" name="password" value="{{ old('name') }}" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input id="password-confirm" placeholder="Confirm Password" type="password" class="input is-large" name="password_confirmation" required>
                </div>
            </div>

            <button type="submit" class="button is-fullwidth is-info is-large">Register</button>
            </form>
      </div>
      <p class="has-text-grey">
        <a href="{{ route('login') }}">Login</a>
      </p>
    </div>
  </div>
</div>
</section>
@endsection
