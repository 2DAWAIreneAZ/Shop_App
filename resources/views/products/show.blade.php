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
        @if($product->valorations->count() > 0)
            <div class="mb-3">
                <strong>Average Rating:</strong>
                <div class="star-rating d-inline">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= round($product->averageRating()))
                            <i class="fas fa-star"></i>
                        @else
                            <i class="far fa-star"></i>
                        @endif
                    @endfor
                    <span class="text-muted">({{ number_format($product->averageRating(), 1) }})</span>
                </div>
            </div>

            @foreach($product->valorations as $valoration)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="star-rating">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $valoration->puntuation)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                            <small class="text-muted">{{ $valoration->date->format('d/m/Y') }}</small>
                        </div>
                        @if($valoration->comment)
                            <p class="mt-2 mb-0">{{ $valoration->comment }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-muted">No valorations yet. Be the first to rate this product!</p>
        @endif
    </div>
</div>
@endsection