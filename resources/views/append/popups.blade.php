<div class="owl-carousel owl-theme">
@php
$counter = 0;
@endphp
@if(count($reviews_popups) > 0)
@foreach($reviews_popups as $review)
@if(count($review->medias) > 0)
@foreach($review->medias as $key => $media)
@if($counter <= 7)
<div class="item" style="width: 100%;">
    <div class="slide-image">
        <img src="{{asset('review-images'.'/'.$media->review_media)}}" alt="">
    </div>

    <div class="image-content">
        <div class="detail">
            <div class="product-details">
                <h3 class="product-name">{{$review->name}} @if($review->verify_status == 'verified')Verified Buyer @endif</h3>
                <div class="ratings">
                    @if($review->review_rating == null)
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star "></span>
                    @elseif($review->review_rating == 1)
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star "></span>
                    @elseif($review->review_rating == 2)
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star "></span>
                    @elseif($review->review_rating == 3)
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star "></span>
                    @elseif($review->review_rating == 4)
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star "></span>
                    @elseif($review->review_rating == 5)
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                    @endif
                </div>
                <div class="review_date">
                    <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->diffForHumans()}}</p>
                </div>
                <h3>{{$review->review_title}}</h3>
                <p>{{$review->experience}}</p>
                <hr>
                @if($review->review_reply != null)
                <h4>Reply:</h4>
                <p>{{$review->review_reply->message}}</p>
                <div class="like_dislike">
                    <p>
                        <span>
                          <a href="">
                            <i class="fas fa-thumbs-up"></i> <span>{{$review->likes}}</span>
                          </a>
                          <a href="">
                            <i class="fas fa-thumbs-down"></i> <span>{{$review->dislikes}}</span>
                          </a>
                        </span>
                    </p>
                </div>
                <hr>
                <img src="{{asset('review-images'.'/'.$media->review_media)}}" alt="" width="75px" height="100px">
                @endif
            </div>
        </div>
    </div>
</div>
@php $counter += 1; @endphp
@endif
@endforeach
</div>
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
@endif
<script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })
    $( ".owl-prev").html('<i class="fas fa-chevron-left"></i>');
    $( ".owl-next").html('<i class="fas fa-chevron-right"></i>');
</script>
