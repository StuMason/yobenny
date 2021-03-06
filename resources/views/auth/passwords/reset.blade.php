@extends('layouts.app')

@section('content')
<section class="hero is-fullheight">
<div class="hero-body">
  <div class="container has-text-centered">
    <div class="column is-4 is-offset-4">
      <h3 class="title">Reset Password</h3>
      <div class="box">
        <form method="POST" action="{{ route('password.request') }}">
            {{ csrf_field() }}
            <div class="field">
                <div class="control">
                    <input id="email" placeholder="Your Email" type="email" class="input is-large" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input id="password" type="password" class="input is-large" name="password" placeholder="New Password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input id="password_confirmation" type="password_confirmation" class="input is-large" name="password_confirmation" placeholder="Confirm Password" required>
                </div>
            </div>
            <button type="submit" class="button is-fullwidth is-info is-large">Reset Password</button>
            </form>
      </div>
      <p class="has-text-grey">
        <a href="{{ route('register') }}">Sign Up</a> &nbsp;·&nbsp;
        <a href="{{ route('password.request') }}">Forgot Password</a>
      </p>
    </div>
  </div>
</div>
</section>
@endsection
