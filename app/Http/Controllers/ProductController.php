<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('query');
        $order = $request->input('order', "name");
        $sort = $request->input('sort',"asc");

        $products = Product::when($query, function ($queryBuilder) use ($query, $order) {
                            return $queryBuilder->where($order, 'like', '%'.$query.'%');
                        })
                        ->orderBy($order, $sort)
                        ->paginate(5)
                        ->appends($request->query());

        return view('products.index', compact('products'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query'); // Mendapatkan kata kunci pencarian dari input form

        $products = Product::where('name', 'like', '%'.$query.'%')->paginate(5); // Menampilkan 10 produk per halaman

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id); // Mengambil produk berdasarkan ID
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id); // Mengambil produk berdasarkan ID
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        $product = Product::find($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
