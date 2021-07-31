<?php
namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;




class BananaController extends Controller
{

    public function index()
    {
        $products = Products::orderBy('id', 'desc')->paginate(3);

        return view ('products.index', compact ('products'));
    }
    public function create()
    {
        return view ('products.create');
    }
    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'nama' => 'required|unique:products|max:255',
            'harga' => 'required',
        ]);

        $products = new Products;

        $products->nama = $request->nama;
        $products->harga = $request->harga;

        $products->save();

        return redirect('/');
    }
    public function show($id)
    {
        $product = Products::where('id', $id)->first();
        return view('products.show', ['product' => $product]);
    }
    public function edit($id)
    {
        $product = Products::where('id', $id)->first();
        return view('products.edit', ['product' => $product]);
    }
    public function update(Request $request, $id)
    {
         $request->validate([
            'nama' => 'required|unique:products|max:255',
            'harga' => 'required',
        ]);
        Products::find($id)->update([
            'nama' => $request->nama,
            'harga' => $request->harga
        ]);

        return redirect('/');
    }
    public function destroy($id)
    {
        Products::find($id)->delete();
        return redirect('/');
    }
    public function welcome()
    {
        return view ('products.welcome');
    }
}

