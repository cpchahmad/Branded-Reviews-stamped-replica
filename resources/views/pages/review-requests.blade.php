@extends('layouts.app')
@section('content')
    <style>
        .badge-success {
            background-color: green !important;
        }
        .badge-danger {
            background-color: orangered !important;
        }

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
    </style>

    <div class="col-lg-10 col-md-10 pl-4 pt-3 pr-4">
        <div class="row">
            <div class="col-6">
                <h3>Reviews</h3>
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
                            <select class="form-control bg-white mr-1" name="reviews" id="reviews">
                                <option selected disabled>Reviews</option>
                                <option value="5">5 Star</option>
                                <option value="4">4 Star</option>
                                <option value="3">3 Star</option>
                                <option value="2">2 Star</option>
                                <option value="1">1 Star</option>
                            </select>
                            <select class="form-control bg-white mr-1" name="review_status" id="review_status">
                                <option selected disabled>Status</option>
                                <option value="paid">Publish</option>
                                <option value="pending">Pending</option>
                                <option value="archive">Archive</option>
                                <option value="featured">Featured</option>
                            </select>
                            <input placeholder="Email / Title / Desc" type="text" name="review_desc" class="form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if (count($reviews) > 0)
                    <table class="table table-hover">
                        <thead class="border-0">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Customer</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th>Featured</th>
                            <th>Review date</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($reviews as $index => $review)
                        <tr>
                            <td class="" style="width: 8%;vertical-align: middle;" ><a href="#">{{$review->review_title}}</a></td>
                            <td class="" style="vertical-align: middle">{{$review->experience}}</td>
                            <td class="" style="vertical-align: middle">{{$review->name}}</td>
                            <td class="" style="vertical-align: middle">
                                <div style="overflow:hidden;">
                                <span class="stars-container stars-{{($review->review_rating / 5) * 100}}" style="font-size:large;">★★★★★</span>
                                </div>
                            </td>
                            <td class="alignment" style="vertical-align: middle;"><div class="badge badge-pill
                            @switch($review->status)
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
                                        ">{{$review->status}}</div></td>
                            <td class="text-center alignment" style="vertical-align: middle;"><a href="{{route('review.feature',$review->id)}}">@if($review->feature == 'featured')<span class="fa fa-star checked"></span> @else <span class="fa fa-star"></span> @endif</a></td>
                            <td class="alignment" style="vertical-align: middle;">{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->diffForHumans()}}</td>
                            <td class="" style="vertical-align: middle"><a href="{{route('review.view',$review->id)}}" class="btn btn-sm btn-primary" type="button">view</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <p>No Reviews Found Yet</p>
                    @endif
                    <div class="pagination">
                        {{ $reviews->links("pagination::bootstrap-4") }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
