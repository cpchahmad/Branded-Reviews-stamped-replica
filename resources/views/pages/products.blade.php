@extends('layouts.app')
@section('content')
    <style>
        .alignment{
            vertical-align: middle !important;
        }

    </style>
    <div class="col-lg-10 col-md-10 pl-4 pt-3 pr-4">
        <div class="row">
            <div class="col-6">
                <h3>Products</h3>
            </div>
            <div class="col-6 text-right">
                <a href="{{route('sync.products')}}" type="button" class="btn btn-primary">Sync Products</a>
            </div>
            <div class="col-md-12 mt-2">
                <div class="form-group">
                    <form action="" method="GET">
                        @sessionToken
                        <div class="input-group">
                            <button type="submit" class="btn btn-primary mr-1 pl-4 pr-4">Filter</button>
                            <select class="form-control bg-white" name="filter" id="country">
                                <option selected disabled>Search</option>
                                <option value="paid">Paid</option>
                                <option value="partially paid">Partially paid</option>
                                <option value="pending">Payment pending</option>
                                <option value="refunded">Refunded</option>
                                <option value="partially refunded">Partially refunded</option>
                                <option value="unpaid">Unpaid</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if (count($products) > 0)
                        <table class="table table-hover">
                            <thead class="border-0">
                            <tr>
                                <th></th>
                                <th>Product</th>
                                <th>Rating</th>
                                <th>Reviews</th>
                                <th class="">Last review date</th>
                                <th class="text-center">Add New</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                @php
                                    if (count($product->product_reviews) > 0){
                                    $product_rating = ($product->product_reviews->sum('review_rating')) / (count($product->product_reviews));
                                    $product_last_review = $product->product_reviews->sortByDesc('id')->first();
                                    }else{
                                    $product_rating = 0;
                                    $product_last_review  = 'No';
                                    }
                                @endphp
                                <tr>
                                    <td class=""><a href="#">@if($product->featured_image != null)<img src="{{$product->featured_image}}" width="40px" height="40px">@else <img src="{{asset('empty.jpg')}}" width="40px" height="40px"> @endif</a></td>
                                    <td class="alignment">{{$product->title}}</td>
                                    <td class="alignment"><button class="btn btn-secondary">{{number_format($product_rating,1)}}</button></td>
                                    <td class="alignment text-center">{{count($product->product_reviews)}}</td>
                                    <td class="alignment">@if($product_last_review != 'No'){{\Illuminate\Support\Carbon::createFromTimeString($product_last_review->created_at)->isoFormat('MMM DD YYYY')}} @else No Reviews Yet! @endif</td>
                                    <td class="alignment text-center"><a href="{{route('add.question',$product->shopify_id)}}" class="btn btn-sm btn-success" type="button">Question</a><a href="{{route('add.review',$product->shopify_id)}}" class="btn btn-sm btn-success" type="button">Review</a></td>
                                    <td class="alignment text-right"><a href="{{route('product.detail',$product->shopify_id)}}" class="btn btn-sm btn-primary" type="button">view</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No Products Found</p>
                    @endif
                            <div class="pagination">
                                {{ $products->links("pagination::bootstrap-4") }}
                            </div>
                </div>
            </div>
        </div>
    </div>
@endsection
