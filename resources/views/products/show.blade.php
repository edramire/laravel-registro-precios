@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12">
        <div class="media">
            <div class="media-left">
                <div class="product-data">
                    <img src="{{ $product->image_url }}" alt="{{ $product->name }}"/>
                </div>
            </div>
            <div class="media-body">
                <h3>{{ $product->name }}</h3>
                <h5>{{ $company->name }} | {{ $category->name }}</h5>
                <p>{{ $product->description }}</p>
            </div>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        <h3>Histórico de precios</h3>
        <table class="table">
            <tr>
                <th>Fecha</th>
                <th>Precio</th>
            </tr>
            @foreach ($productPrices as $price)
            <tr>
                <td>{{ $price->created_at }}</td>
                <td>{{ $price->price }}</td>
            </tr>
            @endforeach
        </table>
        </div>
    </div>

</div>

@endsection
