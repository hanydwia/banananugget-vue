@extends('layouts.app')

@section('title','Orders')

@section('content')


<form action="/payments/{{ $payment['id'] }}" method="POST">
@csrf
@method('PUT')

  <div class="form-payment">
    <label for="exampleInputEmail1">Name</label>
  <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" value="{{ old('name') ? old('name') : $payment['name'] }}">
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <div class="form-payment">
    <label for="exampleInputPassword1">Description</label>
    <input type="text" class="form-control"name="description" id="exampleInputPassword1"value="{{ old('description') ? old('description') : $payment['description'] }}">
    @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  
 

@endsection

  
