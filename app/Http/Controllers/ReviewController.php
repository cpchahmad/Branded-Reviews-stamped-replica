<?php

namespace App\Http\Controllers;

use App\Models\FakeReview;
use App\Models\Product;
use App\Models\Question;
use App\Models\Review;
use App\Models\ReviewMedia;
use App\Models\ReviewStat;
use App\Models\User;
use App\Models\ReviewReply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Stevebauman\Location\Facades\Location;

class ReviewController extends Controller
{
    public function ReviewRequest(){
        $shop = Auth::user();
        $products = Product::where('shop_id',$shop->id)->get();
        $reviews = Review::where('shop_id',$shop->id)->latest()->paginate(10);
        return view('pages.review-requests')->with([
            'reviews'=>$reviews,
            'products'=>$products,
        ]);
    }
    public function ReviewDetail($id){
        $shop = Auth::user();
        $review = Review::where('id',$id)->first();
        $product_five_star = Review::where('shop_id',$shop->id)->where('product_id',$review->product_id)->where('status','publish')->where('review_rating',5)->count();
        $product_four_star = Review::where('shop_id',$shop->id)->where('product_id',$review->product_id)->where('status','publish')->where('review_rating',4)->count();
        $product_three_star = Review::where('shop_id',$shop->id)->where('product_id',$review->product_id)->where('status','publish')->where('review_rating',3)->count();
        $product_two_star = Review::where('shop_id',$shop->id)->where('product_id',$review->product_id)->where('status','publish')->where('review_rating',2)->count();
        $product_one_star = Review::where('shop_id',$shop->id)->where('product_id',$review->product_id)->where('status','publish')->where('review_rating',1)->count();
        $product_total_reviews = Review::where('shop_id',$shop->id)->where('product_id',$review->product_id)->where('status','publish')->count();
        $product_title = Product::where('shop_id',$shop->id)->where('shopify_id',$review->product_id)->first();
        return view('pages.review-detail')->with([
            'review'=>$review,
            'product_title'=>$product_title,
            'five_star'=>$product_five_star,
            'four_star'=>$product_four_star,
            'three_star'=>$product_three_star,
            'two_star'=>$product_two_star,
            'one_star'=>$product_one_star,
            'total_reviews'=>$product_total_reviews,
        ]);
    }
    public function ReviewFeature($id){
        $review = Review::where('id',$id)->first();
        $featured_status = $review->feature;
        if ($featured_status == 'unfeatured'){
            $review->feature = 'featured';
        }
        if ($featured_status == 'featured'){
            $review->feature = 'unfeatured';
        }
        $review->save();
        if ($review->feature == 'unfeatured'){
        return Redirect::tokenRedirect('review.view', ['id' => $id,'notice' => 'Review UnFeatured Successfully']);
        }
        if ($review->feature == 'featured'){
            return Redirect::tokenRedirect('review.view', ['id' => $id,'notice' => 'Review Featured Successfully']);
        }
    }
    public function ReviewPending($id){
        $review = Review::where('id',$id)->first();
        $status = $review->pending_status;
        if ($status == 'pending'){
            $review->pending_status = 'unpending';
            $review->status = 'unpublish';
        }
        if ($status == 'unpending'){
            $review->pending_status = 'pending';
        }
        $review->save();
        if ($review->pending_status == 'pending'){
            return Redirect::tokenRedirect('review.view', ['id' => $id,'notice' => 'Review pending Successfully']);
        }
        if ($review->pending_status == 'unpending'){
            return Redirect::tokenRedirect('review.view', ['id' => $id,'notice' => 'Review Activated Successfully']);
        }
    }
    public function ReviewPublish($id){
        $review = Review::where('id',$id)->first();
        $status = $review->status;
        if ($status == 'publish'){
            $review->status = 'unpublish';
        }
        if ($status == 'unpublish'){
            $review->status = 'publish';
        }
        if ($status == 'rejected'){
            $review->status = 'publish';
        }
        $review->save();
        if ($review->status == 'publish'){
            return Redirect::tokenRedirect('review.view', ['id' => $id,'notice' => 'Review Publish Successfully']);
        }
        if ($review->status == 'unpublish'){
            return Redirect::tokenRedirect('review.view', ['id' => $id,'notice' => 'Review UnPublish Successfully']);
        }
        if ($review->status == 'rejected'){
            return Redirect::tokenRedirect('review.view', ['id' => $id,'notice' => 'Review Rejected Successfully']);
        }
//            return \redirect()->back();
    }
    public function ReviewVerify($id){
        $review = Review::where('id',$id)->first();
        $status = $review->verify_status;
        if ($status == 'verify'){
            $review->verify_status = 'verified';
        }
        if ($status == 'verified'){
            $review->verify_status = 'verify';
        }
        $review->save();
            return Redirect::tokenRedirect('review.view', ['id' => $id,'notice' => 'Status has been changed Successfully']);
    }
    public function ReviewArvhive($id){
        $review = Review::where('id',$id)->first();
        $status = $review->archive_status;
        if ($status == 'archive'){
            $review->archive_status = 'unarchive';
        }
        if ($status == 'unarchive'){
            $review->archive_status = 'archive';
        }
        $review->save();

        if ($review->archive_status == 'archive'){
            $review->status = 'unpublish';
        }
        $review->save();

        if ($review->archive_status == 'archive'){
            return Redirect::tokenRedirect('review.view', ['id' => $id,'notice' => 'Review Archived Successfully']);
        }
        if ($review->archive_status == 'unarchive'){
            return Redirect::tokenRedirect('review.view', ['id' => $id,'notice' => 'Review UnArchived Successfully']);
        }
    }
    public function ReviewSubmit(Request $request){



        $shop = User::where('name',$request->shop_name)->first();
        $review = new Review();
        $review->product_id = $request->product_id;
        $review->shop_id = $shop->id;
        $review->name = $request->name;
        $review->email = $request->email;
        if ($request->has('review_status')){
            $review->real_fake = $request->review_status;
            $review->likes = $request->likes;
            $review->dislikes = $request->dislikes;
        }
        if ($request->review_rating == null){
            $review->review_rating = 0;
        }else{
        $review->review_rating = $request->review_rating;
        }
        $review->review_title = $request->review_title;
        $review->experience = $request->experience;
        if ($request->has('review_status')){
            $review->customer_location = $request->customer_location;
            $review->country_code = strtolower($request->country_code);
        }else{
            $ip = $request->ip();
            $currentUserInfo = Location::get($ip);
            $review->customer_location = $currentUserInfo->countryName;
            $review->country_code = strtolower($currentUserInfo->countryCode);
        }
        $review->save();

        $productcontroller = new ProductController();
        $productcontroller->AddUpdateMetafield($request->product_id,$shop);
//        $facebook_share_link = 'https://www.facebook.com/sharer/sharer.php?u=https://phpstack-176572-2275881.cloudwaysapps.com/on-facebook?review_id='.$review->id.'&display=popup';
        $facebook_share_link = 'https://www.facebook.com/sharer/sharer.php?u=https://phpstack-772196-2624032.cloudwaysapps.com/on-facebook?review_id='.$review->id.'&display=popup';
//        $twitter_share_link = 'https://twitter.com/intent/tweet?url=https://phpstack-176572-2275881.cloudwaysapps.com/on-twitter?review_id='.$review->id;
        $twitter_share_link = 'https://twitter.com/intent/tweet?url=https://phpstack-772196-2624032.cloudwaysapps.com/on-twitter?review_id='.$review->id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = 'review-images/';
            $filename = now()->format('YmdHi') . str_replace([' ', '(', ')'], '-', $image->getClientOriginalName());
            $image->move($destinationPath, $filename);
            $review_media = new ReviewMedia();
            $review_media->review_id = $review->id;
            $review_media->review_media = $filename;
            $review_media->save();
        }
        if ($request->has('review_status')){
            return Redirect::tokenRedirect('products', ['notice' => 'Review Submited Successfully']);
        }else{
            return response([
                'success'=>'submited',
                'facebook_link'=>$facebook_share_link,
                'twitter_link'=>$twitter_share_link,
            ]);
        }

    }
    public function ReviewUpdate(Request $request){
        $shop = Auth::user();
        $review = Review::where('id',$request->review_id)->first();
        $review->review_rating = $request->review_rating;
        $review->review_title = $request->review_title;
        $review->likes = $request->likes;
        $review->dislikes = $request->dislikes;
        $review->customer_location = $request->customer_location;
        $review->country_code = strtolower($request->country_code);
        $review->experience = $request->experience;
        $review->real_fake = 'fake';
        $review->created_at = $request->created_at;
        $review->save();
        $productcontroller = new ProductController();
        $productcontroller->AddUpdateMetafield($review->product_id,$shop);
        $product_meta = $shop->api()->rest('GET', '/admin/products/'.$review->product_id.'/metafields.json');
        return Redirect::tokenRedirect('review.view', ['id' => $review->id,'notice' => 'Review Updated Successfully']);
    }
    public function ReviewAddPhoto(Request $request){
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = 'review-images/';
            $filename = now()->format('YmdHi') . str_replace([' ', '(', ')'], '-', $image->getClientOriginalName());
            $image->move($destinationPath, $filename);
            $review_media = new ReviewMedia();
            $review_media->review_id = $request->review_id;
            $review_media->review_media = $filename;
            $review_media->save();
        }
        return Redirect::tokenRedirect('review.view', ['id' => $request->review_id,'notice' => 'Photo added Successfully']);
    }
    public function UpdatePhotos(Request $request){
        $photo_ids = [];
        if ($request->photo_id != null) {
                foreach ($request->photo_id as $id) {
                        array_push($photo_ids, $id);
                }
            $photos_update = ReviewMedia::where('review_id',$request->review_id)->whereNotIn('id', $photo_ids)->delete();
        }
        return Redirect::tokenRedirect('review.view', ['id' => $request->review_id,'notice' => 'Photos updated Successfully']);
    }

    public function ReviewReply(Request $request){
        $reply = ReviewReply::where('review_id',$request->review_id)->first();
        if ($reply == null){
            $reply = new ReviewReply();
        }
        $store = Auth::user();
        $store_name = (explode(".myshopify.com",$store->name));
        $reply->review_id = $request->review_id;
        $reply->message = $request->message;
        $reply->store_name = ucfirst($store_name[0]);
        $reply->save();
        return Redirect::tokenRedirect('review.view', ['id' => $request->review_id,'notice' => 'Replied Successfully']);
    }

    public function ReplyDelete ($id){
        $reply = ReviewReply::where('id',$id)->first();
        $reply->delete();
        return Redirect::tokenRedirect('review.view', ['id' => $reply->review_id,'notice' => 'Deleted Successfully']);
    }
    public function ReviewDelete($id){
        $shop = Auth::user();
        $review = Review::where('id',$id)->first();
        $review->status = 'rejected';
        $review->save();
        $productcontroller = new ProductController();
        $productcontroller->AddUpdateMetafield($review->product_id,$shop);
        return Redirect::tokenRedirect('review.request', ['notice' => 'Review Rejected  Successfully']);
    }
//    public function AppendReviews(Request $request){
//        $shop = User::where('name',$request->shop_name)->first();
//        $status = 'real';
//        $review_status = FakeReview::where('shop_id',$shop->id)->where('product_id',$request->product_id)->first();
//        if ($review_status !=null){
//            if ($review_status->status == 'fake'){
//                $status = 'fake';
//            }
//        }
//
//        $reviews_featured = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('feature','featured')->where('status','publish')->latest()->get();
//        $reviews_publish  = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('feature','unfeatured')->where('status','publish')->latest()->get();
//        $reviews_pagi_fea = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('feature','featured')->where('status','publish')->latest()->paginate(5);
//        $reviews_pagi_pub  = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('feature','unfeatured')->where('status','publish')->latest()->paginate(5);
//        $total_five_star = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('status','publish')->where('review_rating',5)->count();
//        $total_four_star = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('status','publish')->where('review_rating',4)->count();
//        $total_three_star = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('status','publish')->where('review_rating',3)->count();
//        $total_two_star = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('status','publish')->where('review_rating',2)->count();
//        $total_one_star = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('status','publish')->where('review_rating',1)->count();
//        $reviews = view('append.reviews')->with([
//            'reviews_featured' => $reviews_pagi_fea,
//            'reviews_publish' => $reviews_pagi_pub
//        ])->render();
//        $count_reviews = count($reviews_featured) + count($reviews_publish);
//        $real_reviews = $count_reviews;
//        $count_rating =  $reviews_featured->sum('review_rating') + $reviews_publish->sum('review_rating');
//        if ($count_reviews != 0){
//        $over_all_rating = $count_rating / $count_reviews;
//        $over_all_rating = number_format($over_all_rating,1);
//        }else{
//            $over_all_rating = 0 ;
//        }
//        $rating_value = intval(round($over_all_rating));
//        $review_images = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('status','publish')->latest()->get();
//        $images = view('append.images')->with([
//            'reviews' => $review_images,
//        ])->render();
//        $popups = view('append.popups')->with([
//            'reviews' => $review_images,
//        ])->render();
//        if ($status == 'fake'){
//            $count_reviews = $review_status->total_reviews;
//            $over_all_rating = $review_status->rating;
//            $rating_value = $review_status->rating;
//            $rating_value = intval(round($rating_value));
//            $total_five_star  = $review_status->five_star;
//            $total_four_star = $review_status->four_star;
//            $total_three_star = $review_status->three_star;
//            $total_two_star = $review_status->two_star;
//            $total_one_star = $review_status->one_star;
//        }
//
//        return response([
//            'paginate'=>json_decode(json_encode($reviews_pagi_pub)),
//            'reviews'=>$reviews,
//            'total_reviews'=>$count_reviews,
//            'total_rating'=>$over_all_rating,
//            'review_value'=>$rating_value,
//            'five_star'=>$total_five_star,
//            'four_star'=>$total_four_star,
//            'three_star'=>$total_three_star,
//            'two_star'=>$total_two_star,
//            'one_star'=>$total_one_star,
//            'review_images'=>$images,
//            'popups'=>$popups,
//            'real_reviews'=>$real_reviews,
//            'status'=>$status,
//        ]);
//    }
    public function AddNewReview($id){
        return view('pages.new-review')->with([
            'product_id'=>$id,
        ]);
    }

    public function UpdateLikes(Request $request){
        $shop = User::where('name',$request->shop_name)->first();
        $review_stat = ReviewStat::where('review_id',$request->review_id)->where('ip_address',$request->ip())->first();
        $status = 'no';
        if ($review_stat == null){
            $review_stat = new ReviewStat();
            $status = 'yes';
        }
        $review_stat->review_id = $request->review_id;
        $review_stat->like = 1;
        $review_stat->dislike = 0;
        $review_stat->ip_address= $request->ip();
        $review_stat->save();
        $review = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('id',$request->review_id)->first();
        if($status == 'yes'){
        $review->likes += 1;
        }else{
            $review->likes += 1;
            $review->dislikes -= 1;
        }
        $review->save();
        return response([
            'likes'=>$review->likes,
            'dislikes'=>$review->dislikes,
        ]);
    }
    public function UpdateDisLikes(Request $request){
        $shop = User::where('name',$request->shop_name)->first();
        $review_stat = ReviewStat::where('review_id',$request->review_id)->where('ip_address',$request->ip())->first();
        $status = 'no';
        if ($review_stat == null){
            $review_stat = new ReviewStat();
            $status = 'yes';
        }
        $review_stat->review_id = $request->review_id;
        $review_stat->dislike = 1;
        $review_stat->like = 0;
        $review_stat->ip_address= $request->ip();
        $review_stat->save();

        $review = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('id',$request->review_id)->first();
        if ($status == 'yes'){
            $review->dislikes += 1;
        }else{
            $review->dislikes += 1;
            $review->likes -= 1;
        }
        $review->save();
        return response([
            'likes'=>$review->likes,
            'dislikes'=>$review->dislikes,
        ]);
    }
    public function FilterReviews(Request $request){
        $shop = User::where('name',$request->shop_name)->first();
        if ($request->filter_value == 'sort' ) {
            $reviews_pagi_fea = Review::where('shop_id', $shop->id)->where('product_id', $request->product_id)->where('feature', 'featured')->where('status', 'publish')->latest()->get();
            $reviews_pagi_pub = Review::where('shop_id', $shop->id)->where('product_id', $request->product_id)->where('feature', 'unfeatured')->where('status', 'publish')->latest()->get();
            $reviews = view('append.reviews')->with([
                'reviews_featured' => $reviews_pagi_fea,
                'reviews_publish' => $reviews_pagi_pub
            ])->render();
        }
        if ($request->filter_value == 'most_recent' ) {
            $reviews_pagi_fea = Review::where('shop_id', $shop->id)->where('product_id', $request->product_id)->where('feature', 'featured')->where('status', 'publish')->latest()->get();
            $reviews_pagi_pub = Review::where('shop_id', $shop->id)->where('product_id', $request->product_id)->where('feature', 'unfeatured')->where('status', 'publish')->latest()->get();
            $reviews = view('append.reviews')->with([
                'reviews_featured' => $reviews_pagi_fea,
                'reviews_publish' => $reviews_pagi_pub
            ])->render();
        }
        if ($request->filter_value == 'heighest_rating' ) {
            $reviews_pagi_fea = Review::where('shop_id', $shop->id)->where('product_id', $request->product_id)->where('feature', 'featured')->where('status', 'publish')->orderBy('review_rating','desc')->get();
            $reviews_pagi_pub = Review::where('shop_id', $shop->id)->where('product_id', $request->product_id)->where('feature', 'unfeatured')->where('status', 'publish')->orderBy('review_rating','desc')->get();
            $reviews = view('append.reviews')->with([
                'reviews_featured' => $reviews_pagi_fea,
                'reviews_publish' => $reviews_pagi_pub
            ])->render();
        }
        if ($request->filter_value == 'lowest_rating' ) {
            $reviews_pagi_fea = Review::where('shop_id', $shop->id)->where('product_id', $request->product_id)->where('feature', 'featured')->where('status', 'publish')->orderBy('review_rating','asc')->get();
            $reviews_pagi_pub = Review::where('shop_id', $shop->id)->where('product_id', $request->product_id)->where('feature', 'unfeatured')->where('status', 'publish')->orderBy('review_rating','asc')->get();
            $reviews = view('append.reviews')->with([
                'reviews_featured' => $reviews_pagi_fea,
                'reviews_publish' => $reviews_pagi_pub
            ])->render();
        }
        if ($request->filter_value == 'most_helpful' ) {
            $reviews_pagi_fea = Review::where('shop_id', $shop->id)->where('product_id', $request->product_id)->where('feature', 'featured')->where('status', 'publish')->orderBy('likes','desc')->get();
            $reviews_pagi_pub = Review::where('shop_id', $shop->id)->where('product_id', $request->product_id)->where('feature', 'unfeatured')->where('status', 'publish')->orderBy('likes','desc')->get();
            $reviews = view('append.reviews')->with([
                'reviews_featured' => $reviews_pagi_fea,
                'reviews_publish' => $reviews_pagi_pub
            ])->render();
        }

        if ($reviews_pagi_fea || $reviews_pagi_pub != null){
            return response([
                'paginate'=>json_decode(json_encode($reviews_pagi_pub)),
                'reviews'=>$reviews,
            ]);
        }else{
            return response([
                'reviews'=>'no reviews',
            ]);
        }

    }
    public function ReviewsFilter(Request $request){
        $shop = Auth::user();
        $products = Product::where('shop_id',$shop->id)->get();
        $reviews = Review::where('shop_id',$shop->id)->newQuery();
        if ($request->filled('date-range')){
            if ($request->input('date-range') != 'Select Date Range') {
                $date_range = explode('-', $request->input('date-range'));
                $start_date = $date_range[0];
                $end_date = $date_range[1];
                $comparing_start_date = Carbon::parse($start_date)->format('Y-m-d') . ' 00:00:00';
                $comparing_end_date = Carbon::parse($end_date)->format('Y-m-d') . ' 23:59:59';
                $reviews = $reviews->whereBetween('created_at', [$comparing_start_date, $comparing_end_date])->newQuery();
            }
        }

        if ($request->filled('review_status')){
            if ($request->input('review_status') != 'status') {
                if ($request->input('review_status') == 'publish'){
                    $reviews = $reviews->where('status', $request->input('review_status'))->newQuery();
                }
                if ($request->input('review_status') == 'pending'){
                    $reviews = $reviews->where('pending_status', $request->input('review_status'))->newQuery();
                }
                if ($request->input('review_status') == 'archive'){
                    $reviews = $reviews->where('archive_status', $request->input('review_status'))->newQuery();
                }
                if ($request->input('review_status') == 'featured'){
                    $reviews = $reviews->where('feature', $request->input('review_status'))->newQuery();
                }
            }
        }
        if ($request->filled('product')){
            if ($request->input('product') != 'product') {
                $reviews = $reviews->where('product_id', $request->input('product'))->newQuery();
            }
        }

        if ($request->filled('email_title_desc')){
                $reviews = $reviews->where('review_title', 'LIKE', '%' . $request->input('email_title_desc') . '%')->orWhere('email','LIKE', '%' . $request->input('email_title_desc') . '%')->orWhere('experience','LIKE', '%' . $request->input('email_title_desc') . '%')->newQuery();
        }
        if ($request->filled('review_stars')){
            if ($request->input('review_stars') != 'reviews') {
                $reviews = $reviews->where('review_rating', $request->input('review_stars'))->newQuery();
            }
        }
        $reviews = $reviews->paginate(10);
        return view('pages.review-requests')->with([
            'reviews'=>$reviews,
            'date_range' => $request->input('date-range'),
            'review_stars'=>$request->input('review_stars'),
            'review_status'=>$request->input('review_status'),
            'product_value'=>$request->input('product'),
            'email_title_desc'=>$request->input('email_title_desc'),
            'products'=>$products,
        ]);
    }
    public function GetPopup(Request $request){
        $image = ReviewMedia::where('id',$request->image_id)->first();
        $review = Review::where('id',$image->review_id)->first();
        $product = Product::where('shopify_id',$review->product_id)->first();

        $popup = view('append.popup')->with([
            'review'=>$review,
            'image'=>$image,
            'product'=>$product,
        ])->render();
        return response([
            'popup'=>$popup,
        ]);
    }
    public function FilterOnStars(Request $request){
        $shop = User::where('name',$request->shop_name)->first();
        if ($request->data == 5 ) {
            $reviews_pagi_fea = Review::where('shop_id', $shop->id)->where('product_id', $request->product_id)->where('feature', 'featured')->where('status', 'publish')->where('review_rating',5)->latest()->get();
            $reviews_pagi_pub = Review::where('shop_id', $shop->id)->where('product_id', $request->product_id)->where('feature', 'unfeatured')->where('status', 'publish')->where('review_rating',5)->latest()->get();
            $total_reviews = count($reviews_pagi_fea) + count($reviews_pagi_pub);
            if ($request->status == 'fake'){
                $product = FakeReview::where('shop_id',$shop->id)->where('product_id',$request->product_id)->first();
                $total_reviews = $product->five_star;
            }
            $reviews = view('append.reviews')->with([
                'reviews_featured' => $reviews_pagi_fea,
                'reviews_publish' => $reviews_pagi_pub
            ])->render();
        }
        if ($request->data == 4) {
            $reviews_pagi_fea = Review::where('shop_id', $shop->id)->where('product_id', $request->product_id)->where('feature', 'featured')->where('status', 'publish')->where('review_rating',4)->latest()->get();
            $reviews_pagi_pub = Review::where('shop_id', $shop->id)->where('product_id', $request->product_id)->where('feature', 'unfeatured')->where('status', 'publish')->where('review_rating',4)->latest()->get();
            $total_reviews = count($reviews_pagi_fea) + count($reviews_pagi_pub);
            if ($request->status == 'fake'){
                $product = FakeReview::where('shop_id',$shop->id)->where('product_id',$request->product_id)->first();
                $total_reviews = $product->four_star;
            }
            $reviews = view('append.reviews')->with([
                'reviews_featured' => $reviews_pagi_fea,
                'reviews_publish' => $reviews_pagi_pub
            ])->render();
        }
        if ($request->data == 3) {
            $reviews_pagi_fea = Review::where('shop_id', $shop->id)->where('product_id', $request->product_id)->where('feature', 'featured')->where('status', 'publish')->where('review_rating',3)->get();
            $reviews_pagi_pub = Review::where('shop_id', $shop->id)->where('product_id', $request->product_id)->where('feature', 'unfeatured')->where('status', 'publish')->where('review_rating',3)->get();
            $total_reviews = count($reviews_pagi_fea) + count($reviews_pagi_pub);
            if ($request->status == 'fake'){
                $product = FakeReview::where('shop_id',$shop->id)->where('product_id',$request->product_id)->first();
                $total_reviews = $product->three_star;
            }
            $reviews = view('append.reviews')->with([
                'reviews_featured' => $reviews_pagi_fea,
                'reviews_publish' => $reviews_pagi_pub
            ])->render();
        }
        if ($request->data == 2) {
            $reviews_pagi_fea = Review::where('shop_id', $shop->id)->where('product_id', $request->product_id)->where('feature', 'featured')->where('status', 'publish')->where('review_rating',2)->get();
            $reviews_pagi_pub = Review::where('shop_id', $shop->id)->where('product_id', $request->product_id)->where('feature', 'unfeatured')->where('status', 'publish')->where('review_rating',2)->get();
            $total_reviews = count($reviews_pagi_fea) + count($reviews_pagi_pub);
            if ($request->status == 'fake'){
                $product = FakeReview::where('shop_id',$shop->id)->where('product_id',$request->product_id)->first();
                $total_reviews = $product->two_star;
            }
            $reviews = view('append.reviews')->with([
                'reviews_featured' => $reviews_pagi_fea,
                'reviews_publish' => $reviews_pagi_pub
            ])->render();
        }
        if ($request->data == 1) {
            $reviews_pagi_fea = Review::where('shop_id', $shop->id)->where('product_id', $request->product_id)->where('feature', 'featured')->where('status', 'publish')->where('review_rating',1)->get();
            $reviews_pagi_pub = Review::where('shop_id', $shop->id)->where('product_id', $request->product_id)->where('feature', 'unfeatured')->where('status', 'publish')->where('review_rating',1)->get();
            $total_reviews = count($reviews_pagi_fea) + count($reviews_pagi_pub);
            if ($request->status == 'fake'){
                $product = FakeReview::where('shop_id',$shop->id)->where('product_id',$request->product_id)->first();
                $total_reviews = $product->one_star;
            }
            $reviews = view('append.reviews')->with([
                'reviews_featured' => $reviews_pagi_fea,
                'reviews_publish' => $reviews_pagi_pub
            ])->render();
        }

        if ($reviews_pagi_fea || $reviews_pagi_pub != null){
            return response([
                'paginate'=>json_decode(json_encode($reviews_pagi_pub)),
                'reviews'=>$reviews,
                'total_reviews'=>$total_reviews,
            ]);
        }else{
            return response([
                'reviews'=>'no reviews',
            ]);
        }
    }
}
