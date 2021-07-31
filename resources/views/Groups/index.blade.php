@extends('layouts.app')

@section('title','Groups')


@section('content')

<a href="/groups/create" class="card-link btn-primary">Tambah Kategori</a>
@foreach ($groups as $group)

<div class="card" style="width: 18rem;">
  <div class="card-body">
    <a href="/groups/{{$group['id']}}" class="card-title">{{ $group['name'] }}</a>
    <p class="card-text">{{ $group['description'] }}</p>
    <hr>
    <a href="" class="card-link btn-primary">Tambah list menu</a>
    <hr>
@foreach ($group ->products as $product)
<li> {{$product->nama}} </li>
@endforeach
<hr>

    <a href="/groups/{{$group['id']}}/edit" class="btn btn-warning">Edit</a>
    <form action="/groups/{{ $group['id']}}" method="POST">
    @csrf
    @method('DELETE')
   <button class="btn btn-danger">Delete</button>
   </form>
  </div>
</div>
  
   @endforeach
   <div>
{{ $groups ->links() }}
</div>
@endsection

  
