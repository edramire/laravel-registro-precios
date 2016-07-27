<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Carbon\Carbon;
use DB;

class ProductController extends Controller
{
    protected $elementsPage = 4;

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', [
            'product' => $product,
            'company' => $product->company,
            'category' => $product->category,
            'productPrices' => $product->prices
            ]);
    }

    public function recomended()
    {

    }

    public function find(Request $request)
    {
        $order = 'asc';

        $this->validate($request, [
            'term' => 'required|min:3|max:255',
            'categories_id' => 'required',
            'categories_id.*' => 'exists:categories,id',
            'companies_id' => 'required',
            'companies_id.*' => 'exists:companies,id',
            ]);

        $products = DB::table('products')
            ->join('product_prices', 'product_prices.product_id', '=', 'products.id')
            ->where('product_prices.created_at', '>=', Carbon::today())
            ->where('products.name', 'like', '%'.$request->term.'%')
            ->whereIn('products.category_id', $request->categories_id)
            ->whereIn('products.company_id', $request->companies_id)
            ->orderBy('product_prices.price', $order)
            ->paginate($this->elementsPage);

        return view('products.find', [
            'products' => $products
            ]);
    }
}
