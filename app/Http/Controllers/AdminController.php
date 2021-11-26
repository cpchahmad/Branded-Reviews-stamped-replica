<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Question;
use App\Models\Review;
use App\Models\ThemeSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index(){
        return view('home');
    }
    public function ThemeSettings(){
        $shop = Auth::user();
        $setting = ThemeSetting::where('shop_id',$shop->id)->first();
        return view('pages.settings')->with([
            'setting'=>$setting,
        ]);
    }
    public function SettingSave(Request $request){
        $shop = User::where('name',$request->shop_name)->first();
        $shopsetting = ThemeSetting::where('shop_id',$shop->id)->first();
        if ($shopsetting == null){
            $shopsetting = new ThemeSetting();
        }
            $shopsetting->shop_id = $shop->id;
            $shopsetting->stars = $request->rating_star;
            $shopsetting->filled_stars = $request->filled_star;
            $shopsetting->unfilled_stars = $request->unfilled_star;
            $shopsetting->bar_filled = $request->filled_bar;
            $shopsetting->bar_unfilled = $request->unfilled_bar;
            $shopsetting->text = $request->text_color;
            $shopsetting->tabs_background = $request->tabs_bg;
            $shopsetting->tabs_counter_background = $request->tabs_counter;
            $shopsetting->tabs_border_bottom = $request->tabs_bottom;
            $shopsetting->circle_background = $request->circle_bg;
            $shopsetting->circle_text = $request->circle_text;
            $shopsetting->reply_border = $request->reply_border;
            $shopsetting->save();
        return Redirect::tokenRedirect('settings', ['notice' => 'Settings Saved Successfully']);
    }
    public function GetSetting(Request $request){
        $shop = User::where('name',$request->shop_name)->first();
        $shopsetting = ThemeSetting::where('shop_id',$shop->id)->first();
        if (isset($shopsetting)){
            $setting = [
                'stars'=>$shopsetting->stars,
                'filled_stars'=>$shopsetting->filled_stars,
                'unfilled_stars'=>$shopsetting->unfilled_stars,
                'bar_filled'=>$shopsetting->bar_filled,
                'bar_unfilled'=>$shopsetting->bar_unfilled,
                'text'=>$shopsetting->text,
                'tabs_background'=>$shopsetting->tabs_background,
                'tabs_counter_background'=>$shopsetting->tabs_counter_background,
                'tabs_border_bottom'=>$shopsetting->tabs_border_bottom,
                'circle_background'=>$shopsetting->circle_background,
                'circle_text'=>$shopsetting->circle_text,
                'reply_border'=>$shopsetting->reply_border,
            ];
        }
        if (isset($shopsetting)){
            return response([
                'setting'=>$setting,
            ]);
        }else{
            return response([
                'setting'=>'NoSetting',
            ]);
        }
    }
    public function HtmlAppend(Request $request){
        $html = view('append.html')->render();
        return response([
            'html'=>$html,
        ]);
    }
    public function ShareFacebook(Request $request){
        $review = Review::where('id',$request->review_id)->first();
        $product = Product::where('shopify_id',$review->product_id)->first();
        $shop = User::where('id',$review->shop_id)->first();
        return \redirect('https://'.$shop->name.'/products/'.$product->handle);
    }
    public function ShareFacebookQ(Request $request){
        $question = Question::where('id',$request->question_id)->first();
        $product = Product::where('shopify_id',$question->product_id)->first();
        $shop = User::where('id',$question->shop_id)->first();
        return \redirect('https://'.$shop->name.'/products/'.$product->handle);
    }
    public function ShareTwitter(Request $request){
        $review = Review::where('id',$request->review_id)->first();
        $product = Product::where('shopify_id',$review->product_id)->first();
        $shop = User::where('id',$review->shop_id)->first();
        return \redirect('https://'.$shop->name.'/products/'.$product->handle);
    }
    public function LoadScript(){
        return view('append.script');
    }

}
