@extends('layouts.app')
@section('content')
    <style>
        .stars-container {
            position: relative;
            display: inline-block;
            color: transparent;
        }

        .stars-container:before {
            position: absolute;
            top: 0;
            left: 0;
            content: '★★★★★';
            color: lightgray;
        }

        .stars-container:after {
            position: absolute;
            top: 0;
            left: 0;
            content: '★★★★★';
            color: gold;
            overflow: hidden;
        }
        .stars-0:after { width: 0%; }
        .stars-1:after { width: 1%; }
        .stars-2:after { width: 2%; }
        .stars-3:after { width: 3%; }
        .stars-4:after { width: 4%; }
        .stars-5:after { width: 5%; }
        .stars-6:after { width: 6%; }
        .stars-7:after { width: 7%; }
        .stars-8:after { width: 8%; }
        .stars-9:after { width: 9%; }
        .stars-10:after { width: 10%; }
        .stars-11:after { width: 11%; }
        .stars-12:after { width: 12%; }
        .stars-13:after { width: 13%; }
        .stars-14:after { width: 14%; }
        .stars-15:after { width: 15%; }
        .stars-16:after { width: 16%; }
        .stars-17:after { width: 17%; }
        .stars-18:after { width: 18%; }
        .stars-19:after { width: 19%; }
        .stars-20:after { width: 20%; }
        .stars-21:after { width: 21%; }
        .stars-22:after { width: 22%; }
        .stars-23:after { width: 23%; }
        .stars-24:after { width: 24%; }
        .stars-25:after { width: 25%; }
        .stars-26:after { width: 26%; }
        .stars-27:after { width: 27%; }
        .stars-28:after { width: 28%; }
        .stars-29:after { width: 29%; }
        .stars-30:after { width: 30%; }
        .stars-31:after { width: 31%; }
        .stars-32:after { width: 32%; }
        .stars-33:after { width: 33%; }
        .stars-34:after { width: 34%; }
        .stars-35:after { width: 35%; }
        .stars-36:after { width: 36%; }
        .stars-37:after { width: 37%; }
        .stars-38:after { width: 38%; }
        .stars-39:after { width: 39%; }
        .stars-40:after { width: 40%; }
        .stars-41:after { width: 41%; }
        .stars-42:after { width: 42%; }
        .stars-43:after { width: 43%; }
        .stars-44:after { width: 44%; }
        .stars-45:after { width: 45%; }
        .stars-46:after { width: 46%; }
        .stars-47:after { width: 47%; }
        .stars-48:after { width: 48%; }
        .stars-49:after { width: 49%; }
        .stars-50:after { width: 50%; }
        .stars-51:after { width: 51%; }
        .stars-52:after { width: 52%; }
        .stars-53:after { width: 53%; }
        .stars-54:after { width: 54%; }
        .stars-55:after { width: 55%; }
        .stars-56:after { width: 56%; }
        .stars-57:after { width: 57%; }
        .stars-58:after { width: 58%; }
        .stars-59:after { width: 59%; }
        .stars-60:after { width: 60%; }
        .stars-61:after { width: 61%; }
        .stars-62:after { width: 62%; }
        .stars-63:after { width: 63%; }
        .stars-64:after { width: 64%; }
        .stars-65:after { width: 65%; }
        .stars-66:after { width: 66%; }
        .stars-67:after { width: 67%; }
        .stars-68:after { width: 68%; }
        .stars-69:after { width: 69%; }
        .stars-70:after { width: 70%; }
        .stars-71:after { width: 71%; }
        .stars-72:after { width: 72%; }
        .stars-73:after { width: 73%; }
        .stars-74:after { width: 74%; }
        .stars-75:after { width: 75%; }
        .stars-76:after { width: 76%; }
        .stars-77:after { width: 77%; }
        .stars-78:after { width: 78%; }
        .stars-79:after { width: 79%; }
        .stars-80:after { width: 80%; }
        .stars-81:after { width: 81%; }
        .stars-82:after { width: 82%; }
        .stars-83:after { width: 83%; }
        .stars-84:after { width: 84%; }
        .stars-85:after { width: 85%; }
        .stars-86:after { width: 86%; }
        .stars-87:after { width: 87%; }
        .stars-88:after { width: 88%; }
        .stars-89:after { width: 89%; }
        .stars-90:after { width: 90%; }
        .stars-91:after { width: 91%; }
        .stars-92:after { width: 92%; }
        .stars-93:after { width: 93%; }
        .stars-94:after { width: 94%; }
        .stars-95:after { width: 95%; }
        .stars-96:after { width: 96%; }
        .stars-97:after { width: 97%; }
        .stars-98:after { width: 98%; }
        .stars-99:after { width: 99%; }
        .stars-100:after { width: 100%; }

        .imagecontainer {
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 34%;
            height: 50%;
            background: rgba(0, 0, 0, 0);
            transition: background 0.5s ease;
        }

        .imagecontainer:hover .overlay {
            display: block;
            background: rgba(0, 0, 0, .3);
        }

        #add-image {
            /*position: absolute;*/
            width: 170px;
            height: 150px;
            left: 0;
        }
        .button {
            position: absolute;
            left:105px;
            top: 118px;
            bottom : 0;
            opacity: 0;
            transition: opacity .35s ease;
        }

        .button a {
            padding: 3px 10px;
            color: white;
            border: solid 2px white;
            z-index: 1;
        }

        .imagecontainer:hover .button {
            opacity: 1;
        }

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
    <div class="col-lg-10 col-md-10">
        <div class="row pt-4 ml-0 mr-0">
            <div class="col-md-12 card card-border-radius mb-2 pt-4 pb-1">
                <div class="d-flex align-items-center" style="justify-content: space-between;">
                   <div class="d-flex">
                       <div><h4>{{$review->review_title}}</h4></div>
                       <div class="ml-2" id="verified" style="padding-top: 3%;"><span class="badge badge-pill badge-primary py-1 px-2">@if($review->verify_status == 'verified') Verified @endif</span></div>
                   </div>
                    <div>
                        <a href="{{route('review.pending',$review->id)}}"type="button" class="btn btn-secondary mr-1" @if($review->archive_status == 'archive') style="display: none;" @endif>@if($review->pending_status == 'pending') UnPending @else Pending @endif</a>
                        <a href="{{route('review.archive',$review->id)}}"type="button" class="btn btn-secondary mr-1" >@if($review->archive_status == 'archive') UnArchive @else Archive @endif</a>
                        <a href="{{route('review.feature',$review->id)}}"type="button" class="btn btn-secondary mr-1" @if($review->archive_status == 'archive') style="display: none;" @endif>@if($review->feature == 'unfeatured')Feature @else UnFeature @endif</a>
                        <a href="{{route('review.publish',$review->id)}}"type="button" class="btn btn-primary" @if($review->archive_status == 'archive') style="display: none;" @endif">@if($review->status == 'unpublish')<i class="fas fa-eye mr-1"></i> Publish @elseif($review->status == 'rejected') <i class="fas fa-eye mr-1"></i> Publish @else <i class="fas fa-eye-slash"></i>UnPublish @endif </a>
                    </div>
                </div>
                <div class="">
                    <div><p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->isoFormat('MMM DD YYYY')}} ({{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->diffForHumans()}})</p></div>
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
                                   <span class="stars-container stars-{{($review->review_rating / 5) * 100}}" style="font-size: xx-large;">★★★★★</span>
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
                                               <form action="{{route('review.update')}}" method="POST">
                                                   @sessionToken
                                                   <div class="modal-body">
                                                       <input type="hidden" name="review_id" required value="{{$review->id}}}">
                                                       <div class="form-group text-left">
                                                           <label for="#">Enter Review Value (1 to 5)</label>
                                                           <input placeholder="Enter Review Value" required name="review_rating" required value="{{$review->review_rating}}" type="number" step="1" min="0" max="5" min="0" class="form-control">
                                                       </div>
                                                       <div class="form-group text-left">
                                                           <label for="#">Enter Review Title</label>
                                                           <input placeholder="Enter Review title" required name="review_title" value="{{$review->review_title}}" type="text" class="form-control">
                                                       </div>
                                                       <div class="form-group text-left">
                                                           <label for="#">Enter Likes Value</label>
                                                           <input placeholder="Enter Likes Value" name="likes" type="number" value="{{$review->likes}}" min="0" step="1" class="form-control">
                                                       </div>
                                                       <div class="form-group text-left">
                                                           <label for="#">Enter Dis likes Value</label>
                                                           <input placeholder="Enter Dis Likes Value" name="dislikes" value="{{$review->dislikes}}" type="number" min="0" step="1" class="form-control">
                                                       </div>
                                                       <div class="form-group text-left">
                                                           <label for="#">Enter Country Name</label>
                                                           <input placeholder="Enter Country Name" required name="customer_location" value="{{$review->customer_location}}" type="text" class="form-control">
                                                       </div>
                                                       <div class="form-group text-left">
                                                           <label for="#">Review Date</label>
                                                           @php
                                                               $review_date = date_create($review->created_at);
                                                                $review_date = date_format($review_date,'m / d / Y');
                                                            @endphp
                                                           <input placeholder="Enter Date" required name="created_at" value="{{isset($review->created_at)?$review_date:null}}" type="date" class="form-control">
                                                       </div>

                                                       <div class="form-group text-left">
                                                           <label for="#">Enter Review Description</label>
                                                           <textarea placeholder="Enter Review description" required name="experience" class="form-control">{{$review->experience}}</textarea>
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
                            <span>{{$review->review_title}}</span>
                            <br>
                            <span>{{$review->experience}}</span>
                                <div class="text-right mt-4">
                                    <span class="ng-binding"><i class="fas fa-thumbs-up"></i>{{$review->likes}}<span class="m-l-xs m-r-xs">/</span> <i class="fas fa-thumbs-down"></i> {{$review->dislikes}}</span>
                                </div>
                        </div>
                    </div>
                </div>
                @if($review->review_reply != null)
                <div class="card border-top-1 mb-3 shadow-sm reply-div" id="reply-div" style="background-color: #FAFBFB;">
                    <div  class="card-body">
                        <h6>REPLY</h6>
                        <div class="row mb-2">
                            <div class="col-md-6 d-flex">
                                <img src="{{asset('shirt.jpg')}}" style="border-radius: 50%" width="40px" height="40px">
                                <div style="margin-left: 5%;">
                                    <span>{{$review->review_reply->store_name}}</span>
                                    <br>
                                    <span>{{\Illuminate\Support\Carbon::createFromTimeString($review->review_reply->created_at)->diffForHumans()}}</span>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="#" type="button" id="reply-edit" class="btn btn-secondary"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{route('reply.delete',$review->review_reply->id)}}" type="button"  class="btn btn-secondary"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                        <p>{{$review->review_reply->message}}</p>
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
                    <form action="{{route('review.reply')}}" method="POST">
                        @sessionToken
                    <div class="card">
                        <div class="card-header">To: {{$review->name}} ({{$review->email}}) </div>
                        <input type="hidden" name="review_id" value="{{$review->id}}">
                        <textarea class="card-body" name="message">@if(isset($review->review_reply)) {{$review->review_reply->message}} @endif</textarea>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-secondary">Send</button>
                            <a href="#" type="button" id="delete-reply"  class="btn btn-secondary reply-delete"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="cardshadow-sm" style="background-color: #FAFBFB;">
                    <div class="card-body">
                        <div class="d-flex" style="justify-content: space-between;">
                        <h6>Photos & Videos</h6>
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Add photo</button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Photos & Videos</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('add.photo')}}" method="POST" enctype="multipart/form-data">
                                            @sessionToken
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Photo & Video:</label>
                                                        <input type="file" class="form-control" name="image" id="recipient-name">
                                                        <input type="hidden" class="form-control" name="review_id" value="{{$review->id}}" id="recipient-name">
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
                        <div class="row mt-2">
                            @foreach($review->medias as $media)
                                <div class="col-md-4 mt-1 parent-div">
                                    <div class=" imagecontainer">
                                        <img id="add-image" src="{{asset('review-images'.'/'.$media->review_media)}}" alt="" />
                                        <div class="button"><a class="delete-item" href="#"><i class="fas fa-trash-alt"></i></a></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="card border-light border-0 text-indigo shadow-sm">
                    <div class="card-header bg-white">
                        <div style="display: flex;justify-content: space-between;"><h6>Customer overview</h6><img src="{{asset('shirt.jpg')}}" style="border-radius: 50%;" width="40px" height="40px"></div>
                        <br>
                        <span>{{$review->name}}</span>
                        <br>
                        <span>{{$review->customer_location}}</span>
                        <br>
                        <span>{{$review->email}}</span>
                    </div>
                </div>
                <div class="mt-2">
                    <div class="card border-light border-0 text-indigo shadow-sm">
                        <div class="card-body bg-white">
                                <h6>Product</h6>
                            <p>@if(isset($product_title->title)){{$product_title->title}}@endif</p>

                            <span class="d-flex">5 <span class="fa fa-star star checked"></span>
                                <div class="progress mt-2 mr-2 bg-danger" style="width: 50%; background-color: #f4f6f8 !important;">
                                  <div @if($total_reviews != 0) class="progress-bar w-{{($five_star / $total_reviews) * 100}}" @else class="progress-bar w-0" @endif style="background-color: deepskyblue; !important;" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>{{($five_star)}}</span>
                            </span>
                            <span class="d-flex">4 <span class="fa fa-star star checked"></span>
                                <div class="progress mt-2 mr-2 bg-danger" style="width: 50%; background-color: #f4f6f8 !important;">
                                  <div @if($total_reviews != 0) class="progress-bar w-{{($four_star / $total_reviews) * 100}}" @else class="progress-bar w-0" @endif style="background-color: deepskyblue; !important;" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>{{($four_star)}}</span>
                            </span>
                            <span class="d-flex">3 <span class="fa fa-star star checked"></span>
                                <div class="progress mt-2 mr-2 bg-danger" style="width: 50%; background-color: #f4f6f8 !important;">
                                  <div @if($total_reviews != 0) class="progress-bar w-{{($three_star / $total_reviews) * 100}}" @else class="progress-bar w-0" @endif style="background-color: deepskyblue; !important;" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>{{($three_star)}}</span>
                            </span>
                            <span class="d-flex">2 <span class="fa fa-star star checked"></span>
                                <div class="progress mt-2 mr-2 bg-danger" style="width: 50%; background-color: #f4f6f8 !important;">
                                  <div @if($total_reviews != 0) class="progress-bar w-{{($two_star / $total_reviews) * 100}}" @else class="progress-bar w-0" @endif style="background-color: deepskyblue; !important;" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>{{($two_star)}}</span>
                            </span>
                            <span class="d-flex">1 <span class="fa fa-star star checked"></span>
                                <div class="progress mt-2 mr-2 bg-danger" style="width: 50%; background-color: #f4f6f8 !important;">
                                  <div @if($total_reviews != 0) class="progress-bar w-{{($one_star / $total_reviews) * 100}}" @else class="progress-bar w-0" @endif style="background-color: deepskyblue; !important;" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span>{{($one_star)}}</span>
                            </span>
                                <a href="{{route('product.detail',$review->product_id)}}"type="button"  class="btn btn-secondary for-change">Change</a>
                            <hr style="margin: 1rem;">
                        </div>
                    </div>
                </div>
                <div class="card mt-2 border-light border-0 text-indigo shadow-sm">
                    <div class="card-header bg-white">
                        <div><h6>Verify Review</h6></div>
                        <br>
                        <a href="{{route('verify.review',$review->id)}}"type="button"  class="btn btn-secondary for-change">@if($review->verify_status == 'verify')Verified @else Verify @endif</a>
                    </div>
                </div>
            </div>
        </div>
        <hr style="margin: 1rem;">
        <div class="row mb-4">
            <div class="col-md-12 text-right">
                <a href="{{route('review.delete',$review->id)}}"type="button"  class="btn btn-danger">Delete</a>
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
