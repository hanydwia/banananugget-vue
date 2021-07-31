@extends('layouts.app')

@section('title','Products')


@section('content')
<form action="/products" method="POST">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">nama</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" value="{{ old('nama') }}">
    @error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">harga</label>
    <input type="text" class="form-control"name="harga" id="exampleInputPassword1"value="{{ old('harga') }}">
    @error('harga')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  
 

@endsection

  
