@extends('app.template')

@section('title', 'Edit Style')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-warning text-white">
                <h3 class="mb-0"><i class="fas fa-edit"></i> Edit Style</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('styles.update', $style) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="name" class="form-label">Name *</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" value="{{ old('name', $style->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="difficulty" class="form-label">Difficulty *</label>
                        <select class="form-select @error('difficulty') is-invalid @enderror" 
                                id="difficulty" name="difficulty" required>
                            <option value="">Select difficulty</option>
                            <option value="Easy" {{ old('difficulty', $style->difficulty) == 'Easy' ? 'selected' : '' }}>Easy</option>
                            <option value="Medium" {{ old('difficulty', $style->difficulty) == 'Medium' ? 'selected' : '' }}>Medium</option>
                            <option value="Hard" {{ old('difficulty', $style->difficulty) == 'Hard' ? 'selected' : '' }}>Hard</option>
                        </select>
                        @error('difficulty')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('styles.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-warning text-white">
                            <i class="fas fa-save"></i> Update Style
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection