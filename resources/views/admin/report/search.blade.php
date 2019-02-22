@extends('admin.master')

@section('title', 'Dashboard')

@section('main-content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <article>
                    <h1>Daily Report</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta nostrum expedita est perspiciatis nihil dolor non provident illo, labore quo qui explicabo eaque voluptatum fuga vero amet sint quaerat autem inventore nulla? Repellendus rem corporis inventore, aut optio, pariatur numquam quis molestias aliquam, ipsa nam deleniti odit expedita voluptatibus placeat.</p>
                </article>

                <form action="{{ route('admin.report') }}" method="GET" class="row">
                    <div class="form-group col-md-12">
                        <select name="agent" class="form-control" required>
                            <option value="" selected disabled>Select an agent</option>

                            @foreach ($agents as $agent)
                                <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="from">Date (From)</label>
                        <input type="text" name="from" class="form-control" value="{{ date('Y-m-d') }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="from">Date (To)</label>
                        <input type="text" name="to" class="form-control">
                    </div>

                    <div class="form-group col-md-12 text-right">
                        <input type="submit" value="Search" class="btn btn-primary">
                    </div>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Report at </th>
                            <th>Create at </th>
                            <th>Agent </th>
                            <th class="text-right">Active</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($reports as $report)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ \Carbon\Carbon::parse($report->report_at)->format('M d, Y') }}</td>
                                <td>{{ $report->created_at->diffForHumans() }}</td>
                                <td>{{ $report->user->name }}</td>
                                <td class="text-right">
                                    <a class="btn btn-success" href="{{ route('admin.report.show', $report->id) }}">Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $reports->links() }}
            </div>
        </div>
    </div>
@endsection

