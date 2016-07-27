@extends('layouts.app')

@section('content')

<div class="container">
    <h1> Resultados de la búsqueda: </h1>
    @if (count($products) == 0)
        <h3>No se encontraron productos con el término escogido.</h3>
    @else
        @for ($i = 0; $i < count($products); $i++)
            @if ($i % 4 == 0)
            <div class="row">
            @endif
                <div class="col-md-3 portfolio-item">
                    <a href="/producto/{{ $products[$i]->product_id }}"><img src="{{ $products[$i]->image_url }}" class="img-responsive" /></a>
                    <h3><a href="/producto/{{ $products[$i]->product_id }}">{{ $products[$i]->name }}</a></h3>
                    <p>$ {{intval($products[$i]->price) }}</p>
                    <div class="form-group">
                </div>
            </div>
            @if ($i % 4 == (4-1) || $i == count($products) - 1)
            </div>
            @endif
        @endfor
        {{ $products->appends(Request::except('page'))->links() }}
    @endif
</div>

@endsection
