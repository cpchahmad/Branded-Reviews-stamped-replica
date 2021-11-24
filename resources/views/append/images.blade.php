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
        @php $counter += 1; @endphp
        @endif
    @endforeach
    @else
{{--        <a href="javascript:void(0)" title="My Watch" class="">--}}
{{--            <div>--}}
{{--                <img src="{{asset('empty.jpg')}}" width="70"  height="55" alt="Picture">--}}
{{--            </div>--}}
{{--        </a>--}}
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
