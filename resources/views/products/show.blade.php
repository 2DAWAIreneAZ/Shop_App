@extends('app.template')

@section('title', $product->name)

@section('content')
<div class="row">
    <div class="col-md-5">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded" 
                 alt="{{ $product->name }}">
        @else
            <div class="bg-secondary rounded d-flex align-items-center justify-content-center" 
                 style="height: 400px;">
                <i class="fas fa-image fa-5x text-white"></i>
            </div>
        @endif
    </div>
    <div class="col-md-7">
        <h1>{{ $product->name }}</h1>
        <p class="text-muted">
            <i class="fas fa-palette"></i> Style: 
            <a href="{{ route('styles.show', $product->style) }}">{{ $product->style->name }}</a>
        </p>
        <h2 class="text-primary">${{ number_format($product->price, 2) }}</h2>
        <p class="lead">{{ $product->description }}</p>

        <div class="d-flex gap-2 mb-4">
            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit Product
            </a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Products
            </a>
        </div>

        <hr>

        <h3><i class="fas fa-star"></i> Valorations</h3>
				@if($product->valorations->isEmpty())
						<p>No hay valoraciones para este producto.</p>
				@else
						<ul class="list-group">
								@foreach($product->valorations as $valoration)
										<li class="list-group-item d-flex justify-content-between align-items-center">
												<div>
														{{ $valoration->comment }}
												</div>
												<span class="badge bg-warning text-dark">
														@for($i = 0; $i < $valoration->puntuation; $i++)
																<i class="fas fa-star"></i>
														@endfor
												</span>
										</li>
								@endforeach
						</ul>
				@endif
    </div>
</div>
@endsection