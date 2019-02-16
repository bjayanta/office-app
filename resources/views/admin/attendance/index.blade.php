@extends('admin.master')

@section('title', 'Attendance')

@section('main-content')
    <!-- Main Content -->
    <div class="container">
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.attendance') }}" method="GET">
            <div>
                <label for="agent">
                    <span>Agent </span>
                    <select name="search">
                        <option value="" selected disabled>&nbsp;</option>
                        @foreach ($agents as $agent)
                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                        @endforeach
                    </select>
                </label>
            </div>

            <div>
                <input type="submit" value="Search">
            </div>
        </form>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Agent</th>
                    <th>Date</th>
                    <th>Entry</th>
                    <th>LE</th>
                    <th>Exit</th>
                    <th>EL</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($records as $record)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $record->id }}</td>
                        <td>{{ $record->user_id }}</td>
                        <td>{{ $record->created_at }}</td>
                        <td>{{ $record->created_at }}</td>
                        <td>{{ $record->late_entry }}</td>
                        <td>{{ $record->updated_at }}</td>
                        <td>{{ $record->early_leave }}</td>
                        <td>{{ $record->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $records->links() }}
    </div>
@endsection

