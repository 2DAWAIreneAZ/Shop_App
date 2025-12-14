@extends('app.template')

@section('title', 'Reviews')

@section('content')
<h2>Reviews</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Product</th>
            <th>Score</th>
            <th>Comment</th>
						<th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($valorations as $valoration)
        <tr>
            <td>{{ $valoration->product->name }}</td>
            <td class="star-rating">
                @for($i = 0; $i < $valoration->puntuation; $i++)
                    <i class="fas fa-star"></i>
                @endfor
            </td>
            <td>{{ $valoration->comment }}</td>
						<td>
							<form action="{{ route('valorations.destroy', $valoration) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this valoration?');">
									@csrf
									@method('DELETE')
									<button class="btn btn-sm btn-danger">
											<i class="fas fa-trash"></i>
									</button>
							</form>
						</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection