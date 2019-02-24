@extends('layouts.app')

@section('content')
    <div class="container">
        <pre>{{ print_r($meta->toArray(), 1) }}</pre>
    </div>

    <!-- all the view -->
    <router-view></router-view>
@endsection
