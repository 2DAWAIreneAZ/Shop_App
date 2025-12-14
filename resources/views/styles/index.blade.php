@extends('app.template')

@section('title', 'Styles')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Styles</h2>
    <a href="{{ route('styles.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> New Style
    </a>
</div>

<div class="row">
@forelse($styles as $style)
    <div class="col-md-4 mb-4">
        <div class="card p-3">
            <h5>{{ $style->name }}</h5>

            <span class="badge difficulty-badge difficulty-{{ strtolower($style->difficulty) }}">
                {{ $style->difficulty }}
            </span>

            <p class="mt-2 mb-3">
                Products: <strong>{{ $style->products_count }}</strong>
            </p>

            <div class="d-flex justify-content-between">
                <a href="{{ route('styles.show', $style) }}" class="btn btn-sm btn-primary">
                    View
                </a>

                <form action="{{ route('styles.destroy', $style) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this style?');">
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