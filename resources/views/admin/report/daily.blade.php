@extends('admin.master')

@section('title', 'Dashboard')

@section('main-content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <pre>{{ print_r($attendances->toArray(), 1) }}</pre>
                <pre>{{ print_r($missions->toArray(), 1) }}</pre>
                <pre>{{ print_r($report->toArray(), 1) }}</pre>

            </div>
        </div>
    </div>
@endsection

