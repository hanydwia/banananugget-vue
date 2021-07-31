@extends('layouts.app')

@section('title', 'Banana Nugget 88')

@section('content')
<div class="card">
<div class="card-body">
    <h3> nama : {{ $product['nama'] }}</h3>
    <h3> harga : {{ $product['harga'] }}</h3>
    </div>
</div>
@endsection

  
