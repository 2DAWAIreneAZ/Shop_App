@extends('app.template')

@section('title', 'Home')

@section('content')
<div class="text-center">
    <h1 class="mb-4">
        <i class="fas fa-knot"></i> Macrame Shop
    </h1>

    <p class="lead">
        Manage styles, products and reviews easily.
    </p>

    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card p-4">
                <i class="fas fa-brush fa-2x mb-3 text-primary"></i>
                <h5>Styles</h5>
                <p>Create and manage macrame styles.</p>
                <a href="{{ route('styles.index') }}" class="btn btn-primary">
                    View styles
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-4">
                <i class="fas fa-box fa-2x mb-3 text-primary"></i>
                <h5>Products</h5>
                <p>Assign products to styles.</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary">
                    View products
                </a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-4">
                <i class="fas fa-star fa-2x mb-3 text-primary"></i>
                <h5>Reviews</h5>
                <p>Check customer valorations.</p>
                <a href="{{ route('valorations.index') }}" class="btn btn-primary">
                    View reviews
                </a>
            </div>
        </div>
    </div>
</div>
@endsection