@extends('layouts.app')
@section('content')
    <style>
        .badge-success {
            background-color: #88fd88 !important;
        }
        .badge-danger {
            background-color: #ffe300 !important;
        }

    </style>

    <div class="col-lg-10 col-md-10 pl-4 pt-3 pr-4">
        <div class="row">
            <div class="col-6">
                <h3>Questions</h3>
            </div>
            <div class="col-md-12 mt-2">
                <div class="form-group">
                    <form action="" method="GET">
                        @sessionToken
                        <div class="input-group">
                            <button type="submit" class="btn btn-primary mr-1 pl-4 pr-4">Filter</button>
                            <button type="button" class="btn btn-secondary mr-1 pl-4 pr-4">Clear</button>
                            <select class="form-control bg-white mr-1" name="filter" id="country">
                                <option selected disabled>Date</option>
                            </select>
                            <select class="form-control bg-white mr-1" name="review_status" id="review_status">
                                <option selected disabled>Status</option>
                                <option value="paid">Publish</option>
                                <option value="archive">Unpublish</option>
                                <option value="featured">Rejected</option>
                            </select>
                            <input placeholder="Enter Email" type="text" name="review_desc" class="form-control">
                        </div>
                    </form>
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
                                            "><a href="{{route('question.publish',$question->id)}}">@if($question->status == 'publish') Publish @elseif($question->status == 'rejected') Rejected @else UnPublish @endif</a></div></td>
                                    <td class=""><a href="{{route('question.view',$question->id)}}" class="btn btn-sm btn-primary" type="button">view</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No Questions Found Yet</p>
                    @endif
                    <div class="pagination">
                        {{ $questions->links("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

