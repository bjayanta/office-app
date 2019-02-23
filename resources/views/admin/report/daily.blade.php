@extends('admin.master')

@section('title', 'Dashboard')

@section('main-content')
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                {{-- attendance --}}
                <h5>Attendance records</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Entry Time</th>
                            <th scope="col">Exit Time</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($attendances as $record)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ \Carbon\Carbon::parse($record->created_at)->format('M d, Y H:i:s') }}</td>
                            <td>{{ \Carbon\Carbon::parse($record->updated_at)->format('M d, Y H:i:s') }}</td>
                            <td>
                                <strong>{{ ($record->late_entry > 10) ? 'LE: ' . $record->late_entry . ' mins' : '' }}</strong> &nbsp;
                                <strong>{{ ($record->early_leave > 10) ? 'EL: ' . $record->early_leave . ' mins' : '' }}</strong>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- mission --}}
                <h5>Mission records</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Owner</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($reports as $record)
                            @if($record->mission_id != null)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $record->mission->title }}</td>
                                    <td>{{ $record->mission->admin->name }}</td>
                                    <td>{{ ucfirst($record->comment) }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

                {{-- comments --}}
                <h5>Comments </h5>
                <ul>
                    @foreach ($reports as $record)
                        @if($record->mission_id == null)
                            <li>{{ ucfirst($record->comment) }}</li>
                        @endif
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
@endsection

