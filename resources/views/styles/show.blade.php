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

@if($style->products->isEmpty())
    <p>No hay productos asociados a este estilo.</p>
@else
    <ul class="list-group">
        @foreach($style->products as $product)
            <li class="list-group-item d-flex justify-content-between align-items-center mt-2">
                {{ $product->name }} - ${{ number_format($product->price, 2) }}

                <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-primary">
                    Ver
                </a>
            </li>
        @endforeach
    </ul>
@endif

@endsection