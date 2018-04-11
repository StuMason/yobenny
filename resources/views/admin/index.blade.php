@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Starts</th>
                    <th>Ends</th>
                    <th>Posted By</th>
                    <th></th>
                    <th>Approved</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{$event->title}}</td>
                        <td>
                            {{ Carbon\Carbon::parse($event->start_date)->format('D jS \\of M') }}
                            ({{ Carbon\Carbon::parse($event->start_time)->format('H:i') }})
                        </td>
                        <td>
                            {{ Carbon\Carbon::parse($event->end_date)->format('D jS \\of M') }}
                            ({{ Carbon\Carbon::parse($event->end_time)->format('H:i') }})
                        </td>
                        <td>
                            {{ $event->user->name }}
                            ({{ Carbon\Carbon::parse($event->created_at)->diffForHumans() }})
                        </td>
                        <td>
                            <a href='{{ url("events/{$event->uuid}") }}' class="button is-small is-info">View</a>
                        </td>
                        <td>
                            @if($event->approved_by)
                                <a href='{{ url("admin/approve/{$event->uuid}") }}' class="button is-small is-danger">
                                    <i class="fas fa-times"></i>
                                </a>
                            @else
                                <a href='{{ url("admin/approve/{$event->uuid}") }}' class="button is-small is-success">
                                    <i class="fas fa-check"></i>
                                </a>
                            @endif
                        </a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection