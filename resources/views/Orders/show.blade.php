@extends('layouts.app')

@section('title','Orders')

@section('content')
<div class="card">
<div class="cardbody">
<h3>Nama :{{ $order['nama'] }} </h3>
<h3>No tlp :{{ $order['no_tlp'] }} </h3>
<h3>Alamat :{{ $order['alamat'] }} </h3>
<h3>Pesanan :{{ $order['pesanan'] }} </h3>
 </div>
</div>
@endsection

    
