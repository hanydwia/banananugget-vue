@extends('layouts.app')

@section('title','Payments')


@section('content')

<a href="/payments/create" class="card-link btn-primary">Tambah Kategori</a>
@foreach ($payments as $payment)

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <a href="/payments/{{$payment['id']}}" class="card-title">{{ $payment['name'] }}</a>
    <p class="card-text">{{ $payment['description'] }}</p>
    <hr>
    <a href="" class="card-link btn-primary">Tambah list menu</a>
    <hr>
@foreach ($payment ->products as $product)
<li> {{$product->nama}} </li>
@endforeach
<hr>

    <a href="/payments/{{$payment['id']}}/edit" class="btn btn-warning">Edit</a>
    <form action="/payments/{{ $payment['id']}}" method="POST">
    @csrf
    @method('DELETE')
   <button class="btn btn-danger">Delete</button>
   </form>
  </div>
</div>
  
   @endforeach
   <div>
{{ $payments ->links() }}
</div>
@endsection

  
