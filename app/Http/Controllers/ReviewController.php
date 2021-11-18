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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Stevebauman\Location\Facades\Location;

class ReviewController extends Controller
{
    public function ReviewRequest(){
        $shop = Auth::user();
        $reviews = Review::where('shop_id',$shop->id)->latest()->paginate(10);
        return view('pages.review-requests')->with([
            'reviews'=>$reviews,
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
        return Redirect::tokenRedirect('review.request', ['notice' => 'Review UnFeatured Successfully']);
        }
        if ($review->feature == 'featured'){
            return Redirect::tokenRedirect('review.request', ['notice' => 'Review Featured Successfully']);
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
            return Redirect::tokenRedirect('review.request', ['notice' => 'Review pending Successfully']);
        }
        if ($review->pending_status == 'unpending'){
            return Redirect::tokenRedirect('review.request', ['notice' => 'Review Unpending Successfully']);
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
            return Redirect::tokenRedirect('review.request', ['notice' => 'Review Publish Successfully']);
        }
        if ($review->status == 'unpublish'){
            return Redirect::tokenRedirect('review.request', ['notice' => 'Review UnPublish Successfully']);
        }
        if ($review->status == 'rejected'){
            return Redirect::tokenRedirect('review.request', ['notice' => 'Review Rejected Successfully']);
        }
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
            return Redirect::tokenRedirect('review.request', ['notice' => 'Status has been changed Successfully']);
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
            return Redirect::tokenRedirect('review.request', ['notice' => 'Review Archived Successfully']);
        }
        if ($review->archive_status == 'unarchive'){
            return Redirect::tokenRedirect('review.request', ['notice' => 'Review UnArchived Successfully']);
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
//            $ip = $request->ip(); //Dynamic IP address get
//        $currentUserInfo = Location::get($ip);
//        $review->customer_location = $currentUserInfo->countryName;
        $review->save();
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
            ]);
        }

    }
    public function ReviewUpdate(Request $request){
        $review = Review::where('id',$request->review_id)->first();
        $review->review_rating = $request->review_rating;
        $review->review_title = $request->review_title;
        $review->likes = $request->dislikes;
        $review->dislikes = $request->dislikes;
        $review->customer_location = $request->customer_location;
        $review->experience = $request->experience;
        $review->real_fake = 'fake';
        $review->created_at = $request->created_at;
        $review->save();
        return Redirect::tokenRedirect('review.request', ['notice' => 'Review Updated Successfully']);
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
        return Redirect::tokenRedirect('review.request', ['notice' => 'Photo added Successfully']);
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
        return Redirect::tokenRedirect('review.request', ['notice' => 'Replied Successfully']);
    }

    public function ReplyDelete ($id){
        $reply = ReviewReply::where('id',$id)->first();
        $reply->delete();
        return Redirect::tokenRedirect('review.request', ['notice' => 'Deleted Successfully']);
    }
    public function ReviewDelete($id){
        $review = Review::where('id',$id)->first();
        $review->status = 'rejected';
        $review->save();
        return Redirect::tokenRedirect('review.request', ['notice' => 'Review Rejected  Successfully']);
    }
    public function AppendReviews(Request $request){
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
        $total_five_star = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('status','publish')->where('review_rating',5)->count();
        $total_four_star = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('status','publish')->where('review_rating',4)->count();
        $total_three_star = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('status','publish')->where('review_rating',3)->count();
        $total_two_star = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('status','publish')->where('review_rating',2)->count();
        $total_one_star = Review::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('status','publish')->where('review_rating',1)->count();
        $reviews = view('append.reviews')->with([
            'reviews_featured' => $reviews_featured,
            'reviews_publish' => $reviews_publish
        ])->render();
        $count_reviews = count($reviews_featured) + count($reviews_publish);
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
            'reviews' => $review_images,
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
        return response([
            'reviews'=>$reviews,
            'total_reviews'=>$count_reviews,
            'total_rating'=>$over_all_rating,
            'review_value'=>$rating_value,
            'five_star'=>$total_five_star,
            'four_star'=>$total_four_star,
            'three_star'=>$total_three_star,
            'two_star'=>$total_two_star,
            'one_star'=>$total_one_star,
            'review_images'=>$images,
        ]);
    }
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

}
