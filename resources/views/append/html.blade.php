<head>
    <link
        href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Amatic+SC&family=Bangers&family=Caveat&family=Courgette&family=Indie+Flower&family=Kaushan+Script&family=Lobster&family=Lobster+Two&family=Montserrat:wght@100&family=Open+Sans:wght@300&family=Orbitron&family=Pacifico&family=Patrick+Hand&family=Rajdhani:wght@300&family=Raleway:wght@100&family=Righteous&family=Roboto:wght@100&family=Sacramento&family=Satisfy&family=Helvetica&family=Helvetica Neue&display=swap"
        rel="stylesheet">
{{--    <link rel="stylesheet" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/mdb5/3.10.1/compiled.min.css">--}}
    <link rel="stylesheet" href="{{ asset('flags.css')}}">
</head>
<style>
    @import url("https://pro.fontawesome.com/releases/v5.10.0/css/all.css");

    @if(isset($display))
    #main-body{
        font-family: {{$display->font_family}} !important;
    }
    @if($display->font_family != 'Open Sans')
    #main-body h3{
        font-family: {{$display->font_family}} !important;
        font-weight: bold;
    }
    @endif
    #main-body button {
        font-family: {{$display->font_family}} !important;
    }
    #main-body select {
        font-family: {{$display->font_family}} !important;
    }
    @endif
    .progress-bar{
        display:block !important;
    }
    #main-body h3{
        font-weight: bold;
        margin-bottom: 1px;
        margin-top: 0px;
    }
    .tt_logix_reviews{
        max-width: 1160px;
        margin: 0 auto;
        padding: 10px;
    }
    .tt_logix_reviews p{
        line-height: 18px;
        @if($display)
        font-family:{{$display->font_family}};
        font-weight: 100;
        @else
        font-family:'Open Sans',sans-serif;
        font-weight: 100;
        @endif
    }

    .replied_text p{
        margin-top: 0%;
        line-height: unset;
    }
    .tt_logix_reviews_inner{
        display: flex;
        flex-wrap: wrap;
        line-height: 0px;
    }
    .question_review_buttons button:hover{
        box-shadow: unset;
    }
    @media (max-width:425px) {
        .tt_logix_reviews_inner{
            text-align: center;
            line-height: 0px;

        }
    }
    .tt_logix_reviews_r_no{
        border-right: 1px #cecece solid;
        width: 18%;
    }
    .tt_logix_reviews_r_no h1{
        display: flex;
    }
    @media (max-width:767px) {
        .tt_logix_reviews_r_no{
            width: 100%;
            border: none;
        }
        .tt_logix_reviews_r_no h1{
            justify-content: center;
        }
    }
    .tt_logix_reviews_r_no h1{
        font-size: 38px;
        margin-bottom: 0px;
        margin-top: 0px;
        line-height: 22px;
    }
    .tt_logix_reviews_r_no .checked{
        color: rgb(255, 210, 0);
    }
    .tt_logix_reviews_r_no span{
        margin: 0 auto;
        font-size: 18px;
    }
    /*.base_reviews{*/
    /*    line-height: 0px !important;*/
    /*}*/
    .tt_logix_reviews_r_no #base_reviews{
        margin: 0 auto !important;
        font-size: 18px !important;
    }
    #total_rating{
        font-size: inherit !important;
        font-weight: bold;
        vertical-align: middle;
    }

    .review_progress{
        width: 27%;
        padding: 5px 20px;
        border-right: 1px #cecece solid;
    }

    .review_progress:hover .review_progress_1{
        opacity: .5;
    }
    .review_progress_1:hover{
        opacity: 1 !important;
    }

    .review_progress.active .review_progress_1 {
        opacity: .5;
    }
    .review_progress.active .review_progress_1.active {
        opacity: 1;
    }

    @media (max-width:767px) {
        .review_progress{
            width: 100%;
            border: none;
        }
    }
    .review_progress_1{
        display: flex;
    }
    .review_progress_1 .side .fa-star{
        color: gray;
        font-size: 12px;
    }
    /* Three column layout */
    .side {
        margin-top:10px;
        width: 100%;
    }

    .middle {
        margin-top:10px;
        width: 100%;
    }
    .first, .second{
        margin-top: 0px;
    }
    .left{
        margin-top:17px;
        width:50% !important;
    }

    #write_a_review_btn:hover, #ask_a_question_btn:hover{
        background-color: #f8f9fa ;
    }
    /* Place text to the right */

    /* The bar container */
    .bar-container {
        width: 100%;
        background-color: #f1f1f1;
        text-align: center;
        color: white;
    }

    /* Individual bars */
    .bar-5 {width: 84%; height: 15px; background-color: #005e9e;}
    .bar-4 {width: 5%; height: 15px; background-color: #005e9e;}
    .bar-3 {width: 0%; height: 15px; background-color: #005e9e;}
    .bar-2 {width: 2%; height: 15px; background-color: #005e9e;}
    .bar-1 {width: 9%; height: 15px; background-color: #005e9e;}

    .image_popups_list{
        padding:3px 0 0 15px;
        width: 28%;
        display: flex;
        flex-wrap: wrap;
    }
    .image_popups_list a div{
        position: relative;
        width: 70px;
        height: 55px;
        padding-right: 0;
        margin-bottom: 5px;
        margin-right: 3px;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
    }
    /*   .image_popups_list a:nth-child(odd) div{
        background-image: url('https://cdn.shopify.com/s/files/1/0606/5366/6521/files/img1.jpg?v=1636109386');
      }
      .image_popups_list a:nth-child(even) div{
        background-image: url('https://cdn.shopify.com/s/files/1/0606/5366/6521/files/img2.jpg?v=1636109386');
      } */
    @media (max-width:767px) {
        .image_popups_list{
            width: 100%;
        }
        .image_popups_list a div{
            width: 66px;
        }
        .image_popups_list a div img{
            padding-right: 2px;
            padding-left: 2px;
        }
        .question_review_buttons button{
            width: 90%;
            float: none;
        }

        .popup .item{
            display: inline;

        }
        .popup {
            overflow: scroll;
        }
        .item .slide-image img{
            max-width: 238px !important;
        }
        .item .image-content .product-details .review_date{
            width: 48% !important;
            margin-top: -2%;
        }
        .item .image-content .product-details .review_date p{
            /*margin-left: 34%;*/
        }
        .tt_logix_reviews{
            padding: 10px 18px;
        }
        .user_pic{
            width: 20% !important;
        }
        /*.user_info{*/
        /*    width: 60% !important;*/
        /*}*/
        .review_date{
            width: 20% !important;
        }
        .user_info h3 span{
            font-size: 14px !important;
        }
        .review_footer .share_review{
            width: 50% !important;
        }
        .review_footer .like_dislike{
            width: 100% !important;
        }
        .review_footer{
            display: flex !important;
        }
        .replier_info{
            display: flex !important;
        }
        #replier_name h4{
            margin-top: 5% !important;
        }
        .questions_tab_content .search_input{
            width: 100% !important;
        }
        #user_questions{
            padding: 0 0 0 0 !important;
        }
        .replier_info .replier_date p{
            margin-top: 6% !important;
        }
        .base_reviews2{
            margin-top: 20px !important;
            margin-bottom: 30px !important;
        }
        .write_a_review form{
            padding: 0 18px;
        }
        .write_a_review input[type=text], textarea{
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }
        .review_date p{
            margin-top: 0px;
        }
        .image_popups_list{
            padding: 0 !important;
        }
        .review_1,.review_2{
            padding: 3%;
        }
        .user_info{
            width: 56% !important;
        }
    }

    .question_review_buttons{
        width: 26%;
    }
    .question_content{
        padding: 2px 2px !important;
    }
    .question_content p{
        margin-top: 0px;
    }
    .question_review_buttons button{
        padding: 10px;
        margin: 6px 0 6px 6px;
        cursor: pointer;
        float: right;
        @if(isset($display))
        color : {{$display->button_text}};
        background-color:{{$display->button_bg}};
        @else
        background-color :#ffffff;
        @endif
        border: 1px solid #ccd6e0;
        box-shadow: 2px 3px 5px 0 #8888886b;
    }

    @media only screen and (min-device-width: 768px) and (max-device-width: 1074px) {
        .tt_logix_reviews_r_no{
            width: 50%;
        }
        .review_progress{
            width: 50%;
        }
        .image_popups_list{
            width: 50%;
        }
        .question_review_buttons{
            width: 50%;
        }
    }
    @media only screen and (min-device-width: 1075px) and (max-device-width: 1117px) {
        .tt_logix_reviews_r_no{
            width: 21%;
        }
        .review_progress{
            width: 26%;
        }
        .image_popups_list{
            width: 28%;
        }
        .question_review_buttons{
            width: 25%;
        }
    }

    @media (max-width:767px) {
        .question_review_buttons{
            width: 100%;
        }
        .question_review_buttons button{
            float: initial;
        }
        .question_review_buttons2{
            margin-top: 3%;
        }
    }

    /* tabs */
    .tabs_view{
        margin-top: 25px;
        display: flex;
        flex-wrap: wrap;
        border-bottom: 1px rgb(214, 214, 214) solid;
    }

    .questions_tab,.reviews_tab{
        padding: 4px 20px;
        margin-right: 10px;
    }
    .questions_tab a,.reviews_tab a{
        text-decoration: none;
        color: black;
        font-weight: 500;
        font-size: 15px;
    }

    .active_tab{
       @if(isset($display))
        background-color: {{$display->tabs_background}};
        border-bottom: 3px solid {{$display->tabs_border_bottom}};
        @else
         background-color: rgb(238, 238, 238);
         border-bottom: 3px rgb(0, 94, 158) solid;
        @endif

    }
    .active_tab a{
        color: rgb(0, 94, 158);
        font-weight: 600;
    }
    .active_tab a span{
        @if(isset($display))
        background-color: {{$display->tabs_counter_background}};
        padding: 4px;
        @else
        background-color: #f8f9fa;
        padding: 4px;
        @endif
    }

    .questions_tab a span, .reviews_tab a span{
        @if(isset($display))
        background-color: {{$display->tabs_counter_background}};
        padding: 4px;
        @else
       background-color: #f8f9fa;
        padding: 4px;
        @endif

    }
    .reviews_tab_content{
        margin-top: 0;
        padding: 0;
    }
    .dropdown_review select{
        position: relative;
        float: right;
        padding-right: 50px !important;
        padding: 6px;
        font-size: 12px;
        -webkit-appearance: none;
        border: 1px solid black;

    }
    .dropdown_review select:focus-visible{
        outline: none;
        outline-offset: none;
        box-shadow: none;
    }

    .user_reviews{
        padding: 52px 0 0 0;
        /* margin-top: 75px; */
    }
    .review_1,.review_2{
        border-bottom: 1px rgb(214, 214, 214) solid;
    }
    .review_1_header{
        padding: 10px 0;
        display: flex;
        flex-wrap: wrap;
    }
    .user_pic{
        width: 60px !important;
        margin: 0;
        height: 60px;
        position: relative;
        background: #005e9e;
        border-radius: 100%;
        display: inline-block;
        vertical-align: middle;
    }
    .user_pic .user_pic_inner{
        margin-right: 8px;
        position: absolute;
        top: 50%;
        left: 50%;
        font-size: 16px;
        color: white;
        transform: translate(-50%, -50%);
    }
    .user_pic .user_pic_inner h3{
        margin: 0;
        padding: 0;
        font-weight: bold;
    }
    .user_info{
        width: 50%;
        display: inline-block;
        vertical-align: middle;
        padding: 0 15px;
        line-height: 5px;
    }
    @media (max-width:475px) {
        /*.user_info{*/
        /*    width: calc(100% - 60px);*/
        /*}*/
    }
    .user_info h3 span{
        font-size: 18px;
        color: green;
        font-weight: 100;
        margin-left: 7px;
    }
    .user_info h3{
        margin: 10px 0;
    }
    .user_info p{
        font-size: 12px;
        margin: 0;
    }

    .user_info .checked{
        color: rgb(255, 210, 0);
    }
    .review_date{
        width: calc(50% - 60px);
        display: inline-block;
        vertical-align: middle;
        font-size: 14px;
        text-align: right;
        color: rgb(68, 68, 68);
    }

    @media (max-width:475px) {
        .review_date{
            width: calc(100% - 5px);
        }
    }
    .review_content{
        padding: 10px 2px;
        line-height: 4px;
    }
    .review_content span{
        font-size: 18px;
        font-weight: 600;
    }
    .review_footer{
        display: inline-block;
        width: 100%;
        padding-bottom: 1%;
    }
    .review_footer .share_review{
        display: inline-block;
        width: 50%;
    }
    @media (max-width:425px) {
        .review_footer .share_review{
            width: 100%;
            font-weight: bold;
        }
    }
    .review_footer .share_review{
        font-size: 12px;
        font-weight: bold;
    }
    .review_footer .share_review .share_to{
        display: none;
    }
    .review_footer .share_review a{
        text-decoration: none;
        color: rgb(32, 32, 32);
        padding-left: 10px;
    }
    .review_footer .like_dislike{
        display: inline-block;
        text-align: right;
        width: 49%;
        font-size: 12px;
    }
    #replier_name h4{
        font-weight: bold;
        margin-bottom: 0%;
        margin-top: 0%;
    }
    @media (max-width:425px) {
        .review_footer .like_dislike{
            width: 99%;
        }
    }
    .review_footer .like_dislike a{
        text-decoration: none;
        color: rgb(32, 32, 32);
        margin: 0 0 0 9px;
    }
    /* replied section */
    .review_reply{
        margin: 10px 0 10px 30px;
        padding-left: 10px;
        border-left: 5px #d1d1d1 solid;
    }
    .replier_info{
        display: inline-block;
        width: 100%;
    }
    .replier_info .replier_name{
        display: inline-block;
        width: 50%;
    }
    .replier_info .replier_date{
        display: inline-block;
        text-align: right;
        width: 49%;
    }
    .replier_info .replier_date p{
        font-size: 14px;
        color: rgb(68, 68, 68);
        margin-bottom: 1%;
        margin-top: 2%;
    }
    .questions_tab_content{
        display: none;
    }

    .questions_tab_content{
        padding: 0;
    }
    .questions_tab_content .search_input{
        margin-top: 20px;
        border: #d1d1d1 1px solid;
        padding-left: 6px;
        width: 40%;
    }
    .questions_tab_content .search_input input{
        border: none;
        padding: 10px 6px;
        width:90%;
        -webkit-box-shadow: none;
    }
    .questions_tab_content .search_input input:focus{
        outline: none;
        border:none;
    }

    .ask_a_question{
        display: none;

    }
    .ask_a_question form{
        margin-top: 20px;
    }
    .ask_a_question input[type=text], textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
    .ask_a_question input[type=submit] {
        float: right;
        @if(isset($display))
        background-color: {{$display->button_bg}};
        color: {{$display->button_text}};
        @else
         background-color: #0c0c0c;
        color: white;
        @endif
        padding: 16px 28px;
        border: none;
        font-size: 18px;
        letter-spacing: 1px;
        font-weight: 600;
        border-radius: 28px;
        cursor: pointer;
    }
    .ask_a_question input[type=submit]:hover {
        background-color: #131313;
    }

    .facebook{
        text-decoration:none;
        background-color: #0c0c0c;
        color: white;
        padding: 16px 28px;
        border: none;
        font-size: 18px;
        letter-spacing: 1px;
        font-weight: 600;
        border-radius: 28px;
        cursor: pointer;
    }
    .twitter{
        text-decoration:none;
        background-color: #0c0c0c;
        color: white;
        padding: 16px 28px;
        border: none;
        font-size: 18px;
        letter-spacing: 1px;
        font-weight: 600;
        border-radius: 28px;
        cursor: pointer;
    }

    .write_a_review{
        display: none;
    }
    .write_a_review form{
        margin: 10px 0 60px 0;
    }
    .write_a_review input[type=text], textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }
    .write_a_review input[type=submit] {
        float: right;
        @if(isset($display))
        background-color: {{$display->button_bg}};
        color: {{$display->button_text}};
        @else
         background-color: #0c0c0c;
        color: white;
        @endif
        padding: 16px 28px;
        border: none;
        font-size: 18px;
        letter-spacing: 1px;
        font-weight: 600;
        border-radius: 28px;
        cursor: pointer;
    }
    .write_a_review input[type=submit]:hover {
        background-color: #131313;
    }
    .rating_on_review > ul >li{
        font-size: 32px;
        display: inline-block;
        position: relative;
        width: 1.1em;
        color: rgb(255, 210, 0);
    }
    .rating_on_review > ul > li:hover:before {
        content: "\2605";
        position: absolute;
        color: rgb(255, 210, 0);
    }
    .rating_on_review {
        unicode-bidi: bidi-override;
        direction: rtl;
        text-align: left;

    }
    .rating_on_review > ul > li:hover:before,
    .rating_on_review > ul > li:hover ~ li:before {
        content: "\2605";
        position: absolute;
        color: rgb(255, 210, 0);
    }
    /* .rating_on_review > ul > list_color:before {
        content: "\2605";
        position: absolute;
        color: rgb(255, 210, 0);
     }
    .rating_on_review > ul > list_color:before,
      .rating_on_review > ul > list_color ~ list_color:before {
         content: "\2605";
         position: absolute;
         color: rgb(255, 210, 0);
      }
     */
    /* Rating Star Widgets Style */
    .rating-stars ul {
        list-style-type:none;
        padding:0;

        -moz-user-select:none;
        -webkit-user-select:none;
    }
    .rating-stars ul > li.star {
        display:inline-block;

    }

    /* Idle State of the stars */
    .rating-stars ul > li.star > i.fa {
        font-size:2.5em; /* Change the size of the stars */
        color:#ccc; /* Color on idle state */
    }

    /* Hover state of the stars */
    .rating-stars ul > li.star.hover > i.fa {
        color:#FFCC36;
    }

    /* Selected state of the stars */
    .rating-stars ul > li.star.selected > i.fa {
        color:#FF912C;
    }
    /* popup quick view */
    .popup_overlay{
        position: fixed;
        display: none;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0,0,0,0.5);
    }
    #quick-view-pop-up {
        display: none;
        background: #fff;
        border: 1px solid #999;
        z-index: 9999;
        position: fixed;
        top: 2%;
        left: 18%;
        right: 18%;
        max-width: 1160px;
    }
    @media (max-width:767px) {
        #quick-view-pop-up{
            left: 8%;
            right: 8%;
        }
    }
    .gallery-cell{
        position: relative;
    }
    .owl-nav .owl-prev{
        position: absolute;
        top: 50%;
        left: -6%;
        background-color: rgb(0, 94, 158) !important;
        /* padding: 20px; */
        border-radius: 50%;
    }
    .owl-nav .owl-next{
        position: absolute;
        top: 50%;
        right: -6%;
        background-color: rgb(0, 94, 158) !important;
        /* padding: 20px; */
        border-radius: 50%;
    }
    .owl-nav .owl-next i,
    .owl-nav .owl-prev i{
        font-size: 28px;
        color: #ffffff;
        margin: 8px 14px;
    }
     .item{
        display: flex;
        padding: 5px;
        font-size: medium;
         height: 550px;
    }
    .item .slide-image{
        display: inline-block;
        max-width: 50%;
        vertical-align: middle;
    }
    .item .slide-image img{
        max-width: 375px;
        /*height: 440px;*/
        height: auto;
    }
    .item .image-content{
        display: inline-block;
        vertical-align: middle;
        padding: 0 10px;
        max-width: 49%;
        width:100%;
    }
     .item .image-content div,
    .item .image-content p,
    .item .image-content h3,
    . .item .image-content h4
    {
        margin: 12px 0 0 0;
    }
    @media (max-width:767px) {
        .item .slide-image{
            max-width: 100%;
        }
         .item .image-content{
            max-width: 100%;
        }
    }
     .item .image-content .fa-star{
        color: rgb(255, 210, 0);
    }
     .item .image-content .product-details{
        display: block;
    }
     .item .image-content .product-details .ratings{
        /*display: flex;*/
        /*width: 40%;*/
         margin-top: 3%;
    }
    .star-main{
        display: flex;
        justify-content: space-between;
    }
     .item .image-content .product-details .review_date{
        display: inline-block;
        width: 48%;
        text-align: right;
    }
    .item .image-content .product-details .like_dislike{
        display: inline-block;
        text-align: right;
        width: 23%;
        float: right;
    }
    hr{
        height: 3px;
        margin: 12px;
    }
     .item .image-content .product-details .like_dislike a{
        text-decoration: none;
        color: black;
        height: 100% !important;
        font-size: smaller;
    }
    .quick-view-close{
        position: absolute;
        right: -6%;
        top: 0;
        padding: 8px 14px;
        z-index: 999;
        cursor: pointer;
        background-color: rgb(0, 94, 158);
        border-radius: 50%;
    }
    .quick-view-close .fa-times{
        font-size: 28px;
        /* margin: 10px; */
        color: #ffffff;
    }
     .item .image-content img{
        max-width: 100px;
        height: 100%;
    }

    .stamped-messages .stamped-thank-you {
        width: 100%;
        text-align: center;
        padding: 30px 0;
        border: 1px solid #eee;
        display: none;
        margin-top: 23px;
    }

    .stamped-empty-state {
        margin-top: 50px;
    }
    .stamped-container {
        font-family: 'Open Sans',Verdana,sans-serif;
        text-align: left;
    }

    input[type="file"] {
        display: none;
    }
    .custom-file-upload {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
        margin-top: 6px;
        margin-bottom: 16px;
        width:100%;
    }
    .black-color{
        color:black;
    }
    .blue-color{
        color:black;
    }
    .user_pic_inner h3{
        color:white;
    }

    .stamped-pagination {
        text-align: center;
        position: relative;
        margin: 20px 0 20px;
        padding: 0;
        display:inline-flex;
    }
    .stamped-reviews-nav, .stamped-reviews-ul, nav.stamped-reviews {
        margin: auto !important;
    }

    .stamped-pagination .first, .stamped-pagination .previous {
        display: inline-block;
        margin-top: 0;

    }
    .stamped-pagination li {
        float: none;
        list-style: none;
        font-size: 14px;
        width: auto;
        margin: 0;
        margin-top: 0px;
        margin-right: 0px;
        padding: 0;

    }

    .sheild-badge{
        position: absolute;
        right: -8px;
        top: 30px;
        font-size: 21px;
        @if(isset($display))
        color: {{$display->verify_color}};
    @else
        color: #1cc286;
    @endif
    }

    .stamped-pagination a:not(.link):not(.btn) {
        border: none;
    }
    .stamped-pagination a {
        padding: 10px;
        cursor: pointer;
        text-decoration: none;
        font-size: 15px;
        color:black;
    }
    .stamped-link-disabled {
        pointer-events: none;
    }
    #review_pagination{
        margin-top: 1%;
        text-align: center;
    }
    .active a{
        text-decoration :underline;
    }


    .stamped-question {
        text-align: center;
        position: relative;
        margin: 20px 0 20px;
        padding: 0;
        display:inline-flex;
    }
    .stamped-reviews-nav, .stamped-reviews-ul, nav.stamped-reviews {
        margin: auto !important;
    }

    .stamped-question .first, .stamped-question .previous {
        display: inline-block;
        margin-top: 0;

    }
    .stamped-question li {
        float: none;
        list-style: none;
        font-size: 14px;
        width: auto;
        margin: 0;
        margin-top: 0px;
        margin-right: 0px;
        padding: 0;
        color:black;
    }

    .stamped-question a:not(.link):not(.btn) {
        border: none;
    }
    .stamped-question a {
        padding: 10px;
        cursor: pointer;
        text-decoration: none;
        font-size: 15px;
        color:black;
    }
    .stamped-link-disabled {
        pointer-events: none;
    }
    #question_pagination{
        margin-top: 1%;
        text-align: center;
    }
    .active a{
        text-decoration :underline;
    }

    .clear_filter{
        margin-left: 3%;
        margin-top: 20px;
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

    .input-container {
        display: -ms-flexbox; /* IE10 */
        display: flex;
        /*width: 100%;*/
        /*margin-bottom: 15px;*/
        float: right;
    }

    .icon {
        padding: 11px;
        background-color: #f8f9fa;
        min-width: 44px;
        text-align: center;
        margin-top: -1px;
        border: 1px solid black;
        border-left: none;
        font-size: 11px;
    }


</style>
<div id="main-body">
    <div class="tt_logix_reviews">
        <div class="tt_logix_reviews_inner">
            <div class="tt_logix_reviews_r_no">
                <h1>
                    <span id="total_rating" style="margin: 0px; margin-right: 7px;">{{$total_rating}}</span>
                         <div class="col-md-6" style="overflow: hidden;">
                                   <span class="stars-container stars-{{($review_value / 5) * 100}}" style="font-size: xx-large;">★★★★★</span>
                         </div>
                </h1>
                <p class="base_reviews base_reviews2">Based on <span id="base_reviews">{{$total_reviews}}</span> Reviews</p>
            </div>
            <div class="review_progress">
                <a href="javascript:void(0)" style="text-decoration: none; color: unset;">
                <div class="review_progress_1" data-value="5">
                    <div class="side first">
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                    </div>
                    <div class="middle second">
                        <div class="bar-container">
                            <div class="bar-5 progress-bar" @if($total_reviews != 0) style="width: {{($five_star/$total_reviews)*100}}%" @else style="width: 0" @endif></div>
                        </div>
                    </div>
                    <div class="side left" style="margin-top: 8px;">
                        <div id="five_star">&ensp;({{$five_star}})</div>
                    </div>
                </div>
                </a>
                <a href="javascript:void(0)" style="text-decoration: none; color: unset;">
                <div class="review_progress_1" data-value="4">
                    <div class="side">
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="far fa-star"></span>
                    </div>
                    <div class="middle">
                        <div class="bar-container">
                            <div class="bar-4 progress-bar" @if($total_reviews != 0) style="width: {{($four_star/$total_reviews)*100}}%" @else style="width: 0" @endif></div>
                        </div>
                    </div>
                    <div class="side left">
                        <div id="four_star">&ensp;({{$four_star}})</div>
                    </div>
                </div>
                </a>
                <a href="javascript:void(0)" style="text-decoration: none; color: unset;">
                <div class="review_progress_1" data-value="3">
                    <div class="side">
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="far fa-star"></span>
                            <span class="far fa-star"></span>
                    </div>
                    <div class="middle">
                        <div class="bar-container">
                            <div class="bar-3 progress-bar" @if($total_reviews != 0) style="width: {{($three_star/$total_reviews)*100}}%" @else style="width: 0" @endif></div>
                        </div>
                    </div>
                    <div class="side left">
                        <div id="three_star">&ensp;({{$three_star}})</div>
                    </div>
                </div>
                    </a>
                <a href="javascript:void(0)" style="text-decoration: none; color: unset;">
                <div class="review_progress_1" data-value="2">
                    <div class="side">
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="far fa-star"></span>
                            <span class="far fa-star"></span>
                            <span class="far fa-star"></span>
                    </div>
                    <div class="middle">
                        <div class="bar-container">
                            <div class="bar-2 progress-bar" @if($total_reviews != 0) style="width: {{($two_star/$total_reviews)*100}}%" @else style="width: 0" @endif></div>
                        </div>
                    </div>
                    <div class="side left">
                        <div id="two_star">&ensp;({{$two_star}})</div>
                    </div>
                </div>
                </a>
                <a href="javascript:void(0)" style="text-decoration: none; color: unset;">
                <div class="review_progress_1" data-value="1">
                    <div class="side">
                            <span class="fa fa-star"></span>
                            <span class="far fa-star"></span>
                            <span class="far fa-star"></span>
                            <span class="far fa-star"></span>
                            <span class="far fa-star"></span>
                    </div>
                    <div class="middle">
                        <div class="bar-container">
                            <div class="bar-1 progress-bar" @if($total_reviews != 0) style="width: {{($one_star/$total_reviews)*100}}%" @else style="width: 0" @endif></div>
                        </div>
                    </div>
                    <div class="side left">
                        <div id="one_star">&ensp;({{$one_star}})</div>
                    </div>
                </div>
                </a>
            </div>
            <div class="image_popups_list quick-view-controller" style="display: flex;" id="review_images">
                @php
                    $counter = 0;
                @endphp
                @if(count($reviews_images) > 0)
                    @foreach($reviews_images as $review)
                        @if(count($review->medias) > 0)
                            @foreach($review->medias as $key => $media)
                                @if($counter <= 7)
                                    <a href="javascript:void(0)" title="My Watch" data-value="{{$media->id}}" data-target="myPopup" class="btn-view">
                                        <div>
                                            <img src="{{asset('review-images'.'/'.$media->review_media)}}" width="70"  height="55" alt="Picture">
                                        </div>
                                    </a>
                                    @php $counter += 1; @endphp
                                @endif
                            @endforeach
                        @else
                            {{--        <a href="javascript:void(0)" title="My Watch" class="">--}}
                            {{--            <div>--}}
                            {{--                <img src="{{asset('empty.jpg')}}" width="70"  height="55" alt="Picture">--}}
                            {{--            </div>--}}
                            {{--        </a>--}}
                        @endif
                    @endforeach
                @else

                @endif

            </div>
            <div class="question_review_buttons question_review_buttons2">
                <button id="write_a_review_btn"><i class="far fa-edit"></i>&emsp;Write a Review</button>
                <button id="ask_a_question_btn"><i class="far fa-comments"></i>&emsp;Ask a Question</button>
            </div>
        </div>

        <!-- tabs -->
        <div class="customer_reviews">
            <div class="tabs_view">
                <div class="reviews_tab active_tab" >
                    <a id="reviews" href="#reviews_tab_content">
                        Reviews
                        <span id="total_reviews">@if($status == 'real'){{$real_reviews}} @endif @if($status == 'fake' && $real_reviews != 0){{$real_reviews}} @endif @if($status == 'fake' && $real_reviews == 0) 0 @endif</span>
                    </a>
                </div>
                <div class="questions_tab">
                    <a id="questions" href="#questions_tab_content">
                        Questions
                        <span id="total_questions">{{$total_question}}</span>
                    </a>
                </div>
            </div>

            <div class="stamped-messages" id="thanks_msj" style="display:none;">
                <div class="stamped-thank-you" style="display: block;">
                    <p style="font-weight: bold;font-size: xx-large; line-height:0px;margin-bottom:5%;">Thank you for submitting a review!</p>
                    <p style="font-weight: bolder;line-height:0px;">Your input is very much appreciated. Share it with your friends so they can enjoy it too!</p>
                    <div class="stamped-share-links" style="margin-top:4%;">
                        <a class="facebook" id="facebook_share" href="" target="_blank"><span><i class="stamped-fa stamped-fa-facebook"></i>Facebook</span></a>
                        <a class="twitter" id="twitter_share" href="" target="_blank"><span><i class="stamped-fa stamped-fa-twitter"></i>Twitter</span></a>
                    </div>
                </div>
                <div class="stamped-empty-state" style="display:none;"><div>Be the first to review this item</div></div>
            </div>

            <div class="stamped-messages" id="thanks_msj_qus" style="display:none;">
                <div class="stamped-thank-you" style="display: block;">
                    <p style="font-weight: bold;font-size: xx-large; line-height:0px;margin-bottom:5%;">Thank you for posting a question!</p>
                    <p style="font-weight: bolder;line-height:0px;">Your question will appear on the site once we've answered it.</p>
                </div>
                <div class="stamped-empty-state" style="display:none;"><div>Be the first to review this item</div></div>
            </div>

            <!-- reviews_tab_content -->
            <div id="reviews_tab_content" class="reviews_tab_content tabs">
                <div class="write_a_review">
{{--                       <form id="review" action="https://stamped.test/review-submit" method="POST">--}}
                    <form id="review" action="https://phpstack-176572-2275881.cloudwaysapps.com/review-submit" method="POST">
                        <label for="name">Name</label>
                        <input type="text" id="name" required name="name" placeholder="Your name..">

                        <label for="email">Email</label>
                        <input type="text" required id="email" name="email" placeholder="Your email..">

                        <label for="rating">Rating</label>
                        <div class="rating_on_review">
                            <ul style="margin-top: 0px;margin-bottom: 0px;">
                                <li class="list_item" data-value='5'>&#9734;</li>
                                <li class="list_item" data-value='4'>&#9734;</li>
                                <li class="list_item" data-value='3'>&#9734;</li>
                                <li class="list_item" data-value='2'>&#9734;</li>
                                <li class="list_item" data-value='1'>&#9734;</li>
                            </ul>
                        </div>

                        <input type="hidden" class="product_id"  value="" name="product_id">
                        <input type="hidden" id="review_rating" value="" name="review_rating">
                        <input type="hidden" id="shop_name" class="shop_name" value="" name="shop_name">
                        <label class="review_title" for="review_title">Title of Review</label>
                        <input type="text" required id="review_title" name="review_title" placeholder="Give your review a title">

                        <label for="file-upload" class="custom-file-upload"><i class="fa fa-cloud-upload" style="margin-right:1%;"></i><span id="upload_image">Upload an Image</span></label>
                        <input id="file-upload" name="image" type="file"/>

                        <label for="experience">How was your overall experience?</label>
                        <textarea id="experience" required name="experience" placeholder=""></textarea>

                        <input type="submit" value="Submit">
                    </form>
                </div>
                <div class="dropdown_review">
                    <div class="question_review_buttons" style="padding:0px;">
                        <button id="clear_review_filter" style="float:left; display:none;"><i class="fas fa-times"></i> Clear Filter</button>
                    </div>
                    <div class="input-container">
{{--                        <input class="input-field" type="text" placeholder="Username" name="usrnm">--}}
                        <select name="sort_review" @if($real_reviews == 0) style="display: none" @endif id="sort_review">
                            <option value="sort" selected>Sort</option>
                            <!--            <option value="saab">With Photos</option> -->
                            <option value="most_recent">Most Recent</option>
                            <option value="heighest_rating">Hightest Rating</option>
                            <option value="lowest_rating">lowest Rating</option>
                            <option value="most_helpful">Most Helpful</option>
                        </select>
                        <i class="fas fa-chevron-down icon"></i>
                    </div>
                </div>
                <div class="user_reviews" id="user_reviews">

                    @if (count($reviews_featured) > 0)
                        @foreach($reviews_featured as $review)
                            @php
                                $words = preg_split("/[\s,_-]+/",$review->name);
                                    $words= json_encode($words);
                                       $words_count =  str_word_count($words);
                                        $acronym = "";
                                        $words = json_decode($words);
                                    if ($words_count > 1){
                                        $string = $words;
                                        $acronym = $string[0][0].$string[1][0];
                                        $acronym = strtoupper($acronym);
                                    }else{
                                        $string = $words;
                                        $acronym = $string[0][0];
                                        $acronym = strtoupper($acronym);
                                    }
                            @endphp

                            <div class="review_2">
                                <div class="review_1_header">
                                    <div style="position: relative">
                                        <div class="user_pic" id="user_pic">
                                            <div class="user_pic_inner" id="user_pic_inner">
                                                <h3>
                                                    {{$acronym}}
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="sheild-badge">
                                            @if($review->verify_status == 'verified')
                                            <i class="fas fa-shield-check"></i>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="user_info" id="user_info">
                                        <h3>{{ucwords($review->name)}}<span @if(isset($display)) style="color: {{$display->verify_color}}" @endif>@if($review->verify_status == 'verified') Verified Buyer @endif</span></h3>
                                        <p>
                                            <i class="flag flag {{$review->country_code}}"></i>
                                            {{$review->customer_location}}
                                        </p>
                                        @if($review->review_rating == null)
                                            <div class="col-md-6" style="overflow: hidden; line-height: 1">
                                                <span class="stars-container stars-{{(0 / 5) * 100}}" style="font-size: 20px;">★★★★★</span>
                                            </div>
                                        @else
                                            <div class="col-md-6" style="overflow: hidden;line-height: 1">
                                                <span class="stars-container stars-{{($review->review_rating / 5) * 100}}" style="font-size: 20px;">★★★★★</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="review_date">

                                        @if($loop->index == 0)

                                            @if((new DateTime($review->created_at))->diff(new DateTime())->format('%d') > 10)
                                                <p> {{now()->subDays(1)->format('m/d/y')}} </p>
                                            @else
                                                <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('m/d/y')}}</p>
                                            @endif
                                        @elseif($loop->index == 1)
                                            @if((new DateTime($review->created_at))->diff(new DateTime())->format('%d') > 10)
                                                <p> {{now()->subDays(1)->format('m/d/y')}} </p>
                                            @else
                                                <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('m/d/y')}}</p>
                                            @endif
                                        @else
                                            <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('m/d/y')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="review_content">
                                    <span>{{$review->review_title}}</span>
                                    <p>{{$review->experience}}</p>
                                </div>
                                <div class="review_footer">
                                    <div class="share_review">
                                        <p>
                                            <a id="share_towards" href="https://www.facebook.com/sharer/sharer.php?u=https://phpstack-176572-2275881.cloudwaysapps.com/on-facebook?review_id={{$review->id}}&display=popup" target="_blank">
                                                <i class="fas fa-share-square"></i>
                                                Share
                                            </a>
                                            <span class="share_to">&ensp; | &ensp;<a href="www.facebook.com">Facebook</a>&ensp; . &ensp;<a href="www.twitter.com">Twitter</a> </span>
                                        </p>
                                    </div>
                                    <div class="like_dislike">
                                        <p style="font-weight: bold;">Was this helpful?<span>
                            <a href="javascript:void(0)">
                              <i @if(isset($review->stats) && $review->stats->like == 1) class="fas fa-thumbs-up blue-color for-like" @else class="fas fa-thumbs-up   for-like" @endif></i> <span class="like" data-value="{{$review->id}}">{{$review->likes}}</span>
                            </a>
                            <a href="javascript:void(0)">
                              <i @if(isset($review->stats) && $review->stats->dislike == 1) class="fas fa-thumbs-down blue-color for-dislike" @else  class="fas fa-thumbs-down for-dislike" @endif></i> <span class="dislike" data-value="{{$review->id}}">{{$review->dislikes}}</span>
                            </a>
                          </span>
                                        </p>
                                    </div>
                                </div>
                                @if($review->review_reply != null)
                                    <div class="stamped-icon-comment" style="font-size: 14px;"><i class="fas fa-comment"></i> <span class="stamped-reply-a"><span class="stamped-reply-a-label">Answers</span> (1)</span></div>
                                    <div class="review_reply" id="review_reply">
                                        <div class="replier_info">
                                            <div class="replier_name" id="replier_name">
                                                <h4>{{$review->review_reply->store_name}}</h4>
                                            </div>
                                            <div class="replier_date">
                                                @if($loop->index == 0)

                                                    @if((new DateTime($review->created_at))->diff(new DateTime())->format('%d') > 10)
                                                        <p> {{now()->subDays(2)->format('m/d/y')}} </p>
                                                    @else
                                                        <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('m/d/y')}}</p>
                                                    @endif
                                                @elseif($loop->index == 1)
                                                    @if((new DateTime($review->created_at))->diff(new DateTime())->format('%d') > 10)
                                                        <p> {{now()->subDays(2)->format('m/d/y')}} </p>
                                                    @else
                                                        <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('m/d/y')}}</p>
                                                    @endif
                                                @else
                                                    <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('m/d/y')}}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="replied_text">
                                            <p>
                                                {{$review->review_reply->message}}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @endif
                    @if (count($reviews_publish) > 0)
                        @foreach($reviews_publish as $review)
                            @php
                                $words = preg_split("/[\s,_-]+/",$review->name);
                                    $words= json_encode($words);
                                       $words_count =  str_word_count($words);
                                        $acronym = "";
                                        $words = json_decode($words);
                                    if ($words_count > 1){
                                        $string = $words;
                                        $acronym = $string[0][0].$string[1][0];
                                        $acronym = strtoupper($acronym);
                                    }else{
                                        $string = $words;
                                        $acronym = $string[0][0];
                                        $acronym = strtoupper($acronym);
                                    }
                            @endphp
                            <div class="review_2">
                                <div class="review_1_header">
                                    <div style="position: relative">
                                        <div class="user_pic" id="user_pic">
                                            <div class="user_pic_inner" id="user_pic_inner">
                                                <h3>
                                                    {{$acronym}}
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="sheild-badge">
                                            @if($review->verify_status == 'verified')
                                                <i class="fas fa-shield-check"></i>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="user_info" id="user_info">
                                        <h3>{{ucwords($review->name)}}<span @if(isset($display)) style="color: {{$display->verify_color}}" @endif>@if($review->verify_status == 'verified') Verified Buyer @endif</span></h3>
                                        <p>
                                            <i class="flag flag {{$review->country_code}}"></i>
                                            {{$review->customer_location}}
                                        </p>

                                            @if($review->review_rating == null)
                                                <div class="col-md-6" style="overflow: hidden; line-height: 1">
                                                    <span class="stars-container stars-{{(0 / 5) * 100}}" style="font-size: 20px;">★★★★★</span>
                                                </div>
                                            @else
                                                <div class="col-md-6" style="overflow: hidden;line-height: 1">
                                                    <span class="stars-container stars-{{($review->review_rating / 5) * 100}}" style="font-size: 20px;">★★★★★</span>
                                                </div>
                                            @endif
                                    </div>
                                    <div class="review_date">
                                        @if($loop->index == 0)

                                            @if((new DateTime($review->created_at))->diff(new DateTime())->format('%d') > 10)
                                                <p> {{now()->subDays(2)->format('m/d/y')}} </p>
                                            @else
                                                <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('m/d/y')}}</p>
                                            @endif
                                        @elseif($loop->index == 1)
                                            @if((new DateTime($review->created_at))->diff(new DateTime())->format('%d') > 10)
                                                <p> {{now()->subDays(2)->format('m/d/y')}} </p>
                                            @else
                                                <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('m/d/y')}}</p>
                                            @endif
                                        @else
                                            <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('m/d/y')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="review_content">
                                    <span>{{$review->review_title}}</span>
                                    <p>{{$review->experience}}</p>
                                </div>
                                <div class="review_footer">
                                    <div class="share_review">
                                        <p>
                                            <a id="share_towards" href="https://www.facebook.com/sharer/sharer.php?u=https://phpstack-176572-2275881.cloudwaysapps.com/on-facebook?review_id={{$review->id}}&display=popup" target="_blank">
                                                <i class="fas fa-share-square"></i>
                                                Share
                                            </a>
                                            <span class="share_to">&ensp; | &ensp;<a href="www.facebook.com">Facebook</a>&ensp; . &ensp;<a href="www.twitter.com">Twitter</a> </span>
                                        </p>
                                    </div>
                                    <div class="like_dislike">
                                        <p style="font-weight: bold;">Was this helpful?<span>
                            <a href="javascript:void(0)">
                              <i @if(isset($review->stats) && $review->stats->like == 1) class="fas fa-thumbs-up blue-color for-like" @else class="fas fa-thumbs-up   for-like" @endif></i> <span class="like" data-value="{{$review->id}}">{{$review->likes}}</span>
                            </a>
                            <a href="javascript:void(0)">
                              <i @if(isset($review->stats) && $review->stats->dislike == 1) class="fas fa-thumbs-down blue-color for-dislike" @else  class="fas fa-thumbs-down for-dislike" @endif></i> <span class="dislike" data-value="{{$review->id}}">{{$review->dislikes}}</span>
                            </a>
                          </span>
                                        </p>
                                    </div>
                                </div>
                                @if($review->review_reply != null)
                                    <div class="stamped-icon-comment" style="font-size: 14px;"><i class="fas fa-comment"></i> <span class="stamped-reply-a"><span class="stamped-reply-a-label">Answers</span> (1)</span></div>
                                    <div class="review_reply" id="review_reply">
                                        <div class="replier_info">
                                            <div class="replier_name" id="replier_name">
                                                <h4>{{$review->review_reply->store_name}}</h4>
                                            </div>
                                            <div class="replier_date">
                                                @if($loop->index == 0)

                                                    @if((new DateTime($review->created_at))->diff(new DateTime())->format('%d') > 10)
                                                        <p> {{now()->subDays(1)->format('m/d/y')}} </p>
                                                    @else
                                                        <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('m/d/y')}}</p>
                                                    @endif
                                                @elseif($loop->index == 1)
                                                    @if((new DateTime($review->created_at))->diff(new DateTime())->format('%d') > 10)
                                                        <p> {{now()->subDays(1)->format('m/d/y')}} </p>
                                                    @else
                                                        <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('m/d/y')}}</p>
                                                    @endif
                                                @else
                                                    <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->format('m/d/y')}}</p>
                                                @endif

                                            </div>
                                        </div>
                                        <div class="replied_text">
                                            <p>
                                                {{$review->review_reply->message}}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @endif
                    @if (count($reviews_featured) == 0 && count($reviews_publish) == 0)
                        <p>This Product has No Publish Reviews yet!</p>
                    @endif

                </div>
                <div id="review_pagination">
                    <ul aria-label="Reviews Pagination" role="navigation" class="stamped-pagination stamped-reviews-ul">

                    </ul>
                </div>
            </div>

            <!-- questions_tab_content -->
            <div id="questions_tab_content" class="questions_tab_content tabs">

                <div class="ask_a_question">
{{--                     <form id="question" action="https://stamped.test/question-submit" method="POST">--}}
                    <form id="question" action="https://phpstack-176572-2275881.cloudwaysapps.com/question-submit" method="POST">
                        <label for="name">Name</label>
                        <input type="text" id="name" required name="name" placeholder="Your name..">

                        <label for="email">Email</label>
                        <input type="text" required id="email" name="email" placeholder="Your email..">

                        <label for="question">Question</label>
                        <textarea required id="subject" name="subject" required placeholder="Type Your Question ...."></textarea>
                        <input type="hidden" class="product_id" value="" name="product_id">
                        <input type="hidden" id="shop_name" class="shop_name" value="" name="shop_name">

                        <input type="submit" value="Submit">
                    </form>
                </div>

                <div class="dropdown_review" @if($total_question == 0) style="display: none;" @endif id="search_question">
                    <div class="search_input">
                        <i class="fas fa-search"></i>
                        <input type="search" id="question_search" placeholder="Search Questions">
                    </div>
                    <div class="question_review_buttons" style="padding:0px;">
                        <button id="clear_filter" style="float:left; display:none;"><i class="fas fa-times"></i> Clear Filter</button>
                    </div>

                    <select name="sort_review" style="display:none;" id="sort_question">
                        <option value="volvo">Sort</option>
                        <option value="saab">With Photos</option>
                        <option value="opel">Most Recent</option>
                        <option value="audi">Hightest Rating</option>
                        <option value="audi">lowest Rating</option>
                        <option value="audi">Most Helpful</option>
                    </select>

                </div>
                <div class="user_reviews" id="user_questions">

                    @if (count($questions_publish) > 0)
                        @foreach($questions_publish as $question)
                            @php
                                $words = preg_split("/[\s,_-]+/",$question->name);
                                    $words= json_encode($words);
                                       $words_count =  str_word_count($words);
                                        $acronym = "";
                                        $words = json_decode($words);
                                    if ($words_count > 1){
                                        $string = $words;
                                        $acronym = $string[0][0].$string[1][0];
                                        $acronym = strtoupper($acronym);
                                    }else{
                                        $string = $words;
                                        $acronym = $string[0][0];
                                        $acronym = strtoupper($acronym);
                                    }
                            @endphp
                            <div class="review_1">
                                <div class="review_1_header">
                                    <div class="user_pic" id="user_pic">
                                        <div class="user_pic_inner" id="user_pic_inner">
                                            <h3>
                                                {{$acronym}}
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="user_info" id="user_info">
                                        <h3>{{ucfirst($question->name)}}</h3>
                                    </div>
                                    <div class="review_date">

                                        @if($loop->index == 0)
                                            @if((new DateTime($question->created_at))->diff(new DateTime())->format('%d') > 10)
                                                <p> {{now()->subDays(2)->format('m/d/y')}} </p>
                                            @else
                                                <p>{{\Illuminate\Support\Carbon::createFromTimeString($question->created_at)->format('m/d/y')}}</p>
                                            @endif
                                        @elseif($loop->index == 1)
                                            @if((new DateTime($question->created_at))->diff(new DateTime())->format('%d') > 10)
                                                <p> {{now()->subDays(2)->format('m/d/y')}} </p>
                                            @else
                                                <p>{{\Illuminate\Support\Carbon::createFromTimeString($question->created_at)->format('m/d/y')}}</p>
                                            @endif
                                        @else
                                            <p>{{\Illuminate\Support\Carbon::createFromTimeString($question->created_at)->format('m/d/y')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="review_content question_content">
                                    <p>{{$question->question}}</p>
                                </div>
                                @if($question->question_reply != null)
                                    <div class="stamped-icon-comment" style="font-size: 14px;"><i class="fas fa-comment"></i> <span class="stamped-reply-a"><span class="stamped-reply-a-label">Answers</span> (1)</span></div>
                                    <div class="review_reply" id="review_reply">
                                        <div class="replier_info">
                                            <div class="replier_name" id="replier_name">
                                                <h4>{{ucwords($question->question_reply->store_name)}}</h4>
                                            </div>
                                            <div class="replier_date">
                                                @if($loop->index == 0)
                                                    @if((new DateTime($question->created_at))->diff(new DateTime())->format('%d') > 10)
                                                        <p> {{now()->subDays(1)->format('m/d/y')}} </p>
                                                    @else
                                                        <p>{{\Illuminate\Support\Carbon::createFromTimeString($question->created_at)->format('m/d/y')}}</p>
                                                    @endif
                                                @elseif($loop->index == 1)
                                                    @if((new DateTime($question->created_at))->diff(new DateTime())->format('%d') > 10)
                                                        <p> {{now()->subDays(1)->format('m/d/y')}} </p>
                                                    @else
                                                        <p>{{\Illuminate\Support\Carbon::createFromTimeString($question->created_at)->format('m/d/y')}}</p>
                                                    @endif
                                                @else
                                                    <p>{{\Illuminate\Support\Carbon::createFromTimeString($question->created_at)->format('m/d/y')}}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="replied_text">
                                            <p>{{$question->question_reply->message}}</p>
                                        </div>
                                    </div>
                                @endif
                                <div class="review_footer" style="text-align: right; padding-bottom: 0%;">
                                    {{--                                    <div class="share_review">--}}
                                    {{--                                        <p>--}}
                                    {{--                                            <a id="share_towards" href="https://www.facebook.com/sharer/sharer.php?u=https://phpstack-176572-2275881.cloudwaysapps.com/on-facebook-q?question_id={{$question->id}}&display=popup" target="_blank">--}}
                                    {{--                                                <i class="fas fa-share-square"></i>--}}
                                    {{--                                                Share--}}
                                    {{--                                            </a>--}}
                                    {{--                                            <span class="share_to">&ensp; | &ensp;<a href="www.facebook.com">Facebook</a>&ensp; . &ensp;<a href="www.twitter.com">Twitter</a> </span>--}}
                                    {{--                                        </p>--}}
                                    {{--                                    </div>--}}
                                    <div class="like_dislike">
                                        <p style="font-weight: bold;">Was this helpful?<span>
                            <a href="javascript:void(0)">
                              <i @if(isset($question->stats) && $question->stats->like == 1) class="fas fa-thumbs-up blue-color q-like" @else class="fas fa-thumbs-up   q-like" @endif></i> <span class="like-q" data-value="{{$question->id}}">{{$question->likes}}</span>
                            </a>
                            <a href="javascript:void(0)">
                              <i @if(isset($question->stats) && $question->stats->dislike == 1) class="fas fa-thumbs-down blue-color q-dislike" @else  class="fas fa-thumbs-down q-dislike" @endif></i> <span class="dislike-q" data-value="{{$question->id}}">{{$question->dislikes}}</span>
                            </a>
                          </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>This Product has No Publish Questions yet!</p>
                    @endif
                </div>
                <div id="question_pagination">
                    <ul aria-label="Reviews Pagination" role="navigation" class="stamped-question stamped-reviews-ul">
                        <li class="page active"><a href="#" data-page="1" class="paginate_link" aria-label="Page 1">1</a></li>
                        <li class="page"><a href="#" data-page="2" aria-label="Page 2" tabindex="">2</a></li>
                        <li class="page"><a href="#" data-page="3" onclick="StampedFn.pageReviews('3', '', this); return false;" aria-label="Page 3" tabindex="">3</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- popup start -->
{{--  <div class="popup_overlay">--}}
{{--<div id="quick-view-pop-up">--}}
{{--<div class="quick-view-close">--}}
{{--<i class="fas fa-times"></i>--}}
{{--</div>--}}
{{--<div id="popup-items">--}}
{{--    <div class="gallery-cell owl-theme">--}}
{{--        @php--}}
{{--            $counter = 0;--}}
{{--        @endphp--}}
{{--        @if(count($reviews_popups) > 0)--}}
{{--            @foreach($reviews_popups as $review)--}}
{{--                @if(count($review->medias) > 0)--}}
{{--                    @foreach($review->medias as $key => $media)--}}
{{--                        @if($counter <= 7)--}}
{{--                            <div class="item" style="width: 100%;">--}}
{{--                                <div class="slide-image">--}}
{{--                                    <img src="{{asset('review-images'.'/'.$media->review_media)}}" alt="">--}}
{{--                                </div>--}}

{{--                                <div class="image-content">--}}
{{--                                    <div class="detail">--}}
{{--                                        <div class="product-details">--}}
{{--                                            <h3 class="product-name">{{$review->name}} @if($review->verify_status == 'verified')Verified Buyer @endif</h3>--}}
{{--                                            <div class="ratings">--}}
{{--                                                @if($review->review_rating == null)--}}
{{--                                                    <span class="fa fa-star "></span>--}}
{{--                                                    <span class="fa fa-star "></span>--}}
{{--                                                    <span class="fa fa-star "></span>--}}
{{--                                                    <span class="fa fa-star "></span>--}}
{{--                                                    <span class="fa fa-star "></span>--}}
{{--                                                @elseif($review->review_rating == 1)--}}
{{--                                                    <span class="fa fa-star checked"></span>--}}
{{--                                                    <span class="fa fa-star "></span>--}}
{{--                                                    <span class="fa fa-star "></span>--}}
{{--                                                    <span class="fa fa-star "></span>--}}
{{--                                                    <span class="fa fa-star "></span>--}}
{{--                                                @elseif($review->review_rating == 2)--}}
{{--                                                    <span class="fa fa-star checked"></span>--}}
{{--                                                    <span class="fa fa-star checked"></span>--}}
{{--                                                    <span class="fa fa-star "></span>--}}
{{--                                                    <span class="fa fa-star "></span>--}}
{{--                                                    <span class="fa fa-star "></span>--}}
{{--                                                @elseif($review->review_rating == 3)--}}
{{--                                                    <span class="fa fa-star checked"></span>--}}
{{--                                                    <span class="fa fa-star checked"></span>--}}
{{--                                                    <span class="fa fa-star checked"></span>--}}
{{--                                                    <span class="fa fa-star "></span>--}}
{{--                                                    <span class="fa fa-star "></span>--}}
{{--                                                @elseif($review->review_rating == 4)--}}
{{--                                                    <span class="fa fa-star checked"></span>--}}
{{--                                                    <span class="fa fa-star checked"></span>--}}
{{--                                                    <span class="fa fa-star checked"></span>--}}
{{--                                                    <span class="fa fa-star checked"></span>--}}
{{--                                                    <span class="fa fa-star "></span>--}}
{{--                                                @elseif($review->review_rating == 5)--}}
{{--                                                    <span class="fa fa-star checked"></span>--}}
{{--                                                    <span class="fa fa-star checked"></span>--}}
{{--                                                    <span class="fa fa-star checked"></span>--}}
{{--                                                    <span class="fa fa-star checked"></span>--}}
{{--                                                    <span class="fa fa-star checked"></span>--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
{{--                                            <div class="review_date">--}}
{{--                                                <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->diffForHumans()}}</p>--}}
{{--                                            </div>--}}
{{--                                            <h3>{{$review->review_title}}</h3>--}}
{{--                                            <p>{{$review->experience}}</p>--}}
{{--                                            <hr>--}}
{{--                                            @if($review->review_reply != null)--}}
{{--                                                <h4>Reply:</h4>--}}
{{--                                                <p>{{$review->review_reply->message}}</p>--}}
{{--                                                <div class="like_dislike">--}}
{{--                                                    <p>--}}
{{--                        <span>--}}
{{--                          <a href="">--}}
{{--                            <i class="fas fa-thumbs-up"></i> <span>{{$review->likes}}</span>--}}
{{--                          </a>--}}
{{--                          <a href="">--}}
{{--                            <i class="fas fa-thumbs-down"></i> <span>{{$review->dislikes}}</span>--}}
{{--                          </a>--}}
{{--                        </span>--}}
{{--                                                    </p>--}}
{{--                                                </div>--}}
{{--                                                <hr>--}}
{{--                                                <img src="{{asset('review-images'.'/'.$media->review_media)}}" alt="" width="75px" height="100px">--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            @php $counter += 1; @endphp--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--    </div>--}}
{{--    @else--}}

{{--    @endif--}}
{{--    @endforeach--}}
{{--    @else--}}
{{--        <a href="javascript:void(0)" title="My Watch" class="">--}}
{{--            <div>--}}
{{--                <img src="{{asset('empty.jpg')}}" width="70"  height="55" alt="Picture">--}}
{{--            </div>--}}
{{--        </a>--}}
{{--        <a href="javascript:void(0)" title="My Watch" class="">--}}
{{--            <div>--}}
{{--                <img src="{{asset('empty.jpg')}}" width="70"  height="55" alt="Picture">--}}
{{--            </div>--}}
{{--        </a>--}}
{{--    @endif--}}
{{--    <script>--}}
{{--        $('.gallery-cell').owlCarousel({--}}
{{--            loop:true,--}}
{{--            margin:10,--}}
{{--            nav:true,--}}
{{--            responsive:{--}}
{{--                0:{--}}
{{--                    items:1--}}
{{--                },--}}
{{--                600:{--}}
{{--                    items:1--}}
{{--                },--}}
{{--                1000:{--}}
{{--                    items:1--}}
{{--                }--}}
{{--            }--}}
{{--        })--}}
{{--        $( ".owl-prev").html('<i class="fas fa-chevron-left"></i>');--}}
{{--        $( ".owl-next").html('<i class="fas fa-chevron-right"></i>');--}}
{{--    </script>--}}
{{--</div>--}}

{{--</div>--}}
{{--</div>--}}
    <!-- popup end -->
</div>

<style>

    * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    body { font-family: sans-serif; }

    .gallery {
        background: #EEE;
    }

    .gallery-cell {
        width: 100%;
        height: 500px;
        margin-right: 10px;
        background: white;
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

    .hide {
        visibility: hidden;
        opacity: 0;
        transform: translateX(-50%) translateY(-50%) scale(0.8) !important;
        -moz-transform: translateX(-50%) translateY(-50%) scale(0.8) !important;
        -o-transform: translateX(-50%) translateY(-50%) scale(0.8) !important;
        -webkit-transform: translateX(-50%) translateY(-50%) scale(0.8) !important;
    }

    .close {
        position: absolute;
        right: 0;
        top: 0;
        width: 51px;
        height: 51px;
        font-size: 0;
        cursor: pointer;
    }

    .close:before, .close:after {
        content: '';
        position: absolute;
        background: #767676;
        -moz-border-radius: 1px;
        -webkit-border-radius: 1px;
        -o-border-radius: 1px;
        border-radius: 1px;
        left: 14px;
        right: 14px;
        top: 30px;
        height: 3px;
        -webkit-transform: rotate(45deg);
        -moz-transform: rotate(45deg);
        -o-transform: rotate(45deg);
        transform: rotate(45deg);
        transition: all 100ms ease-in;
        -moz-transition: all 100ms ease-in;
        -webkit-transition: all 100ms ease-in;
        -o-transition: all 100ms ease-in;
    }

    .close:after {
        -moz-transform: rotate(-45deg);
        -webkit-transform: rotate(-45deg);
        -o-transform: rotate(-45deg);
        transform: rotate(-45deg);
    }

    .popup {
        position: absolute;
        top: 49%;
        left: 50%;
        -webkit-transform: translateX(-50%) translateY(-50%);
        -moz-transform: translateX(-50%) translateY(-50%);
        -o-transform: translateX(-50%) translateY(-50%);
        transform: translateX(-50%) translateY(-50%);
        background: white;
        -moz-border-radius: 5px;
        -o-border-radius: 5px;
        -webkit-border-radius: 5px;
        border-radius: 5px;
        width: 800px;
        height: 580px;
        position: fixed;
        box-shadow: 0px 7px 10px rgba(0, 0, 0, 0.09), 0px 11px 12px 7px rgba(0, 0, 0, 0.02);
        -moz-transition: all 120ms;
        -webkit-transition: all 120ms;
        -o-transition: all 120ms;
        transition: all 120ms;
        z-index: 99;
        padding: 1%;
        color: #5E5E5E;
        overflow: scroll;
    }

    @media screen and (max-width: 1000px) {
        .popup {
            width: 80%;
            top: 48%;
            height: 430px;
        }
        .item .slide-image img{
            max-width: 290px;
        }
    }

    .popup-header {
        text-transform: uppercase;
        font-size: 18px;
    }

    .popup-body {
        padding: 25px 0;
    }

    .button {
        padding: 10px 15px;
        border: 1px solid #F5F5F5;
        text-transform: uppercase;
        box-shadow: 1px 2px 3px #F5F5F5;
        color: #5E5E5E;
        cursor: pointer;
        transition: all 120ms ease-in;
        outline:none;
    }

    .button:hover {
        box-shadow: 1px 3px 5px #E9E9E9;
        transform: translateY(-1px);
    }

    .button:active, .button:visited {
        transform: translateY(1px);
        outline:none;
        box-shadow: 1px 2px 3px #F5F5F5;
    }
    .flickity-viewport{
        height: 500px !important;
    }

    .btn-close {
        margin: 0;
        border: 0;
        padding: 0;
        background: blue;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        flex-flow: column nowrap;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: all 150ms;
    }
    .flickity-prev-next-button.next {
        right: -42px !important;
        background-color: blue !important;
        color: white !important;
    }
    .flickity-prev-next-button.previous {
        left: -42px !important;
        background-color: blue !important;
        color: white !important;
    }
    .flickity-button:hover{
        background-color: blue;
    }
    .btn-close .icon-cross {
        margin: 0;
        padding: 0;
        border: 0;
        background: none;
        position: relative;
        width: 18px;
        height: 40px;
    }
    .btn-close .icon-cross:before, .btn-close .icon-cross:after {
        content: "";
        position: absolute;
        top: 17px;
        left: 0;
        right: 0;
        height: 6px;
        background: #fff;
        border-radius: 6px;
    }
    .btn-close .icon-cross:before {
        transform: rotate(45deg);
    }
    .btn-close .icon-cross:after {
        transform: rotate(-45deg);
    }
    .btn-close .icon-cross span {
        display: block;
    }
    /*.btn-close:hover, .btn-close:focus {*/
    /*    transform: rotateZ(90deg);*/
    /*    background: #0052cc;*/
    /*}*/

    .cross-stand-alone {
        margin: 0;
        padding: 0;
        border: 0;
        background: none;
        position: relative;
        width: 40px;
        height: 40px;
    }
    .cross-stand-alone:before, .cross-stand-alone:after {
        content: "";
        position: absolute;
        top: 18px;
        left: 0;
        right: 0;
        height: 4px;
        background: #000;
        border-radius: 4px;
    }
    .cross-stand-alone:before {
        transform: rotate(45deg);
    }
    .cross-stand-alone:after {
        transform: rotate(-45deg);
    }
    .cross-stand-alone span {
        display: block;
    }

    .cross-1px {
        margin: 0;
        padding: 0;
        border: 0;
        background: none;
        position: relative;
        width: 80px;
        height: 80px;
    }
    .cross-1px:before, .cross-1px:after {
        content: "";
        position: absolute;
        top: 39.5px;
        left: 0;
        right: 0;
        height: 1px;
        background: #000;
        border-radius: 1px;
    }
    .cross-1px:before {
        transform: rotate(45deg);
    }
    .cross-1px:after {
        transform: rotate(-45deg);
    }
    .cross-1px span {
        display: block;
    }

    .visually-hidden {
        position: absolute !important;
        clip: rect(1px, 1px, 1px, 1px);
        padding: 0 !important;
        border: 0 !important;
        height: 1px !important;
        width: 1px !important;
        overflow: hidden;
    }
    .container{
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        display: none;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0,0,0,0.5);
        z-index: 2;
        cursor: pointer;
    }

</style>

<div class="container">
    <div>
        <div id="myPopup" class="popup">
            <div class="item" id="item">

            </div>
            <div style="position: absolute; top: 0; right: 0;">
                <button type="button" @if(isset($display)) style="background-color: {{$display->circle_background}}" @endif class="btn-close for-overlay">
                    <span class="icon-cross"></span>
                    <span class="visually-hidden">Close</span>
                </button>
            </div>
            {{--            <div style="position: absolute;  bottom: 280px; left: 0;">--}}
            {{--                <button type="button" style="color: white; font-size: large;" class="btn-close btn-view">--}}
            {{--                    <span class="far fa-chevron-left"></span>--}}
            {{--                    <span class="visually-hidden">Close</span>--}}
            {{--                </button>--}}
            {{--            </div>--}}
            {{--            <div style="position: absolute;  bottom: 280px; right: 0;">--}}
            {{--                <button type="button" style="color: white; font-size: large;" class="btn-close btn-view">--}}
            {{--                    <span class="far fa-chevron-right"></span>--}}
            {{--                </button>--}}
            {{--            </div>--}}
        </div>
    </div>

</div>


