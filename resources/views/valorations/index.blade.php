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
        </tr>
    </thead>
    <tbody>
    @foreach($valorations as $valoration)
        <tr>
            <td>{{ $valoration->product->name }}</td>
            <td class="star-rating">
                @for($i = 0; $i < $valoration->score; $i++)
                    <i class="fas fa-star"></i>
                @endfor
            </td>
            <td>{{ $valoration->comment }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection