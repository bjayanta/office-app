@extends('admin.master')

@section('title', 'Profile')

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

    <form action="{{ route('profile.store') }}" method="POST">
    	@csrf

    	<div>
    		<label for="name">
    			<span>Role name</span>
    			<input type="text" name="name">
    		</label>
    	</div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" cols="50" rows="5"></textarea>
        </div>

    	<div>
    		<input type="submit" name="Save">
    		<a href="{{ route('profile.index') }}">Back</a>
    	</div>
    </form>
</div>
@endsection

