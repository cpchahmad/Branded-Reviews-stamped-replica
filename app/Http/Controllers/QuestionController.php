<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionReply;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
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
        $total_question = count($questions_publish);
        $questions = view('append.questions')->with([
            'questions_publish' => $questions_publish,
        ])->render();
        return response([
            'questions'=>$questions,
            'total_question'=>$total_question,
        ]);
    }
    public function AddNewQuestion($id){
            return view('pages.new-question')->with([
                'product_id'=>$id,
            ]);
    }
}
