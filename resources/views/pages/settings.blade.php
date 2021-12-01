@extends('layouts.app')
@section('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Amatic+SC&family=Bangers&family=Caveat&family=Courgette&family=Indie+Flower&family=Kaushan+Script&family=Lobster&family=Lobster+Two&family=Montserrat:wght@100&family=Open+Sans:wght@300&family=Orbitron&family=Pacifico&family=Patrick+Hand&family=Rajdhani:wght@300&family=Raleway:wght@100&family=Righteous&family=Roboto:wght@100&family=Sacramento&family=Satisfy&display=swap" rel="stylesheet">
@endsection
@section('content')
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
                                    <label for="#">Select Font Family</label>
                                <select class="form-control bg-white" name="font_family" id="">
                                    <option selected disabled value="reviews">Select</option>
                                    <option style="font-family: Courgette"  @if(isset($setting->font_family) && $setting->font_family == 'Bungee') selected @endif value="Bungee">Bungee</option>
                                    <option style="font-family: Lobster"  @if(isset($setting->font_family) && $setting->font_family == 'Indie Flower') selected @endif value="Indie Flower">Indie Flower</option>
                                    <option style="font-family: Sacramento" @if(isset($setting->font_family) && $setting->font_family == 'Passion One') selected @endif value="Passion One">Passion One</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Lobster') selected @endif value="Lobster">Lobster</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Shadows Into Light') selected @endif value="Shadows Into Light">Shadows Into Light</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Pacifico') selected @endif value="Pacifico">Pacifico</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Amatic SC') selected @endif value="Amatic SC">Amatic SC</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Dancing Script') selected @endif value="Dancing Script">Dancing Script</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Sigmar One') selected @endif value="Sigmar One">Sigmar One</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Bangers') selected @endif value="Bangers">Bangers</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Chewy') selected @endif value="Chewy">Chewy</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Cherry Swash') selected @endif value="Cherry Swash">Cherry Swash</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Open Sans') selected @endif value="Open Sans">Open Sans</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Roboto') selected @endif value="Roboto">Roboto</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Lato') selected @endif value="Lato">Lato</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Source Sans Pro') selected @endif value="Source Sans Pro">Source Sans Pro</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Raleway') selected @endif value="Raleway">Raleway</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Ubuntu') selected @endif value="Ubuntu">Ubuntu</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Droid Sans') selected @endif value="Droid Sans">Droid Sans</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Arimo') selected @endif value="Arimo">Arimo</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'PT Sans Narrow') selected @endif value="PT Sans Narrow">PT Sans Narrow</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Noto Sans') selected @endif value="Noto Sans">Noto Sans</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Slabo') selected @endif value="Slabo">Slabo</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Lora') selected @endif value="Lora">Lora</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Roboto Slab') selected @endif value="Roboto Slab">Roboto Slab</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Droid Serif') selected @endif value="Droid Serif">Droid Serif</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'PT Serif') selected @endif value="PT Serif">PT Serif</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Bitter') selected @endif value="Bitter">Bitter</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Playfair Display') selected @endif value="Playfair Display">Playfair Display</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Arvo') selected @endif value="Arvo">Arvo</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Noto Serif') selected @endif value="Noto Serif">Noto Serif</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Libre Baskerville') selected @endif value="Libre Baskerville">Libre Baskerville</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Source Code Pro') selected @endif value="Source Code Pro">Source Code Pro</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Inconsolata') selected @endif value="Inconsolata">Inconsolata</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'VT323') selected @endif value="VT323">VT323</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Anonymous Pro') selected @endif value="Anonymous Pro">Anonymous Pro</option>
                                    <option @if(isset($setting->font_family) && $setting->font_family == 'Cutive Mono') selected @endif value="Cutive Mono">Cutive Mono</option>
                                </select>
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
