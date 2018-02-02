@extends('layouts.app')

@section('content')
<section class="hero is-fullheight">
<div class="hero-body">
  <div class="container has-text-centered">
    <div class="column is-4 is-offset-4">
      <h3 class="title">Reset Password</h3>
      <div class="box">
        @if (session('status'))
            <div class="tab">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
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
            <button type="submit" class="button is-fullwidth is-info is-large">Send Password Link</button>
            </form>
      </div>
      <p class="has-text-grey">
        <a href="{{ route('register') }}">Sign Up</a>
      </p>
    </div>
  </div>
</div>
</section>
@endsection
