@extends('layouts.app')

@section('content')

    {{-- <pre>{{ print_r(Auth::loginUsingId(1), 1) }}</pre> --}}
    {{-- <pre>{{ print_r(session()->all(), 1) }}</pre> --}}
    {{-- {{ now()->timestamp }} --}}
    {{-- {{ print_r(session()->all(), 1) }} --}}

    <router-view></router-view>
@endsection
