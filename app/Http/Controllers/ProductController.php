<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produits = Product::all();
        return view('products.index', ['produits' => $produits]);
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
        // dd($request->all());
        $request->validate([
            'Libelle' => 'required|string',
            'Marque' => 'required',
            'Prix' => 'required|numeric',
            'Stock' => 'required|integer|between:1,4',
            'Image' => 'nullable|file',
        ]);
        
        $product = new Product;
        $product->Libelle = $request->Libelle;
        $product->Marque = $request->Marque;
        $product->Prix = $request->Prix;
        $product->Stock = $request->Stock;

        $fn= time().'.'.$request->Image->extension();
        $request->Image->move(public_path('images'), $fn);

      
        // if ($request->hasFile('Image')) {
        //     $imagePath = $request->file('Image')->store('images', 'public');
        //     $product->Image = $imagePath;
        // }
        $product->Image = $fn;
        $product->save();

        return redirect()->route('products.show', $product->id)->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produit = Product::find($id);

        return view('products.show', ['produit' => $produit]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produit = Product::findOrFail($id);
        return view('products.edit', compact('produit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Libelle' => 'required|string',
            'Marque' => 'required',
            'Prix' => 'required|numeric',
            'Stock' => 'required|integer|between:1,4',
            'Image' => 'nullable|file',
        ]);

        $product = Product::findOrFail($id);

        $product->update([
            'Libelle' => $request->input('Libelle'),
            'Marque' => $request->input('Marque'),
            'Prix' => $request->input('Prix'),
            'Stock' => $request->input('Stock'),
        ]);

        $fn= time().'.'.$request->Image->extension();
        $request->Image->move(public_path('images'), $fn);
        $product->Image = $fn;
        $product->update();

        return redirect()->route('products.show', ['product' => $product->id])
            ->with('success', 'Product successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produit = Product::find($id);
        if (!$produit) {
            return redirect()->route('products.index')->with('error', 'Product not found');
        }
        $produit->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
