@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Base</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('bases.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label for="image_url" class="form-label">Image URL</label>
                <input type="url" class="form-control" id="image_url" name="image_url" value="{{ old('image_url') }}" required>
            </div>
            <div class="mb-3">
                <label for="layout_link" class="form-label">Layout Link</label>
                <input type="url" class="form-control" id="layout_link" name="layout_link" value="{{ old('layout_link') }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="base_type" class="form-label">Base Type</label>
                <input type="text" class="form-control" id="base_type" name="base_type" value="{{ old('base_type') }}" required>
            </div>
            <div class="mb-3">
                <label for="town_hall_id" class="form-label">Town Hall Level</label>
                <select class="form-control" id="town_hall_id" name="town_hall_id" required>
                    @foreach ($townHalls as $townHall)
                        <option value="{{ $townHall->id }}">{{ $townHall->level }}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <button type="submit" class="btn btn-primary">Create Base</button>
        </form>
    </div>
@endsection