<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionReply;
use App\Models\QuestionStat;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class QuestionController extends Controller
{
    public  function QuestionSubmit(Request $request){
        $shop = User::where('name',$request->shop_name)->first();
        $question = new Question();
        $question->product_id = $request->product_id;
        $question->shop_id = $shop->id;
        $question->name = $request->name;
        $question->email = $request->email;
        $question->question = $request->subject;
        if ($request->has('question_status')){
            $question->real_fake = $request->question_status;
        }
        $question->save();
        if ($request->has('question_status')){
            return Redirect::tokenRedirect('products', ['notice' => 'Question Added Successfully']);
        }else{
            return response([
                'success'=>'submited',
            ]);
        }

    }
    public function QuestionRequest(){
        $shop = Auth::user();
        $questions = Question::where('shop_id',$shop->id)->latest()->paginate(10);
        return view('pages.questions')->with([
            'questions'=>$questions,
        ]);
    }
    public function QuestionPublish($id){
        $question = Question::where('id',$id)->first();
        $status = $question->status;
        if ($status == 'publish'){
            $question->status = 'unpublish';
        }
        if ($status == 'unpublish'){
            $question->status = 'publish';
        }
        if ($status == 'rejected'){
            $question->status = 'publish';
        }
        $question->save();
        if ($question->status == 'publish'){
            return Redirect::tokenRedirect('question.request', ['notice' => 'Question Publish Successfully']);
        }
        if ($question->status == 'unpublish'){
            return Redirect::tokenRedirect('question.request', ['notice' => 'Question UnPublish Successfully']);
        }
    }
    public function QuestionView($id){
        $question = Question::where('id',$id)->first();
        return view('pages.question-detail')->with([
            'question'=>$question,
        ]);
    }
    public function QuestionReply(Request $request){
        $reply = QuestionReply::where('question_id',$request->question_id)->first();
        if ($reply == null){
            $reply = new QuestionReply();
        }
        $store = Auth::user();
        $store_name = (explode(".myshopify.com",$store->name));
        $reply->question_id = $request->question_id;
        $reply->message = $request->message;
        $reply->store_name = ucfirst($store_name[0]);
        $reply->save();
        return Redirect::tokenRedirect('question.request', ['notice' => 'Replied Successfully']);
    }
    public function QuestionUpdate(Request $request){
        $question_reply = Question::where('id',$request->question_id)->first();
        $shop = Auth::user();
        $question_reply->name = $request->name;
        $question_reply->email = $request->email;
        $question_reply->likes = $request->likes;
        $question_reply->dislikes = $request->dislikes;
        $question_reply->question = $request->question;
        $question_reply->save();
        return Redirect::tokenRedirect('question.request', ['notice' => 'Question Updated Successfully']);
    }
    public function QuestionReplyDelete($id){
        $reply = QuestionReply::where('id',$id)->first();
        $reply->delete();
        return Redirect::tokenRedirect('question.request', ['notice' => 'Deleted Successfully']);
    }
    public function QuestionVerify($id){
        $question = Question::where('id',$id)->first();
        $status = $question->verify_status;
        if ($status == 'verify'){
            $question->verify_status = 'verified';
        }
        if ($status == 'verified'){
            $question->verify_status = 'verify';
        }
        if ($status == 'rejected'){
            $question->verify_status = 'verified';
        }
        $question->save();
        return Redirect::tokenRedirect('question.request', ['notice' => 'Status has been changed Successfully']);
    }
    public function QuestionDelete($id){
        $review = Question::where('id',$id)->first();
        $review->status = 'rejected';
        $review->save();
        return Redirect::tokenRedirect('question.request', ['notice' => 'Question Rejected  Successfully']);
    }
    public function AppendQuestions(Request $request){
        $shop = User::where('name',$request->shop_name)->first();
        $questions_publish  = Question::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('status','publish')->latest()->get();
        $questions_pagination  = Question::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('status','publish')->latest()->paginate(5);
        $total_question = count($questions_publish);
        $questions = view('append.questions')->with([
            'questions_publish' => $questions_pagination,
        ])->render();
        return response([
            'paginate'=>json_decode(json_encode($questions_pagination)),
            'questions'=>$questions,
            'total_question'=>$total_question,
        ]);
    }
    public function AddNewQuestion($id){
            return view('pages.new-question')->with([
                'product_id'=>$id,
            ]);
    }
    public function UpdateQuestionLikes(Request $request){
        $shop = User::where('name',$request->shop_name)->first();
        $question_stat = QuestionStat::where('question_id',$request->question_id)->where('ip_address',$request->ip())->first();
        $status = 'no';
        if ($question_stat == null){
            $question_stat = new QuestionStat();
            $status = 'yes';
        }
        $question_stat->question_id = $request->question_id;
        $question_stat->like = 1;
        $question_stat->dislike = 0;
        $question_stat->ip_address= $request->ip();
        $question_stat->save();
        $question = Question::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('id',$request->question_id)->first();
        if($status == 'yes'){
            $question->likes += 1;
        }else{
            $question->likes += 1;
            $question->dislikes -= 1;
        }
        $question->save();
        return response([
            'likes'=>$question->likes,
            'dislikes'=>$question->dislikes,
        ]);
    }
    public function UpdateQuestionDisLikes(Request $request){
        $shop = User::where('name',$request->shop_name)->first();
        $question_stat = QuestionStat::where('question_id',$request->question_id)->where('ip_address',$request->ip())->first();
        $status = 'no';
        if ($question_stat == null){
            $question_stat = new QuestionStat();
            $status = 'yes';
        }
        $question_stat->question_id = $request->question_id;
        $question_stat->dislike = 1;
        $question_stat->like = 0;
        $question_stat->ip_address= $request->ip();
        $question_stat->save();

        $question = Question::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('id',$request->question_id)->first();
        if ($status == 'yes'){
            $question->dislikes += 1;
        }else{
            $question->dislikes += 1;
            $question->likes -= 1;
        }
        $question->save();
        return response([
            'likes'=>$question->likes,
            'dislikes'=>$question->dislikes,
        ]);
    }
    public function QuestionFilter(Request $request){
        $shop = Auth::user();
        $questions = Question::where('shop_id',$shop->id)->newQuery();
        if ($request->filled('date-range')){
            if ($request->input('date-range') != 'Select Date Range') {
                $date_range = explode('-', $request->input('date-range'));
                $start_date = $date_range[0];
                $end_date = $date_range[1];
                $comparing_start_date = Carbon::parse($start_date)->format('Y-m-d') . ' 00:00:00';
                $comparing_end_date = Carbon::parse($end_date)->format('Y-m-d') . ' 23:59:59';
                $questions = $questions->whereBetween('created_at', [$comparing_start_date, $comparing_end_date])->newQuery();
            }
        }

        if ($request->filled('question_status')){
            if ($request->input('question_status') != 'status') {
                $questions = $questions->where('status', $request->input('question_status'))->newQuery();
            }
        }

        if ($request->filled('question_email')){
            $questions = $questions->where('email',$request->input('question_email'))->newQuery();
        }

        $questions = $questions->get();
        return view('pages.questions')->with([
            'questions'=>$questions,
            'date_range' => $request->input('date-range'),
            'question_status'=>$request->input('question_status'),
            'question_email'=>$request->input('question_email'),
        ]);
    }
    public function FilterQuestions(Request $request){
        $shop = User::where('name',$request->shop_name)->first();
        $questions_pagination  = Question::where('shop_id',$shop->id)->where('product_id',$request->product_id)->where('status','publish')->where('name', 'LIKE', '%' . $request->input('search_data') . '%')->orWhere('email', 'LIKE', '%' . $request->input('search_data') . '%')->orWhere('question', 'LIKE', '%' . $request->input('search_data') . '%')->latest()->get();
        $questions = view('append.questions')->with([
            'questions_publish' => $questions_pagination,
        ])->render();

        if ($questions_pagination != null){
            return response([
                'questions'=>$questions,
            ]);
        }else{
            return response([
                'questions'=>'no questions',
            ]);
        }
    }
}
