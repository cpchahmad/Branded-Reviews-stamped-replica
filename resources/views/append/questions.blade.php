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
        <div class="user_pic">
            <div class="user_pic_inner">
                <h3>
                    {{$acronym}}
                </h3>
            </div>
        </div>
        <div class="user_info">
            <h3>{{ucfirst($question->name)}}</h3>
        </div>
        <div class="review_date">
            <p>{{\Illuminate\Support\Carbon::createFromTimeString($question->created_at)->format('d/m/y')}}</p>
        </div>
    </div>
    <div class="review_content">
        <p>{{$question->question}}</p>
    </div>
    <div class="review_footer">
        <div class="share_review">
            <p>
                <a id="share_towards" href="">
                    <i class="fas fa-share-square"></i>
                    Share
                </a>
                <span class="share_to">&ensp; | &ensp;<a href="www.facebook.com">Facebook</a>&ensp; . &ensp;<a href="www.twitter.com">Twitter</a> </span>
            </p>
        </div>
        <div class="like_dislike">
            <p>
                Was this helpful?
                <span>
                        <a href="">
                          <i class="fas fa-thumbs-up"></i> <span>0</span>
                        </a>
                        <a href="">
                          <i class="fas fa-thumbs-down"></i> <span>0</span>
                        </a>
                      </span>
            </p>
        </div>
    </div>
    @if($question->question_reply != null)
          <div class="review_reply">
            <div class="replier_info">
                <div class="replier_name">
                    <h4>{{ucwords($question->question_reply->store_name)}}</h4>
                </div>
                <div class="replier_date">
                    <p>{{\Illuminate\Support\Carbon::createFromTimeString($question->question_reply->created_at)->format('d/m/y')}}</p>
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
    <p>This Product has No Questions yet!</p>
@endif
