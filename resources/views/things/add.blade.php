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
        <form action="{{ route('things.add.process') }}" method="POST">
            {{ csrf_field() }}
            <div class="field">
                <label class="label">Event Title</label>
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

            <div class="field">
                <label class="label">Start Date</label>
                <div class="control">
                <date-picker name="start_date"
                             class="input {{ $errors->has('start_date') ? 'is-danger' : '' }}" 
                             type="text" 
                             dusk="thingStartDate"
                             value="{{ old('start_date') }}"
                ></date-picker>
                </div>
                @if ($errors->has('start_date'))
                    <p class="help is-danger">{{ $errors->first('start_date') }}</p>
                @endif
            </div>

            <div class="field">
                <label class="label">End Date</label>
                <div class="control">
                <date-picker name="end_date"
                             class="input {{ $errors->has('end_date') ? 'is-danger' : '' }}" 
                             type="text" 
                             dusk="thingEndDate"
                             value="{{ old('end_date') }}"
                ></date-picker>
                </div>
                @if ($errors->has('end_date'))
                    <p class="help is-danger">{{ $errors->first('end_date') }}</p>
                @endif
            </div>

            <div class="field">
                <label class="label">Doors Open</label>
                <div class="control">
                    <time-picker class="input {{ $errors->has('start_time') ? 'is-danger' : '' }}" 
                                 type="text" 
                                 name="start_time" 
                                 dusk="thingStartTime"
                                 value="{{ old('start_time') }}"
                                 placeholder="hh:mm"
                    ></time-picker>
                </div>
                @if ($errors->has('start_time'))
                    <p class="help is-danger">{{ $errors->first('start_time') }}</p>
                @endif
            </div>

            <div class="field">
                <label class="label">Doors Close</label>
                <div class="control">
                    <time-picker class="input {{ $errors->has('end_time') ? 'is-danger' : '' }}" 
                                 type="text" 
                                 name="end_time" 
                                 dusk="thingEndTime"
                                 value="{{ old('end_time') }}"
                                 placeholder="hh:mm">
                    </time-picker>
                </div>
                @if ($errors->has('end_time'))
                    <p class="help is-danger">{{ $errors->first('end_time') }}</p>
                @endif
            </div>

            <div class="field">
                <label class="label">Event Image URL</label>
                <div class="control">
                    <input  class="input {{ $errors->has('image_url') ? 'is-danger' : '' }}" 
                            type="text" 
                            name="image_url" 
                            dusk="thingImage"
                            value="{{ old('image_url') }}"
                            placeholder="A link to the event image">
                </div>
                @if ($errors->has('image_url'))
                    <p class="help is-danger">{{ $errors->first('image_url') }}</p>
                @endif
            </div>

            <div class="field">
                <label class="label">Address</label>
                <div class="control">
                    <google-auto-complete class="is-loading {{ $errors->has('image_url') ? 'is-danger' : '' }}">
                    </google-auto-complete>
                </div>
                @if ($errors->has('location_url'))
                    <p class="help is-danger">{{ $errors->first('location_url') }}</p>
                @endif
            </div>

            <div class="field">
                <label class="label">Description</label>
                <div class="control">
                    <textarea class="textarea" 
                              name="description" 
                              placeholder="The description of the event."
                              dusk="thingDescription">{{ old('description') }}</textarea>
                </div>
                @if ($errors->has('description'))
                    <p class="help is-danger">{{ $errors->first('description') }}</p>
                @endif
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
                <div class="control">
                    <button class="button is-link" 
                            type="submit" 
                            dusk="thingSubmit">Add Event</button>
                </div>
                <div class="control">
                    <a class="button is-text" href=" {{ route('landing') }}">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection