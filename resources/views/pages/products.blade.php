@extends('layouts.app')
@section('content')
    <style>
        .alignment{
            vertical-align: middle !important;
        }
    </style>
    <div class="col-lg-12 col-md-12 pl-4 pt-3 pr-4">
        <div class="row">
            <div class="col-6 products-reviews">
                <h3>Products</h3>
            </div>
            <div class="col-6 products-reviews1 text-right">
                <a href="{{route('sync.products')}}" type="button" class="btn btn-primary">Sync Products</a>
            </div>
            <div class="col-md-12 mt-2">
                <div class="form-group">
                    <form action="{{route('products.filter')}}" method="GET">
                        @sessionToken
                        <div class="input-group">
                            <button type="submit" class="btn btn-primary mr-1 pl-4 pr-4">Filter</button>
                            @if(isset($product_filter))
                                <button type="button" class="btn btn-secondary clear_filter_data mr-1 pl-4 pr-4">Clear</button>
                            @endif
                            <input placeholder="Enter product title" type="text" @if (isset($product_filter)) value="{{$product_filter}}" @endif name="products_filter" id="question_email" class="form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card table-responsive">
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
                                    <td class="alignment text-center"><a href="{{route('add.question',$product->shopify_id)}}" class="btn btn-sm btn-primary" type="button">Question</a><a href="{{route('add.review',$product->shopify_id)}}" style="margin-left: 1%;" class="btn btn-sm btn-primary" type="button">Review</a></td>
                                    <td class="alignment text-right"><a href="{{route('product.detail',$product->shopify_id)}}" class="btn btn-sm btn-primary" type="button">view</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No Products Found</p>
                    @endif
                            <div class="pagination">
                                {{ $products->appends(\Illuminate\Support\Facades\Request::except('page'))->links("pagination::bootstrap-4") }}
                            </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('body').on('click','.clear_filter_data', function() {
            window.location.href = '/products';
        });
    </script>
@endsection
