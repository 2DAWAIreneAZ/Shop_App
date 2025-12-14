@extends('app.template')

@section('title', 'Products')

@section('content')
<div class="d-flex justify-content-between mb-4">
    <h2>Products</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> New Product
    </a>
</div>



<div class="row">
@forelse($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card p-3">
            <h5>{{ $product->name }}</h5>

            <span class="badge difficulty-badge difficulty-{{ strtolower($product->style->difficulty) }}">
                {{ $product->style->difficulty }}
            </span>
						
						<div class="d-flex justify-content-between">
							<p class="mt-2 mb-3">
									<strong>{{ $product->style->name }}</strong>
							</p>

							<p class="mt-2 mb-3">
									<strong>{{ $product->price }}€</strong>
							</p>
						</div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-primary">
                    View
                </a>

                <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
									@csrf
									@method('DELETE')
									<button class="btn btn-sm btn-danger">
											<i class="fas fa-trash"></i>
									</button>
							</form>
            </div>
        </div>
    </div>
@empty
    <p>No styles found.</p>
@endforelse
</div>

@endsection