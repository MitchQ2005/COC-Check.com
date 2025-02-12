@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bases</h1>
        @auth
            <a href="{{ route('bases.create') }}" class="btn btn-primary mb-3">Create Base</a>
        @endauth
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif
        <ul class="list-group">
            @foreach ($bases as $base)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('bases.show', $base->id) }}">{{ $base->name }}</a>
                    @auth
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('bases.edit', $base->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                            <form action="{{ route('bases.destroy', $base->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    @endauth
                </li>
            @endforeach
        </ul>
        @guest
            <div class="mt-4">
                <a href="{{ route('login') }}" class="btn btn-primary">Log in</a>
            </div>
        @endguest
    </div>
@endsection