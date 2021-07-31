<?php

namespace App\Http\Controllers\Api;

Use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BananaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::with('groups')->whereHas('groups')->get();

        return response()->json([
            'success' => true,
            'message' => 'Daftar data Produk',
            'data'    => $products
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:products|max:255',
            'harga' => 'required|numeric',
            
        ]);

        $products = Products::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'groups_id' => $request->groups_id,
            
        ]);

        if($products)
        {
            return response()->json([
                'success' => true,
                'message' => 'Produk berhasil di tambahkan',
                'data'    => $products
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Produk gagal di tambahkan',
                'data'    => $products  
            ], 409);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Products::with('groups')->where('id', $id)->get();

    return response()->json([
        'success' => true,
        'message' => 'Detail Data Produk',
        'data'    => $product
    ], 200);
    }
    public function edit($id)
    {
        $product = Products::with('groups')->where('id', $id)->first();

    return response()->json([
        'success' => true,
        'message' => 'Detail Data Produk',
        'data'    => $product
    ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Products::find($id)
        ->update([
            'nama' => $request->nama,
            'harga' => $request->harga,  
            'groups_id' => $request->groups_id,  
        ]);
        return response()->json([
            'success' =>true,
            'message' =>'Data Produk Berhasil Diubah',
            'data' => $product
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Di Hapus',
            'data'    => $product
        ], 200);
    }
}
