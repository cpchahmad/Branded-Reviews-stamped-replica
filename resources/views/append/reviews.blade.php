 @if (count($reviews_featured) > 0)
        @foreach($reviews_featured as $review)
            @php
                    $words = preg_split("/[\s,_-]+/",$review->name);
                        $words= json_encode($words);
                           $words_count =  str_word_count($words);
                            $acronym = "";
                            $words = json_decode($words);
                        if ($words_count > 1){
                            $string = $words;
                            $acronym = $string[0][0].$string[1][0];
                            $acronym = strtoupper($acronym);
                        }else{
                            $string = $words;
                            $acronym = $string[0][0];
                            $acronym = strtoupper($acronym);
                        }
            @endphp

            <div class="review_2">
                <div class="review_1_header">
                    <div class="user_pic" id="user_pic">
                        <div class="user_pic_inner" id="user_pic_inner">
                            <h3>
                                {{$acronym}}
                            </h3>
                        </div>
                    </div>
                    <img src="{{asset('polished/badge2.png')}}" width="10px" height="10px">
                    <div class="user_info" id="user_info">
                        <h3>{{ucwords($review->name)}}<span>@if($review->verify_status == 'verified') Verified Buyer @endif</span></h3>
                        <p>
                            <i class="fas fa-flag-usa"></i>
                            {{$review->customer_location}}
                        </p>
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
                    <div class="review_date">

                        @if($loop->index == 0)

                            @if((new DateTime($review->created_at))->diff(new DateTime())->format('%d') > 10)
                                <p> {{now()->subDays(1)->format('d/m/y')}} </p>
                            @else
                                <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('d/m/y')}}</p>
                            @endif
                        @elseif($loop->index == 1)
                            @if((new DateTime($review->created_at))->diff(new DateTime())->format('%d') > 10)
                                <p> {{now()->subDays(1)->format('d/m/y')}} </p>
                            @else
                                <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('d/m/y')}}</p>
                            @endif
                        @else
                            <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('d/m/y')}}</p>
                        @endif
                    </div>
                </div>
                <div class="review_content">
                    <span>{{$review->review_title}}</span>
                    <p>{{$review->experience}}</p>
                </div>
                <div class="review_footer">
                    <div class="share_review">
                        <p>
                            <a id="share_towards" href="https://www.facebook.com/sharer/sharer.php?u=https://phpstack-176572-2275881.cloudwaysapps.com/on-facebook?review_id={{$review->id}}&display=popup" target="_blank">
                                <i class="fas fa-share-square"></i>
                                Share
                            </a>
                            <span class="share_to">&ensp; | &ensp;<a href="www.facebook.com">Facebook</a>&ensp; . &ensp;<a href="www.twitter.com">Twitter</a> </span>
                        </p>
                    </div>
                    <div class="like_dislike">
                        <p>Was this helpful?<span>
                            <a href="javascript:void(0)">
                              <i @if(isset($review->stats) && $review->stats->like == 1) class="fas fa-thumbs-up blue-color for-like" @else class="fas fa-thumbs-up   for-like" @endif></i> <span class="like" data-value="{{$review->id}}">{{$review->likes}}</span>
                            </a>
                            <a href="javascript:void(0)">
                              <i @if(isset($review->stats) && $review->stats->dislike == 1) class="fas fa-thumbs-down blue-color for-dislike" @else  class="fas fa-thumbs-down for-dislike" @endif></i> <span class="dislike" data-value="{{$review->id}}">{{$review->dislikes}}</span>
                            </a>
                          </span>
                        </p>
                    </div>
                </div>
                @if($review->review_reply != null)
                <div class="review_reply" id="review_reply">
                    <div class="replier_info">
                        <div class="replier_name" id="replier_name">
                            <h4>{{$review->review_reply->store_name}}</h4>
                        </div>
                        <div class="replier_date">
                            @if($loop->index == 0)

                                @if((new DateTime($review->created_at))->diff(new DateTime())->format('%d') > 10)
                                    <p> {{now()->subDays(2)->format('d/m/y')}} </p>
                                @else
                                    <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('d/m/y')}}</p>
                                @endif
                            @elseif($loop->index == 1)
                                @if((new DateTime($review->created_at))->diff(new DateTime())->format('%d') > 10)
                                    <p> {{now()->subDays(2)->format('d/m/y')}} </p>
                                @else
                                    <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('d/m/y')}}</p>
                                @endif
                            @else
                                <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('d/m/y')}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="replied_text">
                        <p>
                            {{$review->review_reply->message}}
                        </p>
                    </div>
                </div>
                @endif
            </div>
        @endforeach
    @endif
        @if (count($reviews_publish) > 0)
            @foreach($reviews_publish as $review)
                @php
                    $words = preg_split("/[\s,_-]+/",$review->name);
                        $words= json_encode($words);
                           $words_count =  str_word_count($words);
                            $acronym = "";
                            $words = json_decode($words);
                        if ($words_count > 1){
                            $string = $words;
                            $acronym = $string[0][0].$string[1][0];
                            $acronym = strtoupper($acronym);
                        }else{
                            $string = $words;
                            $acronym = $string[0][0];
                            $acronym = strtoupper($acronym);
                        }
                @endphp
                <div class="review_2">
                    <div class="review_1_header">
                        <div class="user_pic" id="user_pic">
                            <div class="user_pic_inner" id="user_pic_inner">
                                <h3>
                                    {{$acronym}}
                                </h3>
                            </div>
                        </div>
                        <img src="{{asset('polished/badge2.png')}}" width="10px" height="10px">
                        <div class="user_info" id="user_info">
                            <h3>{{ucwords($review->name)}}<span>@if($review->verify_status == 'veified') Verified Buyer @endif</span></h3>
                            <p>
                                <i class="fas fa-flag-usa"></i>
                                {{$review->customer_location}}
                            </p>
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
                        <div class="review_date">
                            @if($loop->index == 0)

                                @if((new DateTime($review->created_at))->diff(new DateTime())->format('%d') > 10)
                                    <p> {{now()->subDays(2)->format('d/m/y')}} </p>
                                @else
                                    <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('d/m/y')}}</p>
                                @endif
                            @elseif($loop->index == 1)
                                @if((new DateTime($review->created_at))->diff(new DateTime())->format('%d') > 10)
                                    <p> {{now()->subDays(2)->format('d/m/y')}} </p>
                                @else
                                    <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('d/m/y')}}</p>
                                @endif
                            @else
                                <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('d/m/y')}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="review_content">
                        <span>{{$review->review_title}}</span>
                        <p>{{$review->experience}}</p>
                    </div>
                    <div class="review_footer">
                        <div class="share_review">
                            <p>
                                <a id="share_towards" href="https://www.facebook.com/sharer/sharer.php?u=https://phpstack-176572-2275881.cloudwaysapps.com/on-facebook?review_id={{$review->id}}&display=popup" target="_blank">
                                    <i class="fas fa-share-square"></i>
                                    Share
                                </a>
                                <span class="share_to">&ensp; | &ensp;<a href="www.facebook.com">Facebook</a>&ensp; . &ensp;<a href="www.twitter.com">Twitter</a> </span>
                            </p>
                        </div>
                        <div class="like_dislike">
                            <p>Was this helpful?<span>
                            <a href="javascript:void(0)">
                              <i @if(isset($review->stats) && $review->stats->like == 1) class="fas fa-thumbs-up blue-color for-like" @else class="fas fa-thumbs-up   for-like" @endif></i> <span class="like" data-value="{{$review->id}}">{{$review->likes}}</span>
                            </a>
                            <a href="javascript:void(0)">
                              <i @if(isset($review->stats) && $review->stats->dislike == 1) class="fas fa-thumbs-down blue-color for-dislike" @else  class="fas fa-thumbs-down for-dislike" @endif></i> <span class="dislike" data-value="{{$review->id}}">{{$review->dislikes}}</span>
                            </a>
                          </span>
                                </p>
                        </div>
                    </div>
                    @if($review->review_reply != null)
                        <div class="review_reply" id="review_reply">
                            <div class="replier_info">
                                <div class="replier_name" id="replier_name">
                                    <h4>{{$review->review_reply->store_name}}</h4>
                                </div>
                                <div class="replier_date">
                                    @if($loop->index == 0)

                                        @if((new DateTime($review->created_at))->diff(new DateTime())->format('%d') > 10)
                                            <p> {{now()->subDays(1)->format('d/m/y')}} </p>
                                        @else
                                            <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('d/m/y')}}</p>
                                        @endif
                                    @elseif($loop->index == 1)
                                        @if((new DateTime($review->created_at))->diff(new DateTime())->format('%d') > 10)
                                            <p> {{now()->subDays(1)->format('d/m/y')}} </p>
                                        @else
                                            <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('d/m/y')}}</p>
                                        @endif
                                    @else
                                        <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('d/m/y')}}</p>
                                    @endif

                                </div>
                            </div>
                            <div class="replied_text">
                                <p>
                                    {{$review->review_reply->message}}
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        @endif
        @if (count($reviews_featured) == 0 && count($reviews_publish) == 0)
            <p>There are No Publish Reviews yet!</p>
        @endif
