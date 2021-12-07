<?php

namespace App\Http\Controllers;

use App\Models\FakeReview;
use App\Models\FontFamily;
use App\Models\Product;
use App\Models\Question;
use App\Models\Review;
use App\Models\ThemeSetting;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
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
        $fonts = FontFamily::get();
        return view('pages.settings')->with([
            'setting'=>$setting,
            'fonts'=>$fonts,
        ]);
    }
    public function SettingSave(Request $request){
        $shop = User::where('name',$request->shop_name)->first();
        $product = $shop->api()->rest('post', '/admin/products.json',
            "products",
            [
                "product" => [
                    "title" => "Burton Custom Freestyle 151",
                    "body_html" => "<strong>Good snowboard!</strong>",
                    "vendor" => "Burton",
                    "product_type" => "Snowboard",
                    "variants" => [
                        "option1"=>"Blue", "option2"=>"155", "option1"=>"Black", "option2"=>"159"
                 ],
                  "options" => ["name"=>"Color", "values"=>["Blue", "Black"], "name"=>"Size", "values"=>["155", "159"]]
                ]
              ]
        );
        dd($product);
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
            $shopsetting->font_family = $request->font_family;
            $shopsetting->button_text = $request->button_text;
            $shopsetting->button_bg = $request->button_bg;
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
        $shop = User::where('name',$request->shop_name)->first();
        $status = 'real';
        $review_status = FakeReview::where('shop_id',$shop->id)->where('product_id',$request->product_id)->first();
        if ($review_status !=null){
            if ($review_status->status == 'fake'){
                $status = 'fake';
            }
        }

        $reviews_featured = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('feature','featured')->where('status','publish')->latest()->get();
        $reviews_publish  = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('feature','unfeatured')->where('status','publish')->latest()->get();
        $reviews_pagi_fea = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('feature','featured')->where('status','publish')->latest()->paginate(5);
        $reviews_pagi_pub  = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('feature','unfeatured')->where('status','publish')->latest()->paginate(5);
        $total_five_star = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('status','publish')->where('review_rating',5)->count();
        $total_four_star = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('status','publish')->where('review_rating',4)->count();
        $total_three_star = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('status','publish')->where('review_rating',3)->count();
        $total_two_star = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('status','publish')->where('review_rating',2)->count();
        $total_one_star = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('status','publish')->where('review_rating',1)->count();

        $count_reviews = count($reviews_featured) + count($reviews_publish);
        $real_reviews = $count_reviews;
        $count_rating =  $reviews_featured->sum('review_rating') + $reviews_publish->sum('review_rating');
        if ($count_reviews != 0){
            $over_all_rating = $count_rating / $count_reviews;
            $over_all_rating = number_format($over_all_rating,1);
        }else{
            $over_all_rating = 0 ;
        }
        $rating_value = intval(round($over_all_rating));
        $review_images = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('status','publish')->latest()->get();
        $images = view('append.images')->with([
            'reviews_images' => $review_images,
        ])->render();
        $popups = view('append.popups')->with([
            'reviews_popups' => $review_images,
        ])->render();
        if ($status == 'fake'){
            $count_reviews = $review_status->total_reviews;
            $over_all_rating = $review_status->rating;
            $rating_value = $review_status->rating;
            $rating_value = intval(round($rating_value));
            $total_five_star  = $review_status->five_star;
            $total_four_star = $review_status->four_star;
            $total_three_star = $review_status->three_star;
            $total_two_star = $review_status->two_star;
            $total_one_star = $review_status->one_star;
        }
        $questions_publish  = Question::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('status','publish')->latest()->get();
        $questions_pagination  = Question::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('status','publish')->latest()->paginate(5);
        $total_question = count($questions_publish);
        $display_setting = ThemeSetting::where('shop_id',$shop->id)->first();
        $html = view('append.html')->with([
            'reviews_featured' => $reviews_pagi_fea,
            'reviews_publish' => $reviews_pagi_pub,
            'total_reviews'=>$count_reviews,
            'total_rating'=>$over_all_rating,
            'review_value'=>$rating_value,
            'five_star'=>$total_five_star,
            'four_star'=>$total_four_star,
            'three_star'=>$total_three_star,
            'two_star'=>$total_two_star,
            'one_star'=>$total_one_star,
            'review_images'=>$images,
            'popups'=>$popups,
            'real_reviews'=>$real_reviews,
            'status'=>$status,
            'reviews_images' => $review_images,
            'reviews_popups'=>$review_images,
            'questions_publish' => $questions_pagination,
            'total_question'=>$total_question,
            'display'=>$display_setting,
        ])->render();
        return response([
            'html'=>$html,
            'paginate_q'=>json_decode(json_encode($questions_pagination)),
            'paginate'=>json_decode(json_encode($reviews_pagi_pub)),
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
    public function ProductPage(Request $request){
        $review = Review::where('id',$request->review_id)->first();
        $product = Product::where('shopify_id',$review->product_id)->first();
        $shop = User::where('id',$review->shop_id)->first();
        $link = 'https://'.$shop->name.'/products/'.$product->handle;
        return response([
            'link'=>$link,
        ]);
    }
}
