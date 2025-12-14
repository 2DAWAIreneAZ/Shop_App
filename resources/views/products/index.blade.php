@extends('app.template')

@section('title', 'Products')

@section('content')
<div class="d-flex justify-content-between mb-4">
    <h2>Products</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> New Product
    </a>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Style</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->style->name }}</td>
            <td>
                <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-primary">
                    View
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection