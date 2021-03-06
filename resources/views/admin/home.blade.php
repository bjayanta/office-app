@extends('admin.master')

@section('title', 'Dashboard')

@section('main-content')
    <!-- Main Content -->
    <div class="container">
        <h3>I am Dashboard</h3>
        <strong>{{ Auth::user()->created_at->toFormattedDateString() }}</strong>

        <pre>{{ print_r(Auth::user()->toArray(), 1) }}</pre>
        <pre>{{ print_r(Auth::user()->roles->toArray(), 1) }}</pre>
    </div>
@endsection

