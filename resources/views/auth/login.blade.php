@extends('layouts.app')

@section('content')
<section class="hero is-fullheight">
    @if ($errors->has('msg'))
    <section class="section">
        <div class="container">
            <article class="message is-primary">
                <div class="message-header">
                    <p>Important!</p>
                    <button class="delete" aria-label="delete"></button>
                </div>
                <div class="message-body">
                {{ $errors->first('msg') }}
                </div>
            </article>
        </div>
    </section>
    @endif
<div class="hero-body">
  <div class="container has-text-centered">
    <div class="column is-4 is-offset-4">
      <h3 class="title">Login</h3>
      <div class="box">
        <div class="field">
            <div class="control">
                <a href="{{ route('social.oauth', 'google') }}" class="button is-fullwidth ">
                    <i class="fab fa-google"></i>&nbsp;Login with Google
                </a>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <a href="{{ route('social.oauth', 'twitter') }}" class="button is-fullwidth">
                    <i class="fab fa-twitter"></i>&nbsp;Login with Twitter
                </a>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <a href="{{ route('social.oauth', 'facebook') }}" class="button is-fullwidth">
                    <i class="fab fa-facebook"></i>&nbsp;Login with Facebook
                </a>
            </div>
        </div>

        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="field">
                <div class="control">
                    <input id="email" placeholder="Your Email" type="email" class="input" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <input id="password" type="password" class="input" name="password" placeholder="Your Password" required>
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
            <button type="submit" class="button is-fullwidth is-info">Login</button>
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
