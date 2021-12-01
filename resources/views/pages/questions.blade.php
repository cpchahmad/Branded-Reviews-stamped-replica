@extends('layouts.app')
@section('content')
    <style>
        .badge-success {
            background-color: #5cb85c !important;
        }
        .badge-danger {
            background-color: #ffe300 !important;
        }
        .daterangepicker .right{
            color: inherit !important;
        }
        .daterangepicker {
            width: 341px !important;
        }

    </style>
    <style>
        /* external css: flickity.css */

        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body { font-family: sans-serif; }

        .gallery {
            background: #EEE;
        }

        .gallery-cell {
            width: 66%;
            height: 400px;
            margin-right: 10px;
            background: #8C8;
            counter-increment: gallery-cell;
        }

        /* cell number */
        .gallery-cell:before {
            display: block;
            text-align: center;
            /*content: counter(gallery-cell);*/
            line-height: 200px;
            font-size: 80px;
            color: white;
        }
    </style>

    <div class="col-lg-12 col-md-12 pl-4 pt-3 pr-4">
        <div class="row">
            <div class="col-6">
                <h3>Questions</h3>
            </div>
            <div class="col-md-12 mt-2">
                <div class="form-group">
                        <div class="input-group">
                            <button type="button" class="btn btn-primary filter_by_date mr-1 pl-4 pr-4" data-url="{{route('question.filter')}}">Filter</button>
                            <button type="button" class="btn btn-secondary clear_filter_data mr-1 pl-4 pr-4">Clear</button>
                            <div id="reportrange" style="background: #fff; cursor: pointer; padding: 0px 4px; border: 1px solid #ccc;">
                                <i class="fa fa-calendar"></i>&nbsp;
                                <span>@if(isset($date_range)) {{$date_range}} @endif</span> <i class="fa fa-caret-down"></i>
                            </div>
                            <select class="form-control bg-white mr-1" name="question_status" id="question_status">
                                <option selected disabled value="status">Status</option>
                                <option  @if(isset($question_status) && $question_status== 'publish') selected @endif value="publish">Publish</option>
                                <option  @if(isset($question_status) && $question_status== 'unpublish') selected @endif value="unpublish">Unpublish</option>
                                <option  @if(isset($question_status) && $question_status== 'rejected') selected @endif value="rejected">Rejected</option>
                            </select>
                            <select class="form-control bg-white mr-1" name="product_reviews" id="product_reviews">
                                <option selected disabled value="product">Products</option>
                                @if(count($products) > 0 )
                                    @foreach($products as $product)
                                        <option @if(isset($product_value) && $product->shopify_id == $product_value) selected @endif value="{{$product->shopify_id}}">{{$product->title}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <input placeholder="Enter Email" type="text" @if (isset($question_email)) value="{{$question_email}}" @endif name="question_email" id="question_email" class="form-control">
                        </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if (count($questions) > 0)
                        <table class="table table-hover">
                            <thead class="border-0">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Question</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($questions as $index => $question)
                                <tr>
                                    <td class="" ><a href="#">{{$question->name}}</a></td>
                                    <td class="">{{$question->email}}</td>
                                    <td class="">{{$question->question}}</td>
                                    <td class="alignment" style="vertical-align: middle;"><div class="badge badge-pill
                             @switch($question->status)
                                        @case('publish')
                                            badge-success
@break
                                        @case('unpublish')
                                            badge-danger
@break
                                        @case('rejected')
                                            badge-danger
@break
                                        @endswitch
                                            "><a href="{{route('question.publish',$question->id)}}" style="color: white;">@if($question->status == 'publish') Publish @elseif($question->status == 'rejected') Rejected @else UnPublish @endif</a></div></td>
                                    <td class=""><a href="{{route('question.view',$question->id)}}" class="btn btn-sm btn-primary" type="button">view</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No Questions Found Yet</p>
                    @endif
                    <div class="pagination">
                        {{ $questions->appends(\Illuminate\Support\Facades\Request::except('page'))->links("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        if($('body').find('#reportrange').length > 0){
            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }
            if($('#reportrange span').text() === ''){
                $('#reportrange span').html('Select Date Range');
            }


            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

        }
        $('body').on('click','.filter_by_date', function() {
            let daterange_string = $('#reportrange').find('span').text();
            var selected_status_value = $("#question_status option:selected").val();
            var product = $("#product_reviews option:selected").val() ;
            var question_email = $("#question_email").val();
            window.location.href = $(this).data('url')+'?date-range='+daterange_string+'&question_status='+selected_status_value+'&product='+product+'&question_email='+question_email;

        });

        $('body').on('click','.clear_filter_data', function() {

            window.location.href = '/question-request';
        });
    </script>
@endsection
