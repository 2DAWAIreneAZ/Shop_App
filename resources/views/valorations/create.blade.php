@extends('app.template')

@section('title', 'Create Valoration')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0"><i class="fas fa-plus"></i> Create New Valoration</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('valorations.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="id_product" class="form-label">Product *</label>
                        <select class="form-select @error('id_product') is-invalid @enderror" 
                                id="id_product" name="id_product" required>
                            <option value="">Select a product</option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ old('id_product') == $product->id ? 'selected' : '' }}>
                                    {{ $product->name }} - ${{ number_format($product->price, 2) }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_product')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="puntuation" class="form-label">Rating *</label>
                        <div class="rating-input">
                            <div class="btn-group" role="group">
                                @for($i = 1; $i <= 5; $i++)
                                    <input type="radio" class="btn-check" name="puntuation" 
                                           id="rating{{ $i }}" value="{{ $i }}" 
                                           {{ old('puntuation') == $i ? 'checked' : '' }} required>
                                    <label class="btn btn-outline-warning" for="rating{{ $i }}">
                                        <i class="fas fa-star"></i> {{ $i }}
                                    </label>
                                @endfor
                            </div>
                        </div>
                        @error('puntuation')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Date *</label>
                        <input type="date" class="form-control @error('date') is-invalid @enderror" 
                               id="date" name="date" value="{{ old('date', date('Y-m-d')) }}" required>
                        @error('date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <textarea class="form-control @error('comment') is-invalid @enderror" 
                                  id="comment" name="comment" rows="4" 
                                  placeholder="Share your experience with this product (optional)">{{ old('comment') }}</textarea>
                        @error('comment')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('valorations.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Create Valoration
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection