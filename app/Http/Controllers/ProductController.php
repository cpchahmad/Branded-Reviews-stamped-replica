<?php

namespace App\Http\Controllers;

use App\Models\FakeReview;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function Products(){
        $shop = Auth::user();
        $products = Product::where('shop_id',$shop->id)->paginate(10);
        return view('pages.products')->with([
            'products'=>$products,
        ]);
    }
    public function ProductDetail($id){
        $shop = Auth::user();
        $product = Product::where('shopify_id',$id)->first();
        $reviews = Review::where('shop_id',$shop->id)->where('product_id',$product->shopify_id)->paginate(10);
        $reviews_setting = FakeReview::where('product_id',$id)->first();
        return view('pages.product-detail')->with([
            'product'=>$product,
            'reviews'=>$reviews,
            'setting'=>$reviews_setting,
        ]);
    }
    public function ShopifyProducts($next = null)
    {
        $shop = Auth::user();
        $products = $shop->api()->rest('GET', '/admin/products.json', [
            'limit' => 250,
            'page_info' => $next
        ]);
        $products = json_decode(json_encode($products));

        foreach ($products->body->products as $product) {
            $this->createShopifyProducts($product, $shop);
        }
        if (isset($products->link->next)) {
            $this->ShopifyProducts($products->link->next);
        }
        return Redirect::tokenRedirect('home', ['notice' => 'Products Synced Successfully']);
    }

    public function createShopifyProducts($product, $shop)
    {
        $p = Product::where('shopify_id', $product->id)->first();
        if ($p === null) {
            $p = new Product();
        }
        if ($product->images) {
            $image = $product->images[0]->src;
        } else {
            $image = '';
        }
        $p->shop_id = $shop->id;
        $p->shopify_id = $product->id;
        $p->title = $product->title;
        $p->description = $product->body_html;
        $p->handle = $product->handle;
        $p->vendor = $product->vendor;
        $p->type = $product->product_type;
        $p->featured_image = $image;
        $p->tags = $product->tags;
        $p->options = json_encode($product->options);
        $p->status = $product->status;
        $p->published_at = $product->published_at;
        $p->save();
    }
    public function FakeStats(Request $request){
        $shop = Auth::user();
        if ($request->review_status == 'fake'){
            $product = FakeReview::where('product_id',$request->product_id)->first();
            if ($product == null){
                $product = new FakeReview();
            }
            $product->product_id = $request->product_id;
            $product->shop_id = $shop->id;
            $product->total_reviews = $request->total_reviews;
            $product->rating = $request->average_rating;
            $product->five_star = $request->five_star;
            $product->four_star = $request->four_star;
            $product->three_star = $request->three_star;
            $product->two_star = $request->two_star;
            $product->one_star = $request->one_star;
            $product->status = 'fake';
            $product->save();
        }
        if ($request->review_status == 'real'){
            $product = FakeReview::where('product_id',$request->product_id)->first();
            if ($product == null){
                $product = new FakeReview();
            }
            $product->product_id = $request->product_id;
            $product->shop_id = $shop->id;
            $product->status = 'real';
            $product->save();
        }
        return Redirect::tokenRedirect('products', ['notice' => 'Setting Saved Successfully']);
    }
    public function ProductsFilter(Request $request){
        $shop = Auth::user();
        $products = Product::where('shop_id',$shop->id)->newQuery();
        if ($request->filled('products_filter')){
                $products = $products->where('title', 'LIKE', '%' . $request->input('products_filter') . '%')->newQuery();
        }
        $products = $products->paginate(10);
        return view('pages.products')->with([
            'products'=>$products,
            'product_filter'=>$request->input('products_filter'),
        ]);
    }
}
