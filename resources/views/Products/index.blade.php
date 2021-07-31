@extends('layouts.app')

@section('title','Products')


@section('content')
<a href="/products/create" class="card-link btn-primary">Tambah Menu</a>
<div class="container">
<div class="row justify-content-center">
@foreach ($products as $product)
<div class="col-md-4">
<div class="card" style="width: 18rem;">
<img src="{{ url('image') }}/{{ $product['gambar'] }}" class="card-img-top" alt="...">
  <div class="card-body">
    <a href="/products/{{$product['id']}}" class="card-title">{{ $product ['nama'] }}</a>
    <h6 class="card-subtitle mb-2 text-muted"> Rp. {{ number_format($product['harga'],0,',','.') }}</h6>
    <p class="card-text">Banana Nugget 88</p>
    <div class="row justify-content-center">
    <a href="/products/{{$product['id']}}/edit" class="btn btn-warning">Edit</a>
    <form action="/products/{{ $product['id']}}" method="POST">
    @csrf
    @method('DELETE')
   <button class="btn btn-danger">Delete</button>
   </form>
  </div>
</div>
</div>
</div>
  
   @endforeach
   <div class="container push-spaces">
   </div>
   <div class="d-flex justify-content-center">
{{ $products ->links() }}
</div>
@endsection

  
