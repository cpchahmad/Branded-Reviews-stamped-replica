@php
$counter = 0;
@endphp
@if(count($reviews) > 0)
@foreach($reviews as $review)
@if(count($review->medias) > 0)
@foreach($review->medias as $key => $media)
@if($counter <= 7)
<a href="javascript:void(0)" title="My Watch" class="btn-view">
    <div>
        <img src="{{asset('review-images'.'/'.$media->review_media)}}" width="70"  height="55" alt="Picture">
    </div>
</a>
<div class="item">
    <div class="slide-image">
        <img src="{{asset('review-images'.'/'.$media->review_media)}}" alt="">
    </div>
    @dd($review)
    <div class="image-content">
        <div class="detail">
            <div class="product-details">
                <h3 class="product-name">Kevin G.Verified Buyer</h3>
                <div class="ratings">
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
                <div class="review_date">
                    <p>1 month ago</p>
                </div>
                <h3>King's Sapphire</h3>
                <p>I received timepiece Wed 15th Sept very satisfied with professional service all the time through tracking device included. Beautiful dials and nice bracelet.0</p>
                <hr>
                <h4>Reply:</h4>
                <p>Hi Kevin! Thank you for including an image, and thanks for mentioning our service! We try to do our best Samantha / Mancini</p>
                <div class="like_dislike">
                    <p>
                        <span>
                          <a href="">
                            <i class="fas fa-thumbs-up"></i> <span>6</span>
                          </a>
                          <a href="">
                            <i class="fas fa-thumbs-down"></i> <span>0</span>
                          </a>
                        </span>
                    </p>
                </div>
                <hr>
                <img src="https://cdn.shopify.com/s/files/1/0606/5366/6521/files/img1.jpg?v=1636109386" alt="" width="75px" height="100px">
            </div>
        </div>
    </div>
</div>
@php $counter += 1; @endphp
@endif
@endforeach
@else
<a href="javascript:void(0)" title="My Watch" class="">
    <div>
        <img src="{{asset('empty.jpg')}}" width="70"  height="55" alt="Picture">
    </div>
</a>
<a href="javascript:void(0)" title="My Watch" class="">
    <div>
        <img src="{{asset('empty.jpg')}}" width="70"  height="55" alt="Picture">
    </div>
</a>
<a href="javascript:void(0)" title="My Watch" class="">
    <div>
        <img src="{{asset('empty.jpg')}}" width="70"  height="55" alt="Picture">
    </div>
</a>
<a href="javascript:void(0)" title="My Watch" class="">
    <div>
        <img src="{{asset('empty.jpg')}}" width="70"  height="55" alt="Picture">
    </div>
</a>
<a href="javascript:void(0)" title="My Watch" class="">
    <div>
        <img src="{{asset('empty.jpg')}}" width="70"  height="55" alt="Picture">
    </div>
</a>
<a href="javascript:void(0)" title="My Watch" class="">
    <div>
        <img src="{{asset('empty.jpg')}}" width="70"  height="55" alt="Picture">
    </div>
</a>
<a href="javascript:void(0)" title="My Watch" class="">
    <div>
        <img src="{{asset('empty.jpg')}}" width="70"  height="55" alt="Picture">
    </div>
</a>
<a href="javascript:void(0)" title="My Watch" class="">
    <div>
        <img src="{{asset('empty.jpg')}}" width="70"  height="55" alt="Picture">
    </div>
</a>
@endif
@endforeach
@else
<a href="javascript:void(0)" title="My Watch" class="">
    <div>
        <img src="{{asset('empty.jpg')}}" width="70"  height="55" alt="Picture">
    </div>
</a>
<a href="javascript:void(0)" title="My Watch" class="">
    <div>
        <img src="{{asset('empty.jpg')}}" width="70"  height="55" alt="Picture">
    </div>
</a>
<a href="javascript:void(0)" title="My Watch" class="">
    <div>
        <img src="{{asset('empty.jpg')}}" width="70"  height="55" alt="Picture">
    </div>
</a>
<a href="javascript:void(0)" title="My Watch" class="">
    <div>
        <img src="{{asset('empty.jpg')}}" width="70"  height="55" alt="Picture">
    </div>
</a>
<a href="javascript:void(0)" title="My Watch" class="">
    <div>
        <img src="{{asset('empty.jpg')}}" width="70"  height="55" alt="Picture">
    </div>
</a>
<a href="javascript:void(0)" title="My Watch" class="">
    <div>
        <img src="{{asset('empty.jpg')}}" width="70"  height="55" alt="Picture">
    </div>
</a>
<a href="javascript:void(0)" title="My Watch" class="">
    <div>
        <img src="{{asset('empty.jpg')}}" width="70"  height="55" alt="Picture">
    </div>
</a>
<a href="javascript:void(0)" title="My Watch" class="">
    <div>
        <img src="{{asset('empty.jpg')}}" width="70"  height="55" alt="Picture">
    </div>
</a>
@endif
