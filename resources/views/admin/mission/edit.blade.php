@extends('admin.master')

@section('title', 'Mission')

<!-- Main Content -->
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <article>
                    <h1>Change mission information</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta nostrum expedita est perspiciatis nihil dolor non provident illo, labore quo qui explicabo eaque voluptatum fuga vero amet sint quaerat autem inventore nulla? Repellendus rem corporis inventore, aut optio.</p>
                </article>

                <form action="{{ route('mission.update', $record->id) }}" method="POST" class="row">
                    @csrf
                    @method('PATCH')

                    <div class="form-group col-md-12">
                        <label for="title">Mission Title <span>*</span></label>
                        <input type="text" name="title" value="{{ $record->title }}" id="title" class="form-control" required>
                    </div>

                    <div class="form-group col-md-12">
                        <label for="note">Mission Note</label>
                        <textarea type="text" name="note" id="note" class="form-control" rows="5">{{ $record->note }}</textarea>
                        <small class="form-text text-muted">Small description about the mission.</small>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="agent">Agent <span>*</span></label>

                        <select name="agent" class="form-control" required>
                            @foreach ($agents as $agent)
                                <option value="{{ $agent->id }}" {{ ($record->user_id == $agent->id) ? 'selected' : '' }}>{{ $agent->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="priority">Priority <span>*</span></label>

                        <select name="priority" class="form-control" required>
                            <option value="low" {{ ($record->priority == 'low') ? 'selected' : '' }}>Low</option>
                            <option value="medium" {{ ($record->priority == 'medium') ? 'selected' : '' }}>Medium</option>
                            <option value="high" {{ ($record->priority == 'high') ? 'selected' : '' }}>High</option>
                            <option value="emergency" {{ ($record->priority == 'emergency') ? 'selected' : '' }}>Emergency</option>
                        </select>
                    </div>

                    <div class="form-group col-md-12 text-right">
                        <input type="reset" value="Cancel" class="btn btn-danger">
                        <input type="submit" value="Save Changes" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
