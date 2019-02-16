@extends('layouts.app')

@section('content')
    <div class="container">
        @php
        $to = \Carbon\Carbon::parse(date('Y-m-d') . ' 1:30:00');
        $from = \Carbon\Carbon::parse('2019-02-16 1:40:00');

        echo $to->diffInMinutes($from);
        @endphp
    </div>

    <!-- all the view -->
    <router-view></router-view>
@endsection
