@extends('layouts.app')

@section('title','Orders')

@section('content')

<a href="/orders/create" class="card-link btn-primary">Tambah</a>
@foreach ($orders as $order)

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <a href="/orders/{{$order['id']}}" class="card-title">{{ $order['nama'] }}</a>
    <h6 class="card-subtitle mb-2 text-muted">{{ $order['no_tlp'] }}</h6>
    <p class="card-text">{{ $order['alamat'] }}</p>
    
    <a href="/orders/{{$order['id']}}/edit" class="card-link btn-warning">Edit</a>
    <form action="/orders/{{ $order['id']}}" method="POST">
    @csrf
    @method('DELETE')
    <button class="card-link btn-danger">Delete</button>
    </form>
  </div>
</div>

@endforeach
<div>
{{ $orders->links() }}
</div>
@endsection

    
