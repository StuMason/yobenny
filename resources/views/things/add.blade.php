@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <form action="{{ route('things.add.process') }}" method="POST">
        {{ csrf_field() }}
        'owner_id',
        'title',
        'approved_by',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'image_url',
        'location_url',
        'description',

        @if (count($errors) > 0)
        <div class="help is danger">
            <strong>Whoops!</strong> Check the errors below and submit again!<br />
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="field">
            <label class="label">Event Title</label>
            <div class="control">
                <input  class="input" 
                        type="text" 
                        name="title" 
                        placeholder="Event Title - short and sweet!">
            </div>
            @if ($errors->has('title'))
                <p class="help is-danger">{{ $errors->first('title') }}</p>
            @endif
        </div>


            <div class="field">
            <label class="label">Username</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input is-success" type="text" placeholder="Text input">
                <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                </span>
                <span class="icon is-small is-right">
                    <i class="fas fa-check"></i>
                </span>
            </div>
                <p class="help is-success">This username is available</p>
            </div>

            <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input is-danger" type="email" placeholder="Email input" value="hello@">
                <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
                </span>
                <span class="icon is-small is-right">
                <i class="fas fa-exclamation-triangle"></i>
                </span>
            </div>
            <p class="help is-danger">This email is invalid</p>
            </div>

            <div class="field">
            <label class="label">Subject</label>
            <div class="control">
                <div class="select">
                <select>
                    <option>Select dropdown</option>
                    <option>With options</option>
                </select>
                </div>
            </div>
            </div>

            <div class="field">
            <label class="label">Message</label>
            <div class="control">
                <textarea class="textarea" placeholder="Textarea"></textarea>
            </div>
            </div>

            <div class="field">
            <div class="control">
                <label class="checkbox">
                <input type="checkbox">
                I agree to the <a href="#">terms and conditions</a>
                </label>
            </div>
            </div>

            <div class="field">
            <div class="control">
                <label class="radio">
                <input type="radio" name="question">
                Yes
                </label>
                <label class="radio">
                <input type="radio" name="question">
                No
                </label>
            </div>
            </div>

            <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Submit</button>
            </div>
            <div class="control">
                <button class="button is-text">Cancel</button>
            </div>
            </div>
        </form>
    </div>
</section>
@endsection