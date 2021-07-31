<?php

namespace App\Http\Controllers;
Use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

   public function index()
   {
    $orders = Orders::orderBy('id','desc')->paginate(3);
    
    return view ('orders.index', compact('orders'));
   }
   public function create()
   {
    
    return view ('orders.create');
   }
   public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
         'nama' => 'required|unique:orders|max:255',
         'no_tlp' => 'required|numeric',
         'alamat' => 'required',
         'pesanan' => 'required',
     ]);

        $orders = new orders;

        $orders->nama = $request->nama;
        $orders->no_tlp = $request->no_tlp;
        $orders->alamat = $request->alamat;
        $orders->pesanan = $request->pesanan;

        $orders->save();

        return redirect('/');

   }
   public function show($id)
   {
      $order = Orders::where('id',$id)->first();
      return view('orders.show', ['order' => $order]);
   }
   public function edit($id)
   {
      $order = Orders::where('id',$id)->first();
      return view('orders.edit', ['order' => $order]);
   }
   public function update(Request $request,$id)
   {
      $request->validate([
         'nama' => 'required|unique:orders|max:255',
         'no_tlp' => 'required|numeric',
         'alamat' => 'required',
         'pesanan' => 'required',
     ]);

      Orders::find($id)->update([
         'nama' => $request->nama,
         'no_tlp' => $request->no_tlp,
         'alamat' => $request->alamat,
         'pesanan' => $request->pesanan
      ]);

      return redirect ('/');
   }
   public function destroy($id)
   {
      Orders::find($id)->delete();
      return redirect ('/');
   }
}
