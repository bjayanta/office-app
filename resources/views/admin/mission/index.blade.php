@extends('admin.master')

@section('title', 'Mission')

<!-- Main Content -->
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <article>
                    <h1>Mission Section</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta nostrum expedita est perspiciatis nihil dolor non provident illo, labore quo qui explicabo eaque voluptatum fuga vero amet sint quaerat autem inventore nulla? Repellendus rem corporis inventore, aut optio, pariatur numquam quis molestias aliquam, ipsa nam deleniti odit expedita voluptatibus placeat. <a href="{{ route('mission.create') }}">Create a new mission</a></p>
                </article>

                <form action="{{ route('mission.index') }}" method="GET" class="row">
                    <div class="form-group col-md-8">
                        <select name="agent" class="form-control" required>
                            <option value="" selected disabled>Select an agent</option>

                            @foreach ($agents as $agent)
                                <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <select name="status" class="form-control" required>
                            <option value="" disabled>Select mission status</option>
                            <option value="pending" selected>Pending</option>
                            <option value="process">Process</option>
                            <option value="done">Done</option>
                            <option value="cancel">Cancel</option>
                        </select>
                    </div>

                    <div class="form-group col-md-12 text-right">
                        <input type="submit" value="Get Mission" class="btn btn-primary">
                    </div>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Owner</th>
                            <th>Priority </th>
                            <th>Status</th>
                            <th class="text-right">Active</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($missions as $mission)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $mission->title }}</td>
                                <td>{{ $mission->admin_id }}</td>
                                <td>{{ $mission->priority }}</td>
                                <td>{{ $mission->status }}</td>
                                <td class="text-right">
                                    <a class="btn btn-info" href="{{ route('mission.edit', $mission->id) }}">Edit</a>

                                    <a class="btn btn-success" href="{{ route('mission.show', $mission->id) }}">Details</a>

                                    <a class="btn btn-danger" href="{{ route('mission.edit', $mission->id) }}" onClick="if(confirm('Are you sure, You want to delete this record?')){event.preventDefault();document.getElementById('delete-mission-{{ $mission->id }}').submit();} else {event.preventDefault();}">Delete</a>

                                    <form action="{{ route('mission.destroy', $mission->id) }}" method="post" id="delete-mission-{{ $mission->id }}" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $missions->links() }}
            </div>
        </div>
    </div>
@endsection
