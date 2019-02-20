@extends('admin.master')

@section('title', 'Mission')

<!-- Main Content -->
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <article>
                    <h3>{{ $record->title }}</h3>

                    <p>
                        <strong>{{ $record->created_at->diffForHumans() }},</strong>
                        <strong>{{ $record->admin->name }}</strong> assign the task for <strong>{{ $record->user->name }}</strong>
                    </p>

                    <p>{{ $record->note }}</p>

                    <p>You can change the settings from <a href="{{ route('mission.edit', $record->id) }}">here</a>.</p>
                </article>


            </div>
        </div>
    </div>
@endsection
