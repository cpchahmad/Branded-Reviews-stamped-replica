<div class="review_2">
    <div class="review_1_header">
        <div class="user_info" id="user_info">
            @if(count($review->medias) > 0)
                <img id="add-image" src="{{asset('review-images'.'/'.$review->medias[0]->review_media)}}" alt="" />
            @endif
            <div>
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
        </div>
    </div>
    <div class="review_content">
        <span>{{$review->review_title}}</span>
        <p>{{$review->experience}}</p>
    </div>
</div>
