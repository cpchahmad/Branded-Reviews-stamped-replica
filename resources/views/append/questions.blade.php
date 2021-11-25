@if (count($questions_publish) > 0)
    @foreach($questions_publish as $question)
        @php
            $words = preg_split("/[\s,_-]+/",$question->name);
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
 <div class="review_1">
    <div class="review_1_header">
        <div class="user_pic" id="user_pic">
            <div class="user_pic_inner" id="user_pic_inner">
                <h3>
                    {{$acronym}}
                </h3>
            </div>
        </div>
        <div class="user_info" id="user_info">
            <h3>{{ucfirst($question->name)}}</h3>
        </div>
        <div class="review_date">

            @if($loop->index == 0)
                @if((new DateTime($question->created_at))->diff(new DateTime())->format('%d') > 10)
                    <p> {{now()->subDays(2)->format('d/m/y')}} </p>
                @else
                    <p>{{\Illuminate\Support\Carbon::createFromTimeString($question->created_at)->format('d/m/y')}}</p>
                @endif
            @elseif($loop->index == 1)
                @if((new DateTime($question->created_at))->diff(new DateTime())->format('%d') > 10)
                    <p> {{now()->subDays(2)->format('d/m/y')}} </p>
                @else
                    <p>{{\Illuminate\Support\Carbon::createFromTimeString($question->created_at)->format('d/m/y')}}</p>
                @endif
            @else
                <p>{{\Illuminate\Support\Carbon::createFromTimeString($question->created_at)->format('d/m/y')}}</p>
            @endif
        </div>
    </div>
    <div class="review_content">
        <p>{{$question->question}}</p>
    </div>
    <div class="review_footer">
        <div class="share_review">
            <p>
                <a id="share_towards" href="https://www.facebook.com/sharer/sharer.php?u=https://phpstack-176572-2275881.cloudwaysapps.com/on-facebook-q?question_id={{$question->id}}&display=popup" target="_blank">
                    <i class="fas fa-share-square"></i>
                    Share
                </a>
                <span class="share_to">&ensp; | &ensp;<a href="www.facebook.com">Facebook</a>&ensp; . &ensp;<a href="www.twitter.com">Twitter</a> </span>
            </p>
        </div>
        <div class="like_dislike">
            <p>Was this helpful?<span>
                            <a href="javascript:void(0)">
                              <i @if(isset($question->stats) && $question->stats->like == 1) class="fas fa-thumbs-up blue-color q-like" @else class="fas fa-thumbs-up   q-like" @endif></i> <span class="like-q" data-value="{{$question->id}}">{{$question->likes}}</span>
                            </a>
                            <a href="javascript:void(0)">
                              <i @if(isset($question->stats) && $question->stats->dislike == 1) class="fas fa-thumbs-down blue-color q-dislike" @else  class="fas fa-thumbs-down q-dislike" @endif></i> <span class="dislike-q" data-value="{{$question->id}}">{{$question->dislikes}}</span>
                            </a>
                          </span>
            </p>
        </div>
    </div>
    @if($question->question_reply != null)
          <div class="review_reply" id="review_reply">
            <div class="replier_info">
                <div class="replier_name" id="replier_name">
                    <h4>{{ucwords($question->question_reply->store_name)}}</h4>
                </div>
                <div class="replier_date">
                    @if($loop->index == 0)
                        @if((new DateTime($question->created_at))->diff(new DateTime())->format('%d') > 10)
                            <p> {{now()->subDays(1)->format('d/m/y')}} </p>
                        @else
                            <p>{{\Illuminate\Support\Carbon::createFromTimeString($question->created_at)->format('d/m/y')}}</p>
                        @endif
                    @elseif($loop->index == 1)
                        @if((new DateTime($question->created_at))->diff(new DateTime())->format('%d') > 10)
                            <p> {{now()->subDays(1)->format('d/m/y')}} </p>
                        @else
                            <p>{{\Illuminate\Support\Carbon::createFromTimeString($question->created_at)->format('d/m/y')}}</p>
                        @endif
                    @else
                        <p>{{\Illuminate\Support\Carbon::createFromTimeString($question->created_at)->format('d/m/y')}}</p>
                    @endif
                </div>
            </div>
            <div class="replied_text">
                <p>{{$question->question_reply->message}}</p>
            </div>
        </div>
    @endif
</div>
    @endforeach
@else
    <p>This Product has No Publish Questions yet!</p>
@endif
