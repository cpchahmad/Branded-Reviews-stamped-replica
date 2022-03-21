<div class="slide-image">
    <img src="{{asset('review-images'.'/'.$image->review_media)}}" alt="">
</div>
<div class="image-content">
    <div class="detail">
        <div class="product-details">
            <h3 class="product-name">{{$review->name}}<span
                    style="font-size: 18px;color: #1cc286;font-weight: 100;margin-left: 7px;">@if($review->verify_status == 'verified')
                        Verified Buyer @endif</span></h3>
            <div class="star-main">
                <div class="ratings">
                    @if($review->review_rating == null)
                        <div class="col-md-6" style="overflow: hidden;margin-top: 0; line-height: 1">
                            <span class="stars-container stars-{{(0 / 5) * 100}}" style="font-size: 24px;">★★★★★</span>
                        </div>
                    @else
                        <div class="col-md-6" style="overflow: hidden;margin-top: 0;line-height: 1">
                            <span class="stars-container stars-{{($review->review_rating / 5) * 100}}"
                                  style="font-size: 24px;">★★★★★</span>
                        </div>
                    @endif
                </div>
                <div class="review_date">
                    <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->diffForHumans()}}</p>
                </div>
            </div>

            <h3 style="margin-top: 0; margin-bottom: 1%; font-weight: bold;">{{$review->review_title}}</h3>
            <p style="margin: 0">{{$review->experience}}</p>
            @if($review->review_reply != null)
                <h4 style="margin: 0; font-weight: bold;border-top: 1px solid #eee; padding-top: 15px; margin-top: 15px;">Reply:</h4>
                <div>
                    <p style="margin: 0">{{$review->review_reply->message}}</p>
                    <div class="like_dislike ">
                        <p style="padding-bottom: 15px;">
                        <span style="display: flex; justify-content: flex-end;">
                          <a href="javascript:void(0)" style="display: inherit; margin-right: 8%;">
                            <i class="fas fa-thumbs-up" style="margin-top: 22%"></i> <span
                                  style="margin-left: 22%">{{$review->likes}}</span>
                          </a>
                          <a href="javascript:void(0)" style="display: inherit;margin-right: 5px;">
                            <i class="fas fa-thumbs-down" style="margin-top: 22%"></i><span
                                  style="margin-left: 22%">{{$review->dislikes}}</span>
                          </a>
                        </span>
                        </p>
                    </div>
                </div>
            @endif
{{--            <div class="product-title" style="width: fit-content;">--}}
            <div class="product-title" style="width: 50%;">
                <a href="javascript:void(0)" style="text-decoration: none; color: black;" data-value="{{$review->id}}"
                   class='popup-image-link'>
{{--                    <div><img class="popup-image2" src="{{$product->featured_image}}"></div>--}}
                    <div><img class="popup-image2" style="width: 100%;height: auto" src="{{$product->featured_image}}"></div>
{{--                    <div style="width: 122px; text-align: center;"><p style="margin-top: 0">{{$product->title}}</p>--}}
                    <div style=""><p style="margin-top: 0">{{$product->title}}</p>

                    </div>
                </a>
            </div>
        </div>
    </div>
</div>



