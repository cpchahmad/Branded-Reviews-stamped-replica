<style>
    @import url("https://pro.fontawesome.com/releases/v5.10.0/css/all.css");

    .progress-bar{
        display:block !important;
    }

    .tt_logix_reviews{
        max-width: 1160px;
        margin: 0 auto;
        padding: 0;
        padding: 10px;
    }
    .tt_logix_reviews p{
        line-height: 18px;
    }
    .tt_logix_reviews_inner{
        display: flex;
        flex-wrap: wrap;
        line-height: 0px;
    }
    @media (max-width:425px) {
        .tt_logix_reviews_inner{
            text-align: center;
            line-height: 0px;

        }
    }
    .tt_logix_reviews_r_no{
        border-right: 1px #cecece solid;
        width: 20%;
    }
    @media (max-width:767px) {
        .tt_logix_reviews_r_no{
            width: 100%;
            border: none;
        }
    }
    .tt_logix_reviews_r_no h1{
        font-size: 38px;
    }
    .tt_logix_reviews_r_no .checked{
        color: rgb(255, 210, 0);
    }
    .tt_logix_reviews_r_no span{
        margin: 0 auto;
        font-size: 24px;
    }

    .tt_logix_reviews_r_no #base_reviews{
        margin: 0 auto !important;
        font-size: 18px !important;
    }
    #total_rating{
        font-size: 35px !important;
    }


    .review_progress{
        width: 25%;
        padding: 5px 8px;
        border-right: 1px #cecece solid;
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

    .left{
        margin-top:19px !important;
        width:50% !important;
    }
    .middle {
        margin-top:10px;
        width: 100%;
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
    .bar-5 {width: 84%; height: 18px; background-color: #005e9e;}
    .bar-4 {width: 5%; height: 18px; background-color: #005e9e;}
    .bar-3 {width: 0%; height: 18px; background-color: #005e9e;}
    .bar-2 {width: 2%; height: 18px; background-color: #005e9e;}
    .bar-1 {width: 9%; height: 18px; background-color: #005e9e;}

    .image_popups_list{
        padding:15px 0 0 15px;
        width: 30%;
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
    }
    .question_review_buttons{
        padding: 30px 0;
        width: 25%;
    }
    .question_review_buttons button{
        padding: 10px;
        margin: 6px 0 6px 6px;
        cursor: pointer;
        float: right;
        background-color: #ffffff;
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
    }
    /* tabs */
    .tabs_view{
        margin-top: 25px;
        display: flex;
        flex-wrap: wrap;
        border-bottom: 1px rgb(214, 214, 214) solid;
    }
    .questions_tab,.reviews_tab{
        padding: 10px 16px;
    }
    .questions_tab a,.reviews_tab a{
        text-decoration: none;
        color: black;
        font-weight: 500;
        font-size: 18px;
    }
    .active_tab{
        border-bottom: 3px rgb(0, 94, 158) solid;
        background-color: rgb(238, 238, 238);
    }
    .active_tab a{
        color: rgb(0, 94, 158);
        font-weight: 600;
    }
    .active_tab a span{
        background-color: #f8f9fa;
        padding: 4px;
    }

    .reviews_tab_content{
        margin-top: 0;
        padding: 0;
    }
    .dropdown_review select{
        position: relative;
        float: right;
        padding: 8px;
        font-size: 12px;
    }

    .user_reviews{
        padding: 50px 0 0 0;
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
        width: 60px;
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
    }
    .user_info{
        width: 50%;
        display: inline-block;
        vertical-align: middle;
        padding: 0 15px;
        line-height: 5px;
    }
    @media (max-width:475px) {
        .user_info{
            width: calc(100% - 60px);
        }
    }
    .user_info h3 span{
        font-size: 18px;
        color: green;
        font-weight: 100;
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
    }
    .review_footer .share_review{
        display: inline-block;
        width: 50%;
    }
    @media (max-width:425px) {
        .review_footer .share_review{
            width: 100%;
        }
    }
    .review_footer .share_review{
        font-size: 12px;
    }
    .review_footer .share_review .share_to{
        display: none;
    }
    .review_footer .share_review a{
        text-decoration: none;
        color: rgb(32, 32, 32);
    }
    .review_footer .like_dislike{
        display: inline-block;
        text-align: right;
        width: 49%;
        font-size: 12px;
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
        padding: 8px;
        width: 40%;
    }
    .questions_tab_content .search_input input{
        border: none;
        padding: 8px;
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
        height: 440px;
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
        display: flex;
        width: 40%;
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
        color:blue;
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
</style>
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
    }

    @media screen and (max-width: 1000px) {
        .popup {
            width: 80%;
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
    .

</style>

    <div class="slide-image">
        <img src="{{asset('review-images'.'/'.$image->review_media)}}" alt="">
    </div>
    <div class="image-content">
        <div class="detail">
            <div class="product-details" style="margin-top: 3%;">
                <h3 class="product-name">{{$review->name}}</h3>
                <div class="star-main">
                    <div class="ratings">
                        @if ($review->review_rating == 0)
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>

                        @elseif ($review->review_rating == 1)
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star "></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>

                        @elseif ($review->review_rating == 2)
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>

                        @elseif ($review->review_rating == 3)
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>

                        @elseif ($review->review_rating == 4)
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star"></i>

                        @elseif ($review->review_rating == 5)
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                            <i class="fas fa-star checked"></i>
                        @endif
                    </div>
                    <div class="review_date">
                        <p>{{\Illuminate\Support\Carbon::createFromTimeString($review->created_at)->diffForHumans()}}</p>
                    </div>
                </div>

                <h3>{{$review->review_title}}</h3>
                <p>{{$review->experience}}</p>
                <hr>
                @if($review->review_reply != null)
                <h4>Reply:</h4>
                <p>{{$review->review_reply->message}}</p>
                @endif
                <div class="like_dislike">
                    <p>
                        <span style="display: flex">
                          <a href="" style="display: inherit; margin-right: 12%;">
                            <svg class="svg-inline--fa fa-thumbs-up fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="thumbs-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M104 224H24c-13.255 0-24 10.745-24 24v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V248c0-13.255-10.745-24-24-24zM64 472c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zM384 81.452c0 42.416-25.97 66.208-33.277 94.548h101.723c33.397 0 59.397 27.746 59.553 58.098.084 17.938-7.546 37.249-19.439 49.197l-.11.11c9.836 23.337 8.237 56.037-9.308 79.469 8.681 25.895-.069 57.704-16.382 74.757 4.298 17.598 2.244 32.575-6.148 44.632C440.202 511.587 389.616 512 346.839 512l-2.845-.001c-48.287-.017-87.806-17.598-119.56-31.725-15.957-7.099-36.821-15.887-52.651-16.178-6.54-.12-11.783-5.457-11.783-11.998v-213.77c0-3.2 1.282-6.271 3.558-8.521 39.614-39.144 56.648-80.587 89.117-113.111 14.804-14.832 20.188-37.236 25.393-58.902C282.515 39.293 291.817 0 312 0c24 0 72 8 72 81.452z"></path></svg><!-- <i class="fas fa-thumbs-up"></i> Font Awesome fontawesome.com --> <span style="margin-left: 15%">{{$review->likes}}</span>
                          </a>
                          <a href="" style="display: inherit">
                            <svg class="svg-inline--fa fa-thumbs-down fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="thumbs-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M0 56v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H24C10.745 32 0 42.745 0 56zm40 200c0-13.255 10.745-24 24-24s24 10.745 24 24-10.745 24-24 24-24-10.745-24-24zm272 256c-20.183 0-29.485-39.293-33.931-57.795-5.206-21.666-10.589-44.07-25.393-58.902-32.469-32.524-49.503-73.967-89.117-113.111a11.98 11.98 0 0 1-3.558-8.521V59.901c0-6.541 5.243-11.878 11.783-11.998 15.831-.29 36.694-9.079 52.651-16.178C256.189 17.598 295.709.017 343.995 0h2.844c42.777 0 93.363.413 113.774 29.737 8.392 12.057 10.446 27.034 6.148 44.632 16.312 17.053 25.063 48.863 16.382 74.757 17.544 23.432 19.143 56.132 9.308 79.469l.11.11c11.893 11.949 19.523 31.259 19.439 49.197-.156 30.352-26.157 58.098-59.553 58.098H350.723C358.03 364.34 384 388.132 384 430.548 384 504 336 512 312 512z"></path></svg><!-- <i class="fas fa-thumbs-down"></i> Font Awesome fontawesome.com --> <span style="margin-left: 15%">{{$review->dislikes}}</span>
                          </a>
                        </span>
                    </p>
                </div>
                {{--                                                                    <hr>--}}
                {{--                                                                    <img src="{{asset('shirt.jpg')}}" alt="" width="75px" height="100px">--}}
            </div>
        </div>
    </div>



