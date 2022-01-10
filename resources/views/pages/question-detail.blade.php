@extends('layouts.app')
@section('content')
<style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <div class="col-lg-12 col-md-12">
        <div class="row pt-4 ml-0 mr-0">
            <div class="col-md-12 card card-border-radius mb-2 pt-4 pb-1">
                <div class="d-flex align-items-center" style="justify-content: space-between;">
                    <div class="d-flex">
                        <div><h4>{{$question->name}}</h4></div>
                        <div class="ml-2" id="verified" style="padding-top: 3%;"><span class="badge badge-pill badge-primary py-1 px-2">@if($question->verify_status == 'verified') Verified @endif</span></div>
                    </div>
                    <div>
                        <a href="{{route('question.publish',$question->id)}}"type="button" class="btn btn-primary">@if($question->status == 'unpublish')<i class="fas fa-eye mr-1"></i> Publish @elseif($question->status == 'rejected') <i class="fas fa-eye mr-1"></i> Publish @else <i class="fas fa-eye-slash"></i>UnPublish @endif </a>
                    </div>
                </div>
                <div class="">
                    <div><p>{{\Illuminate\Support\Carbon::createFromTimeString($question->created_at)->isoFormat('MMM DD YYYY')}} ({{\Illuminate\Support\Carbon::createFromTimeString($question->created_at)->diffForHumans()}})</p></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="">
                    <div class="card border-light border-0 text-indigo shadow-sm">
                        <div class="card-body bg-white">
                            <div class="row d-flex">
                                <div class="col-md-6" style="overflow: hidden;">
                                    <span>{{$question->name}}</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#review"><i class="fas fa-pencil-alt"></i></button>
                                    <div class="modal fade" id="review" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Review</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{route('question.update')}}" method="POST">
                                                    @sessionToken
                                                    <div class="modal-body">
                                                        <input type="hidden" name="question_id" value="{{$question->id}}}">
                                                        <div class="form-group text-left">
                                                            <label for="#">Enter Name</label>
                                                            <input placeholder="Enter Name" name="name" required value="{{$question->name}}" type="text" class="form-control">
                                                        </div>
                                                        <div class="form-group text-left">
                                                            <label for="#">Enter Email</label>
                                                            <input placeholder="Enter Email" required name="email" value="{{$question->email}}" type="email" class="form-control">
                                                        </div>
                                                        <div class="form-group text-left">
                                                            <label for="#">Enter Likes Value</label>
                                                            <input placeholder="Enter Likes Value" name="likes" value="{{$question->likes}}" type="number" min="0" class="form-control">
                                                        </div>
                                                        <div class="form-group text-left">
                                                            <label for="#">Enter Dis likes Value</label>
                                                            <input placeholder="Enter Dis Likes Value" name="dislikes" value="{{$question->dislikes}}" type="number" min="0" class="form-control">
                                                        </div>
                                                        <div class="form-group text-left">
                                                            <label for="#">Enter Question</label>
                                                            <textarea placeholder="Enter Question" required  name="question" class="form-control">{{$question->question}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <span>{{$question->question}}</span>
                            <div class="text-right mt-4">
                                <span class="ng-binding"><i class="fas fa-thumbs-up"></i> {{$question->likes}} <span class="m-l-xs m-r-xs">/</span> <i class="fas fa-thumbs-down"></i> {{$question->dislikes}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @if($question->question_reply != null)
                    <div class="card border-top-1 mb-3 shadow-sm reply-div" id="reply-div" style="background-color: #FAFBFB;">
                        <div  class="card-body">
                            <h6>REPLY</h6>
                            <div class="row mb-2">
                                <div class="col-md-6 d-flex" style="justify-content: space-between;">
{{--                                    <img src="{{asset('shirt.jpg')}}" style="border-radius: 50%" width="40px" height="40px">--}}
                                    <div>
                                        <span>{{$question->question_reply->store_name}}</span>
                                    </div>
                                    <div>
                                        <span>{{\Illuminate\Support\Carbon::createFromTimeString($question->question_reply->created_at)->diffForHumans()}}</span>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href="#" type="button" id="reply-edit" class="btn btn-secondary"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{route('reply.delete',$question->question_reply->id)}}" type="button"  class="btn btn-secondary"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </div>
                            <p>{{$question->question_reply->message}}</p>
                        </div>
                    </div>
                @else
                    <div class="card-body reply bg-white mb-3 mt-0">
                        <div id="for-reply" style="padding-bottom: 10%;">
                            <a href="#" id="add-reply" style="color: #1d2630;">Add a Reply...</a>
                        </div>
                    </div>
                @endif
                <div class="card-body text-area bg-white mb-3 mt-0" style="display: none;">
                    <form action="{{route('question.reply')}}" method="POST">
                        @sessionToken
                        <div class="card">
                            <div class="card-header">To: {{$question->name}} ({{$question->email}}) </div>
                            <input type="hidden" name="question_id" value="{{$question->id}}">
                            <textarea class="card-body" name="message">@if(isset($question->question_reply)) {{$question->question_reply->message}} @endif</textarea>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-secondary">Send</button>
                                <a href="#" type="button" id="delete-reply"  class="btn btn-secondary reply-delete"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card border-light border-0 text-indigo shadow-sm">
                    <div class="card-header bg-white">
                        <div style="display: flex;justify-content: space-between;"><h6>Customer overview</h6>
{{--                            <img src="{{asset('empty1.jpg')}}" style="border-radius: 50%;" width="40px" height="40px">--}}
                        </div>
                        <span>{{$question->name}}</span>
                        <br>
                        <span>United States</span>
                        <br>
                        <span>{{$question->email}}</span>
                    </div>
                </div>
                <div class="card mt-2 border-light border-0 text-indigo shadow-sm">
                    <div class="card-header for-product-detail3 bg-white">
                        <div><h6>Verify Review</h6></div>
                        <br>
                        <a href="{{route('verify.question',$question->id)}}"type="button"  class="btn btn-secondary for-change">@if($question->verify_status == 'verify')Verified @elseif($question->verify_status == 'rejected') Verify @else Verify  @endif</a>
                    </div>
                </div>
            </div>
        </div>
        <hr style="margin: 1rem;">
        <div class="row mb-4">
            <div class="col-md-12 text-right">
                <a href="{{route('question.delete',$question->id)}}"type="button"  class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            var test = null;
            $('#for-reply').click(function (){
                test = 'new';
                $('.reply').css('display','none');
                $('.text-area').css('display','block');
            });
            $('.reply-delete').click(function (){
                console.log(test);
                if (test == 'new') {
                    $('.reply').css('display','block');
                    $('.text-area').css('display','none');
                }else {
                    $('.reply-div').css('display','block');
                    $('.text-area').css('display','none');
                }
            });
            $('#reply-edit').click(function (){
                test = 'eidt';
                $('.reply-div').css('display','none');
                $('.text-area').css('display','block');
            });
            $('.delete-item').click(function (){
                $(this).parents('.parent-div').remove();
            });

        });
    </script>
@endsection
