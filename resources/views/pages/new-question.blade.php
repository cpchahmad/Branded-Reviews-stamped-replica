@extends('layouts.app')
@section('content')
    <div class="col-lg-10 col-md-10 pl-4 pt-3 pr-4">
        <div class="row">
            <div class="col-6">
                <h3>New Question</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-2 mb-4">
                <div class="card">
                    <form action="{{route('question.submit')}}" enctype="multipart/form-data" method="POST">
                        @sessionToken
                        <div class="row p-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="#">Name</label>
                                    <input placeholder="Enter your name" name="name" required type="text" class="form-control">
                                    <input  name="product_id" value="{{$product_id}}" type="hidden" class="form-control">
                                    <input  name="shop_name" value="{{ Auth::user()->name }}" type="hidden" class="form-control">
                                    <input  name="question_status" value="fake" type="hidden" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="#">Email</label>
                                    <input placeholder="Enter Email" name="email" required type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="#">Question</label>
                                    <input placeholder="your question" required type="text" name="subject"  class="form-control">
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
