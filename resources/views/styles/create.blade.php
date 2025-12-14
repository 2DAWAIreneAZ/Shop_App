@extends('app.template')

@section('title', 'Create Style')

@section('content')
<h2>Create Style</h2>

<form method="POST" action="{{ route('styles.store') }}" class="card p-4">
    @csrf

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Difficulty</label>
        <select name="difficulty" class="form-select">
            <option value="">Select difficulty</option>
            <option>Easy</option>
            <option>Medium</option>
            <option>Hard</option>
        </select>
    </div>

    <button class="btn btn-primary">
        <i class="fas fa-save"></i> Save
    </button>
</form>
@endsection