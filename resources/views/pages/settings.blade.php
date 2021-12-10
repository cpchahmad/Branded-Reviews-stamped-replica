@extends('layouts.app')
@section('content')
    <head>
        <link
            href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Amatic+SC&family=Bangers&family=Caveat&family=Courgette&family=Indie+Flower&family=Kaushan+Script&family=Lobster&family=Lobster+Two&family=Montserrat:wght@100&family=Open+Sans:wght@300&family=Orbitron&family=Pacifico&family=Patrick+Hand&family=Rajdhani:wght@300&family=Raleway:wght@100&family=Righteous&family=Roboto:wght@100&family=Sacramento&family=Satisfy&display=swap"
            rel="stylesheet">
    </head>
    <div class="col-lg-12 col-md-12 pl-4 pt-3 pr-4">
        <div class="row">
            <div class="col-6">
                <h3>Display Settings</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-2 mb-4">
                <div class="card">
                    <form action="{{route('setting.save')}}" method="POST">
                        @sessionToken
                        <div class="row p-4">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="#">Rating Star color</label>
                                    <input placeholder="select rating star color" @if(isset($setting->stars)) value="{{$setting->stars}}" @endif name="rating_star" type="color" class="form-control">
                                    <input  name="shop_name" value="{{ Auth::user()->name }}" type="hidden" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="#">Filled Star color</label>
                                    <input placeholder="select filled star color" @if(isset($setting->filled_stars)) value="{{$setting->filled_stars}}" @endif name="filled_star" type="color" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="#">UnFilled Star color</label>
                                    <input placeholder="select unfilled star color" @if(isset($setting->unfilled_stars)) value="{{$setting->unfilled_stars}}" @endif name="unfilled_star" type="color" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="#">Bar Filled color</label>
                                    <input placeholder="select filled star color" @if(isset($setting->bar_filled)) value="{{$setting->bar_filled}}" @endif name="filled_bar" type="color" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="#">Bar UnFilled color</label>
                                    <input placeholder="select filled star color" @if(isset($setting->bar_unfilled)) value="{{$setting->bar_unfilled}}" @endif name="unfilled_bar" type="color" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="#">Text Color</label>
                                    <input placeholder="select filled star color" @if(isset($setting->text)) value="{{$setting->text}}" @endif name="text_color" type="color" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="#">Tabs Background color</label>
                                    <input placeholder="select filled star color" @if(isset($setting->tabs_background)) value="{{$setting->tabs_background}}" @endif name="tabs_bg" type="color" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="#">Background tabs counter</label>
                                    <input placeholder="select filled star color" @if(isset($setting->tabs_counter_background)) value="{{$setting->tabs_counter_background}}" @endif name="tabs_counter" type="color" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="#">Tabs BorderBottom color</label>
                                    <input placeholder="select filled star color" @if(isset($setting->tabs_border_bottom)) value="{{$setting->tabs_border_bottom}}" @endif name="tabs_bottom" type="color" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="#">Circle Background</label>
                                    <input placeholder="select filled star color" @if(isset($setting->circle_background)) value="{{$setting->circle_background}}" @endif name="circle_bg" type="color" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="#">Circle Text color</label>
                                    <input placeholder="select filled star color" @if(isset($setting->circle_text)) value="{{$setting->circle_text}}" @endif name="circle_text" type="color" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="#">Reply Border color</label>
                                    <input placeholder="select filled star color" @if(isset($setting->reply_border)) value="{{$setting->reply_border}}" @endif name="reply_border" type="color" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="#">Verified buyer  Color</label>
                                    <input placeholder="select filled star color" @if(isset($setting->verify_color)) value="{{$setting->verify_color}}" @endif name="verify_color" type="color" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="#">Button Text Color</label>
                                    <input placeholder="select filled star color" @if(isset($setting->button_text)) value="{{$setting->button_text}}" @endif name="button_text" type="color" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="#">Button Background Color</label>
                                    <input placeholder="select filled star color" @if(isset($setting->button_bg)) value="{{$setting->button_bg}}" @endif name="button_bg" type="color" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="#">Select Font Family</label>
                                    <select class="form-control bg-white" name="font_family" id="">
                                        <option selected disabled value="reviews">Select</option>
                                        @foreach($fonts as $font)
                                            <option @if(isset($setting->font_family) && $setting->font_family == $font->title) selected @endif value="{{$font->title}}">{{$font->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
{{--                            <div class="col-md-4">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="#">Enter Font Size (px)</label>--}}
{{--                                    <input placeholder="Enter font text" @if(isset($setting->font_text)) value="{{$setting->font_text}}" @endif name="font_text" type="number" step="1" class="form-control">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.fake_review').click(function() {
                if($(this).is(':checked')) {
                    $('#review-form').css('display','block');
                }
            });
            $('.real_review').click(function() {
                if($(this).is(':checked')) {
                    $('#review-form').css('display','none');
                }
            });
        });
    </script>
@endsection
