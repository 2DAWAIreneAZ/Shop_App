@extends('app.template')

@section('title', $style->name)

@section('content')
<h2>{{ $style->name }}</h2>

<p>
    Difficulty:
    <span class="badge difficulty-badge difficulty-{{ strtolower($style->difficulty) }}">
        {{ $style->difficulty }}
    </span>
</p>

<a href="{{ route('styles.edit', $style) }}" class="btn btn-primary">
    <i class="fas fa-edit"></i> Edit
</a>
@endsection