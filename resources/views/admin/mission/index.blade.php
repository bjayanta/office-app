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

                <form action="" method="POST" class="row">
                    <div class="form-group col-md-8">
                        <select name="agent" class="form-control">
                            <option value="" selected disabled>&nbsp;</option>

                            @foreach ($agents as $agent)
                                <option value="$agent->id">{{ $agent->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <select name="month" class="form-control">
                            <option value="" selected disabled>&nbsp;</option>

                            @foreach ($agents as $agent)
                                <option value="$agent->id">{{ $agent->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-12 text-right">
                        <input type="submit" value="Search" class="btn btn-primary">
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
                        <td>1</td>
                        <td>Fiesta</td>
                        <td>Suman Rajvhor</td>
                        <td>High</td>
                        <td>Process</td>
                        <td class="text-right">
                            <a class="btn btn-info" href="{{ route('mission.edit', 1) }}">Edit</a>
                            <a class="btn btn-success" href="{{ route('mission.show', 1) }}">Details</a>
                            <a class="btn btn-danger" href="{{ route('mission.destroy', 1) }}">Delete</a>
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
