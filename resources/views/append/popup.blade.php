 <div class="slide-image">
        <img src="{{asset('review-images'.'/'.$image->review_media)}}" alt="">
    </div>
    <div class="image-content">
        <div class="detail">
            <div class="product-details" style="margin-top: 3%;">
                <h3 style="margin-bottom: 5%; font-weight: 600; font-size: x-large;" class="product-name">{{$review->name}}<span style="font-size: 18px;color: #1cc286;font-weight: 100;margin-left: 7px;">@if($review->verify_status == 'verified') Verified Buyer @endif</span></h3>
                <div class="star-main">
                    <div class="ratings">
                        @if($review->review_rating == null)
                            <div class="col-md-6" style="overflow: hidden; line-height: 1">
                                <span class="stars-container stars-{{(0 / 5) * 100}}" style="font-size: 24px;">★★★★★</span>
                            </div>
                        @else
                            <div class="col-md-6" style="overflow: hidden;line-height: 1">
                                <span class="stars-container stars-{{($review->review_rating / 5) * 100}}" style="font-size: 24px;">★★★★★</span>
                            </div>
                        @endif
                    </div>
                    <div class="review_date">
                        <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->diffForHumans()}}</p>
                    </div>
                </div>

                <h3 style="margin-top: 0; margin-bottom: 1%; font-weight: bold;">{{$review->review_title}}</h3>
                <p style="margin: 0">{{$review->experience}}</p>
                <hr>
                @if($review->review_reply != null)
                <h4 style="margin: 0; font-weight: bold">Reply:</h4>
                <p style="margin: 0">{{$review->review_reply->message}}</p>
                @endif
                <div class="like_dislike">
                    <p>
                        <span style="display: flex;">
                          <a href="javascript:void(0)" style="display: inherit; margin-right: 28%;">
                            <i class="fas fa-thumbs-up" style="margin-top: 22%"></i> <span style="margin-left: 22%">{{$review->likes}}</span>
                          </a>
                          <a href="javascript:void(0)" style="display: inherit">
                            <i class="fas fa-thumbs-down" style="margin-top: 22%"></i><span style="margin-left: 22%">{{$review->dislikes}}</span>
                          </a>
                        </span>
                    </p>
                </div>
                <hr>
                <div>
                      <img class="popup-image2" src="{{asset('shirt.jpg')}}">
                </div>
            </div>
        </div>
    </div>



