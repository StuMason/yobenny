@extends('layouts.app')

@section('content')
<section class="section" id="add-thing">
    <div class="container">
        @if($errors->any())
        <article class="message is-danger">
            <div class="message-header">
                <p>Oops!</p>
                <button class="delete" aria-label="delete"></button>
            </div>
            <div class="message-body">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </article>
        @endif
        <form action="{{ route('things.add.process') }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <div class="field">
                <label class="label" for="title">Event Title</label>
                <div class="control">
                    <input  class="input {{ $errors->has('title') ? 'is-danger' : '' }}" 
                            type="text" 
                            name="title" 
                            value="{{ old('title') }}"
                            dusk="thingTitle"
                            placeholder="Event Title - short and sweet!">
                </div>
                @if ($errors->has('title'))
                    <p class="help is-danger">{{ $errors->first('title') }}</p>
                @endif
            </div>
            <div class="field is-grouped is-grouped-multiline">
                <div class="control">
                    <label class="label" for="start_date">Start Date</label>
                    <date-picker name="start_date"
                                class="input {{ $errors->has('start_date') ? 'is-danger' : '' }}" 
                                type="text" 
                                dusk="thingStartDate"
                                value="{{ old('start_date') }}"
                    ></date-picker>
                    @if ($errors->has('start_date'))
                        <p class="help is-danger">{{ $errors->first('start_date') }}</p>
                    @endif
                </div>
                <div class="control">
                    <label class="label" for="end_date">End Date</label>
                    <date-picker name="end_date"
                                class="input {{ $errors->has('end_date') ? 'is-danger' : '' }}" 
                                type="text" 
                                dusk="thingEndDate"
                                value="{{ old('end_date') }}"
                    ></date-picker>
                    @if ($errors->has('end_date'))
                        <p class="help is-danger">{{ $errors->first('end_date') }}</p>
                    @endif
                </div>
            </div>
            <div class="field is-grouped is-grouped-multiline">
                <div class="control">
                    <label class="label" for="start_time">Doors Open</label>
                    <time-picker class="input {{ $errors->has('start_time') ? 'is-danger' : '' }}" 
                                 type="text" 
                                 name="start_time" 
                                 dusk="thingStartTime"
                                 value="{{ old('start_time') }}"
                                 placeholder="hh:mm"
                    ></time-picker>
                    @if ($errors->has('start_time'))
                        <p class="help is-danger">{{ $errors->first('start_time') }}</p>
                    @endif
                </div>
                <div class="control">
                    <label class="label" for="end_time">Doors Close</label>
                    <time-picker class="input {{ $errors->has('end_time') ? 'is-danger' : '' }}" 
                                 type="text" 
                                 name="end_time" 
                                 dusk="thingEndTime"
                                 value="{{ old('end_time') }}"
                                 placeholder="hh:mm">
                    </time-picker>
                    @if ($errors->has('end_time'))
                        <p class="help is-danger">{{ $errors->first('end_time') }}</p>
                    @endif
                </div>
            </div>

            <div class="field">
                <label class="label">Event Main Image</label>
                <input class="input {{ $errors->has('image_url') ? 'is-danger' : '' }}" 
                        type="file" 
                        name="image_url" 
                        dusk="thingImageUrl">
                @if ($errors->has('image_url'))
                    <p class="help is-danger">{{ $errors->first('image_url') }}</p>
                @endif
            </div>
        
            <google-auto-complete class="is-loading {{ $errors->has('postal_code') ? 'is-danger' : '' }}">
            </google-auto-complete>

            <div class="field">
                <label class="label">Description</label>
                <div class="control">
                    <textarea class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}"
                              name="description" 
                              placeholder="The description of the event."
                              dusk="thingDescription">{{ old('description') }}</textarea>
                </div>
                @if ($errors->has('description'))
                    <p class="help is-danger">{{ $errors->first('description') }}</p>
                @endif
            </div>
            <div class="field">
                <div class="control">
                    <label class="label" for="tags">Event Categories (use enter to add multiple)</label>
                    <tags-input element-id="tags"
                        :existing-tags="{ 
                            'web-development': 'Web Development',
                            'php': 'PHP',
                            'javascript': 'JavaScript',
                        }"
                        :old-tags="{{ 
                            old('tags') ? json_encode(old('tags')) :
                            (
                                isset($postTags)
                                ? json_encode($postTags)
                                : json_encode('')
                            ) 
                        }}"
                        :typeahead="true"
                        tags=""
                        input-class="{{ $errors->has('tags') ? 'is-danger' : '' }}"
                        placeholder="Add multiple tags related to your event here.">
                    </tags-input>
                    @if ($errors->has('tags'))
                        <p class="help is-danger">You need to enter at least one category!</p>
                    @endif
                </div>
            </div>
            @role('admin')
                <div class="field">
                    <div class="control">
                        <label class="checkbox">
                        <input type="checkbox" 
                               name="approved_by"
                               dusk="thingApprovedBy">
                            Auto Approve this event.
                        </label>
                    </div>
                </div>
            @endrole

            <div class="field">
                Are you the owner of this event?
                <div class="control">
                    <label class="radio">
                    <input type="radio"
                           name="owner" 
                           selected="selected"
                           dusk="thingOwnerTrue">
                        Yes
                    </label>
                    <label class="radio">
                    <input type="radio" 
                           name="owner"
                           dusk="thingOwnerFalse">
                        No
                    </label>
                </div>
            </div>

            <div class="field is-grouped">
            <p class="control">
                <button class="button is-primary" type="submit" dusk="thingSubmit">
                Add Event
                </button>
            </p>
            <p class="control">
                <a class="button is-light" href=" {{ route('landing') }}">
                Cancel
                </a>
            </p>
            </div>
        </form>
    </div>
</section>
@endsection