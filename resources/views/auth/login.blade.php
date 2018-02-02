@extends('layouts.app')

@section('content')
<section class="hero is-fullheight">
<div class="hero-body">
  <div class="container has-text-centered">
    <div class="column is-4 is-offset-4">
      <h3 class="title">Login</h3>
      <div class="box">
        <form method="POST" action="{{ route('login') }}">
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
                    <input id="password" type="password" class="input is-large" name="password" placeholder="Your Password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="field">
                <label class="checkbox">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                Remember me
                </label>
            </div>
            <button type="submit" class="button is-fullwidth is-info is-large">Login</button>
            </form>
      </div>
      <p class="has-text-grey">
        <a href="{{ route('register') }}">Sign Up</a> &nbsp;·&nbsp;
        <a href="{{ route('password.request') }}">Forgot Password</a> &nbsp;·&nbsp;
      </p>
    </div>
  </div>
</div>
</section>
@endsection
