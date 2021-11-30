(function() {
var shopdomain = Shopify.shop;
// var base_url = 'https://phpstack-176572-2275881.cloudwaysapps.com/';
var base_url = 'https://stamped.test/';
var id = meta.product.id;
var name = Shopify.shop;

var ppTyLoadScript = function(url, callback) {
var script = document.createElement("script");
script.type = "text/javascript";
if (script.readyState) {
script.onreadystatechange = function() {
if (script.readyState == "loaded" || script.readyState == "complete") {
script.onreadystatechange = null;
callback();
}
};
} else {
script.onload = function() {
callback();
};
}
script.src = url;
document.getElementsByTagName("head")[0].appendChild(script);
};
var ppTyInitialise = function() {
if (!window.jQuery || typeof jQuery === 'undefined' || parseFloat(jQuery.fn.jquery) < 1.7) {
ppTyLoadScript('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', function() {
__jQuery = jQuery.noConflict(true);
ppTyApp(__jQuery);
});
} else {
ppTyApp(jQuery);
}
};
var ppTyApp = function($) {
if (meta.product != null) {
if ($('#br_reviews_widget_wrapper').length == 0) {
$(document.body).append("<div id='br_reviews_widget_wrapper'></div>");
}
$.ajax({
url: base_url + "get-data?product_id=" + id + "&shop_name=" + name,
type: 'GET',
success: function(data) {
$('#br_reviews_widget_wrapper').html(data.html);

$('.stamped-pagination').empty();
var total = $(data.paginate['links']).length;
var next_url = data.paginate['next_page_url'] + '&shop_name=' + name + '&product_id=' + id;
$(data.paginate['links']).each(function(index) {
//                    if (index === 0) {
//                        $('.stamped-pagination').append("<li class='previous'><a href='javascript:void(0)' id='previous' data-page='' class='paginate_link' aria-label='Previous page'>&lt;</a></li>");
//                   	}
if (index != 0) {
if (index != total - 1) {
if (total != 3) {
var url_link = data.paginate['links'][index]['url'] + '&shop_name=' + name + '&product_id=' + id;
if (index == 1) {
$('.stamped-pagination').append("<li class='page active'><a href='javascript:void(0)' data-page='" + url_link + "' class='paginate_link' aria-label='Page 1'>" + index + "</a></li>");
} else {
$('.stamped-pagination').append("<li class='page'><a href='javascript:void(0)' data-page='" + url_link + "' class='paginate_link' aria-label='Page 1'>" + index + "</a></li>");
}
}
}
//           			 if (index === total - 1) {

//                      $('.stamped-pagination').append("<li class='next'><a href='javascript:void(0)' id='next' data-page='"+next_url+"' class='paginate_link' aria-label='Next page'>&gt;</a></li>");

//                   	}

}

});

$('.stamped-question').empty();
var total = $(data.paginate_q['links']).length;

var next_url = data.paginate_q['next_page_url'] + '&shop_name=' + name + '&product_id=' + id;
$(data.paginate_q['links']).each(function(index) {
//                    if (index === 0) {
//                        $('.stamped-question').append("<li class='previous'><a href='javascript:void(0)' id='previous_question' data-page='' class='question_link' aria-label='Previous page'>&lt;</a></li>");
//                   	}
if (index != 0) {
if (index != total - 1) {
if (total != 3) {
var url_link = data.paginate_q['links'][index]['url'] + '&shop_name=' + name + '&product_id=' + id;
if (index == 1) {
$('.stamped-question').append("<li class='question_page active'><a href='javascript:void(0)' data-page='" + url_link + "' class='question_link' aria-label='Page 1'>" + index + "</a></li>");
} else {
$('.stamped-question').append("<li class='question_page'><a href='javascript:void(0)' data-page='" + url_link + "' class='question_link' aria-label='Page 1'>" + index + "</a></li>");
}
}
}
//           			 if (index === total - 1) {

//                      $('.stamped-question').append("<li class='next'><a href='javascript:void(0)' id='next_question' data-page='"+next_url+"' class='question_link' aria-label='Next page'>&gt;</a></li>");

//                   	}
}

});

}

});

$(document).on("click", ".btn-view", function() {
var image_id = $(this).data('value');
$.ajax({
url: base_url + "get-popup?image_id=" + image_id,
type: 'GET',
success: function(data) {
$('#item').html(data.popup);
}

});
$('.container').css('display','block');
event.preventDefault();

var target = $(this).data('target');
$('#' + target).toggleClass('hide');

});
$(document).on('click', '.for-overlay', function() {

console.log('ok');
$('#myPopup').css('display','none !important');
$('.container').css('display','none !important');
});




//             $(document).on('click', '.toggle', function(event) {
//         console.log('ok');
//         event.preventDefault();

//         var target = $(this).data('target');
//         $('#' + target).toggleClass('hide');
//     });

$(document).on("click", ".quick-view-close", function() {
$('#quick-view-pop-up').fadeOut();
$('.popup_overlay').fadeOut();
});

$(document).on("click", "#questions", function() {
$("#questions_tab_content").css("display", "block");
$("#reviews_tab_content").css("display", "none");
$(".questions_tab").addClass("active_tab");
$(".reviews_tab").removeClass("active_tab");
$(".ask_a_question").css("display", "none");
});




$(document).on("click", "#ask_a_question_btn", function() {

$('.shop_name').empty();
$('.shop_name').val(name);
$('.product_id').empty();
$('.product_id').val(id);
$("#questions_tab_content").css("display", "block");
$("#reviews_tab_content").css("display", "none");
$(".questions_tab").addClass("active_tab");
$(".reviews_tab").removeClass("active_tab");
// $(".ask_a_question").css("display", "block");
$(".ask_a_question").toggle();
});

$(document).on("click", "#reviews", function() {
$("#questions_tab_content").css("display", "none");
$("#reviews_tab_content").css("display", "block");
$(".reviews_tab").addClass("active_tab");
$(".questions_tab").removeClass("active_tab");
$(".write_a_review").css("display", "none");
});

$(document).on("click", "#write_a_review_btn", function() {
$('.shop_name').empty();
$('.shop_name').val(name);
$('.product_id').empty();
$('.product_id').val(id);
$("#questions_tab_content").css("display", "none");
$("#reviews_tab_content").css("display", "block");
$(".reviews_tab").addClass("active_tab");
$(".questions_tab").removeClass("active_tab");
// $(".write_a_review").css("display", "block");
$(".write_a_review").toggle();
});

//       $('#share_towards').click(function(){
//         $(".share_to").toggle();
//       });

//       document.getElementById("share_towards").addEventListener("click", function(event){
//         event.preventDefault()
//       });
//     document.getElementById("reviews").addEventListener("click", function(event){
//       event.preventDefault()
//     });
//     document.getElementById("questions").addEventListener("click", function(event){
//       event.preventDefault()
//     });



$(document).on("click", ".list_item", function() {
$(this).empty();
$(this).nextAll().empty();
$(this).append('&#9733;');
$(this).nextAll().append('&#9733;');
$(this).prevAll().empty();
$(this).prevAll().append('&#9734;');
var rating = $(this).data('value');
$('#review_rating').val(rating);
});

$(function() {

$(document).on("click", ".paginate_link", function(e) {
$('.page').removeClass('active');
var thiss = $(this)

var for_url = $(this).data('page');

$.ajax({
url: for_url,
type: 'GET',
success: function(data) {
var total = $(data.paginate['links']).length;
var previous_url = data.paginate['links'][0]['url'] + '&shop_name=' + name + '&product_id=' + id;

//              $('#previous').attr('data-page',previous_url);
var next_url = data.paginate['links'][total - 1]['url'] + '&shop_name=' + name + '&product_id=' + id;

//              $('#next').attr('data-page',next_url);
$("#br_reviews_widget_wrapper").html(data.html);
console.log(data.html);
$(document).find('.stamped-pagination').empty();
var total = $(data.paginate['links']).length;
var next_url = data.paginate['next_page_url'] + '&shop_name=' + name + '&product_id=' + id;
$(data.paginate['links']).each(function(index) {
//                    if (index === 0) {
//                        $('.stamped-pagination').append("<li class='previous'><a href='javascript:void(0)' id='previous' data-page='' class='paginate_link' aria-label='Previous page'>&lt;</a></li>");
//                   	}
if (index != 0) {
if (index != total - 1) {
if (total != 3) {
var url_link = data.paginate['links'][index]['url'] + '&shop_name=' + name + '&product_id=' + id;
if (index == 1) {
$('.stamped-pagination').append("<li class='page active'><a href='javascript:void(0)' data-page='" + url_link + "' class='paginate_link' aria-label='Page 1'>" + index + "</a></li>");
} else {
$('.stamped-pagination').append("<li class='page'><a href='javascript:void(0)' data-page='" + url_link + "' class='paginate_link' aria-label='Page 1'>" + index + "</a></li>");
}
}
}
//           			 if (index === total - 1) {

//                      $('.stamped-pagination').append("<li class='next'><a href='javascript:void(0)' id='next' data-page='"+next_url+"' class='paginate_link' aria-label='Next page'>&gt;</a></li>");

//                   	}

}

});
$('.page').removeClass('active');
if (!thiss.parent().hasClass("previous") && !thiss.parent().hasClass("next")) {
thiss.parent().addClass('active');
}
$('.stamped-question').empty();
var total = $(data.paginate_q['links']).length;

var next_url = data.paginate_q['next_page_url'] + '&shop_name=' + name + '&product_id=' + id;
$(data.paginate_q['links']).each(function(index) {
//                    if (index === 0) {
//                        $('.stamped-question').append("<li class='previous'><a href='javascript:void(0)' id='previous_question' data-page='' class='question_link' aria-label='Previous page'>&lt;</a></li>");
//                   	}
if (index != 0) {
if (index != total - 1) {
if (total != 3) {
var url_link = data.paginate_q['links'][index]['url'] + '&shop_name=' + name + '&product_id=' + id;
if (index == 1) {
$('.stamped-question').append("<li class='question_page active'><a href='javascript:void(0)' data-page='" + url_link + "' class='question_link' aria-label='Page 1'>" + index + "</a></li>");
} else {
$('.stamped-question').append("<li class='question_page'><a href='javascript:void(0)' data-page='" + url_link + "' class='question_link' aria-label='Page 1'>" + index + "</a></li>");
}
}
}
//           			 if (index === total - 1) {

//                      $('.stamped-question').append("<li class='next'><a href='javascript:void(0)' id='next_question' data-page='"+next_url+"' class='question_link' aria-label='Next page'>&gt;</a></li>");

//                   	}
}

});
}

});
});

$(document).on("click", ".question_link", function() {
$('.question_page').removeClass('active');
if (!$(this).parent().hasClass("previous") && !$(this).parent().hasClass("next")) {
$(this).parent().addClass('active');
}

var for_url = $(this).data('page');
$.ajax({
url: for_url,
type: 'GET',
success: function(data) {
var total = $(data.paginate['links']).length;
var previous_url = data.paginate['links'][0]['url'] + '&shop_name=' + name + '&product_id=' + id;
if (data.paginate['links'][0]['url'] == null) {
var previous_url = '';
}

//              $('#previous_question').attr('data-page',previous_url);
var next_url = data.paginate['links'][total - 1]['url'] + '&shop_name=' + name + '&product_id=' + id;
if (data.paginate['links'][total - 1]['url'] == null) {
var next_url = '';
}
//              $('#next_question').attr('data-page',next_url);
$("#br_reviews_widget_wrapper").html(data.html);
}
});
});

$.ajax({
url: base_url + "get-setting?shop_name=" + name,
type: 'GET',
success: function(data) {
if (data.setting != 'NoSetting') {

$("head").append('<style> .tt_logix_reviews_r_no .fa-star{ color: ' + data.setting['unfilled_stars'] + ' } #rating_stars .checked{ color: ' + data.setting['stars'] + ' } .user_info .fa-star{color:' + data.setting['unfilled_stars'] + '} #user_info .checked{color:' + data.setting['stars'] + '} #main-body{color:' + data.setting['text'] + '} #user_pic{background-color:' + data.setting['circle_background'] + '} #user_pic_inner h3{color:' + data.setting['circle_text'] + '} #review_reply{border-left:5px solid' + data.setting['reply_border'] + '} #user_info h3{color:' + data.setting['text'] + '} #user_info h3 span{color:' + data.setting['circle_background'] + '} #replier_name h4{color:' + data.setting['text'] + '}</style>');

//               $('.tt_logix_reviews_r_no .fa-star').css('color',data.setting['unfilled_stars']);
//                $('.tt_logix_reviews_r_no .checked').css('color',data.setting['stars']);
//               $('.user_info .fa-star').css('color',data.setting['unfilled_stars']);
//               $('.user_info .checked').css('color',data.setting['stars']);

$('.review_progress_1 .side .fa-star').css('color', data.setting['filled_stars']);
$('.bar-container').css('background-color', data.setting['bar_unfilled']);
$('.bar-5').css('background-color', data.setting['bar_filled']);
$('.bar-4').css('background-color', data.setting['bar_filled']);
$('.bar-3').css('background-color', data.setting['bar_filled']);
$('.bar-2').css('background-color', data.setting['bar_filled']);
$('.bar-1').css('background-color', data.setting['bar_filled']);
//               $('#main-body').css('color',data.setting['text']);
$('.active_tab a span').css('background-color', data.setting['tabs_counter_background']);
$('.active_tab').css({
'background-color': data.setting['tabs_background'],
'border-bottom': '3px solid' + data.setting['tabs_border_bottom'],
});
$(document).on("click", ".reviews_tab", function() {
if ($(this).hasClass('active_tab')) {
$('.questions_tab').removeClass('active_tab');
$('.questions_tab').attr("style", "");
$('#total_reviews').attr("style", "");
$('#total_questions').attr("style", "");
$('#total_reviews').css('background-color', data.setting['tabs_counter_background']);
$('.active_tab').css({
'background-color': data.setting['tabs_background'],
'border-bottom': '3px solid' + data.setting['tabs_border_bottom'],
});
}
});

$(document).on("click", ".questions_tab", function() {
if ($(this).hasClass('active_tab')) {
$('.reviews_tab').removeClass('active_tab');
$('.reviews_tab').attr("style", "");
$('#total_reviews').attr("style", "");
$('#total_questions').attr("style", "");
$('#total_questions').css('background-color', data.setting['tabs_counter_background']);
$('.active_tab').css({
'background-color': data.setting['tabs_background'],
'border-bottom': '3px solid' + data.setting['tabs_border_bottom'],
});
}
});

//                $('.user_pic').css('background-color',data.setting['circle_background']);
//               $('.user_pic_inner h3').css('color',data.setting['circle_text']);
//               $('.review_reply').css('border-left','5px solid'+data.setting['reply_border']);
//               $('.user_info h3').css('color',data.setting['text']);
//               $('.user_info h3 span').css('color',data.setting['circle_background']);
//               $('.replier_name h4').css('color',data.setting['text']);

}


}


});

$(document).find('#upload_image').empty();
$(document).find('#upload_image').text('Upload an Image');
$(document).on("change", "#file-upload", function() {
filename = this.files[0].name
$(document).find('#upload_image').empty();
$(document).find('#upload_image').append(filename);
});


$(document).on("click", ".for-like", function() {
var thiss = $(this);
var review_id = $($(this)).siblings('.like').data('value');
if (thiss.hasClass('blue-color')) {
console.log('you have already liked');
} else {
$.ajax({
url: base_url + "update-likes?product_id=" + id + "&shop_name=" + name + "&review_id=" + review_id,
type: 'GET',
success: function(data) {
$(thiss).siblings('.like').empty();
$(thiss).siblings('.like').append(data.likes);
thiss.removeClass('black-color');
thiss.addClass('blue-color');
thiss.parents('.like_dislike').find('.for-dislike').removeClass('blue-color');
thiss.parents('.like_dislike').find('.for-dislike').addClass('black-color');
thiss.parents('.like_dislike').find('.dislike').empty();
thiss.parents('.like_dislike').find('.dislike').append(data.dislikes);

}
});
}

});


$(document).on("click", ".for-dislike", function() {
var thiss = $(this);
var review_id = $($(this)).siblings('.dislike').data('value');
if (thiss.hasClass('blue-color')) {
console.log('you have already disliked');
} else {
$.ajax({
url: base_url + "update-dislikes?product_id=" + id + "&shop_name=" + name + "&review_id=" + review_id,
type: 'GET',
success: function(data) {
$(thiss).siblings('.dislike').empty();
$(thiss).siblings('.dislike').append(data.dislikes);
thiss.removeClass('black-color');
thiss.addClass('blue-color');
thiss.parents('.like_dislike').find('.for-like').removeClass('blue-color');
thiss.parents('.like_dislike').find('.for-like').addClass('black-color');
thiss.parents('.like_dislike').find('.like').empty();
thiss.parents('.like_dislike').find('.like').append(data.likes);
}
});
}

});

$(document).on("click", ".q-like", function() {
var thiss = $(this);
var question_id = thiss.siblings('.like-q').data('value');
if (thiss.hasClass('blue-color')) {
console.log('you have already liked');
} else {
$.ajax({
url: base_url + "update-question-likes?product_id=" + id + "&shop_name=" + name + "&question_id=" + question_id,
type: 'GET',
success: function(data) {
$(thiss).siblings('.like-q').empty();
$(thiss).siblings('.like-q').append(data.likes);
thiss.removeClass('black-color');
thiss.addClass('blue-color');
thiss.parents('.like_dislike').find('.q-dislike').removeClass('blue-color');
thiss.parents('.like_dislike').find('.q-dislike').addClass('black-color');
thiss.parents('.like_dislike').find('.dislike-q').empty();
thiss.parents('.like_dislike').find('.dislike-q').append(data.dislikes);

}
});
}

});


$(document).on("click", ".q-dislike", function() {
var thiss = $(this);
var question_id = thiss.siblings('.dislike-q').data('value');
if (thiss.hasClass('blue-color')) {
console.log('you have already disliked');
} else {
$.ajax({
url: base_url + "update-question-dislikes?product_id=" + id + "&shop_name=" + name + "&question_id=" + question_id,
type: 'GET',
success: function(data) {
$(thiss).siblings('.dislike-q').empty();
$(thiss).siblings('.dislike-q').append(data.dislikes);
thiss.removeClass('black-color');
thiss.addClass('blue-color');
thiss.parents('.like_dislike').find('.q-like').removeClass('blue-color');
thiss.parents('.like_dislike').find('.q-like').addClass('black-color');
thiss.parents('.like_dislike').find('.like-q').empty();
thiss.parents('.like_dislike').find('.like-q').append(data.likes);
}
});
}

});

$(document).on("change", "#sort_review", function(e) {
var optionSelected = $("option:selected", this);
var valueSelected = this.value;

$.ajax({
url: base_url + "filter-reviews?product_id=" + id + "&shop_name=" + name + "&filter_value=" + valueSelected,
type: 'GET',
success: function(data) {
if (data.reviews != 'no reviews') {
$('#user_reviews').html(data.reviews);
} else {
console.log('there are no reviews for this filter')
}
$('#clear_review_filter').css('display', 'block');
$('#review_pagination').css('display', 'none');
}
});
});


$(document).on("click", "#clear_review_filter", function() {
$(this).css('display', 'none');
$('#sort_review option[value=sort]').prop('selected', true);
$.ajax({
url: base_url + "get-data?product_id=" + id + "&shop_name=" + name,
type: 'GET',
success: function(data) {

$('#br_reviews_widget_wrapper').html(data.html);
$(document).find('.stamped-pagination').empty();
var total = $(data.paginate['links']).length;
var next_url = data.paginate['next_page_url'] + '&shop_name=' + name + '&product_id=' + id;
$(data.paginate['links']).each(function(index) {
//                    if (index === 0) {
//                        $('.stamped-pagination').append("<li class='previous'><a href='javascript:void(0)' id='previous' data-page='' class='paginate_link' aria-label='Previous page'>&lt;</a></li>");
//                   	}
if (index != 0) {
if (index != total - 1) {
if (total != 3) {
var url_link = data.paginate['links'][index]['url'] + '&shop_name=' + name + '&product_id=' + id;
if (index == 1) {
$('.stamped-pagination').append("<li class='page active'><a href='javascript:void(0)' data-page='" + url_link + "' class='paginate_link' aria-label='Page 1'>" + index + "</a></li>");
} else {
$('.stamped-pagination').append("<li class='page'><a href='javascript:void(0)' data-page='" + url_link + "' class='paginate_link' aria-label='Page 1'>" + index + "</a></li>");
}
}
}
//           			 if (index === total - 1) {

//                      $('.stamped-pagination').append("<li class='next'><a href='javascript:void(0)' id='next' data-page='"+next_url+"' class='paginate_link' aria-label='Next page'>&gt;</a></li>");

//                   	}

}

});

$('.stamped-question').empty();
var total = $(data.paginate_q['links']).length;

var next_url = data.paginate_q['next_page_url'] + '&shop_name=' + name + '&product_id=' + id;
$(data.paginate_q['links']).each(function(index) {
//                    if (index === 0) {
//                        $('.stamped-question').append("<li class='previous'><a href='javascript:void(0)' id='previous_question' data-page='' class='question_link' aria-label='Previous page'>&lt;</a></li>");
//                   	}
if (index != 0) {
if (index != total - 1) {
if (total != 3) {
var url_link = data.paginate_q['links'][index]['url'] + '&shop_name=' + name + '&product_id=' + id;
if (index == 1) {
$('.stamped-question').append("<li class='question_page active'><a href='javascript:void(0)' data-page='" + url_link + "' class='question_link' aria-label='Page 1'>" + index + "</a></li>");
} else {
$('.stamped-question').append("<li class='question_page'><a href='javascript:void(0)' data-page='" + url_link + "' class='question_link' aria-label='Page 1'>" + index + "</a></li>");
}
}
}
//           			 if (index === total - 1) {

//                      $('.stamped-question').append("<li class='next'><a href='javascript:void(0)' id='next_question' data-page='"+next_url+"' class='question_link' aria-label='Next page'>&gt;</a></li>");

//                   	}
}

});

}

});

$('#review_pagination').css('display', 'block');
});


$(document).on("keypress", "#question_search", function() {
if (event.which == 13) {
var search_data = $('#question_search').val();
$.ajax({
url: base_url + "filter-questions?product_id=" + id + "&shop_name=" + name + "&search_data=" + search_data,
type: 'GET',
success: function(data) {
if (data.questions != 'no questions') {
$('#user_questions').html(data.questions);
} else {
console.log('there are no questions for this filter')
}

$('#clear_filter').css('display', 'block');
$('#question_pagination').css('display', 'none');
}
});

}
});
$(document).on("click", "#clear_filter", function() {

$(this).css('display', 'none');
$('#question_search').val('');
$.ajax({
url: base_url + "get-data?product_id=" + id + "&shop_name=" + name,
type: 'GET',
success: function(data) {

$('#br_reviews_widget_wrapper').html(data.html);
$('.stamped-pagination').empty();
var total = $(data.paginate['links']).length;
var next_url = data.paginate['next_page_url'] + '&shop_name=' + name + '&product_id=' + id;
$(data.paginate['links']).each(function(index) {
//                    if (index === 0) {
//                        $('.stamped-pagination').append("<li class='previous'><a href='javascript:void(0)' id='previous' data-page='' class='paginate_link' aria-label='Previous page'>&lt;</a></li>");
//                   	}
if (index != 0) {
if (index != total - 1) {
if (total != 3) {
var url_link = data.paginate['links'][index]['url'] + '&shop_name=' + name + '&product_id=' + id;
if (index == 1) {
$('.stamped-pagination').append("<li class='page active'><a href='javascript:void(0)' data-page='" + url_link + "' class='paginate_link' aria-label='Page 1'>" + index + "</a></li>");
} else {
$('.stamped-pagination').append("<li class='page'><a href='javascript:void(0)' data-page='" + url_link + "' class='paginate_link' aria-label='Page 1'>" + index + "</a></li>");
}
}
}
//           			 if (index === total - 1) {

//                      $('.stamped-pagination').append("<li class='next'><a href='javascript:void(0)' id='next' data-page='"+next_url+"' class='paginate_link' aria-label='Next page'>&gt;</a></li>");

//                   	}

}

});

$('.stamped-question').empty();
var total = $(data.paginate_q['links']).length;

var next_url = data.paginate_q['next_page_url'] + '&shop_name=' + name + '&product_id=' + id;
$(data.paginate_q['links']).each(function(index) {
//                    if (index === 0) {
//                        $('.stamped-question').append("<li class='previous'><a href='javascript:void(0)' id='previous_question' data-page='' class='question_link' aria-label='Previous page'>&lt;</a></li>");
//                   	}
if (index != 0) {
if (index != total - 1) {
if (total != 3) {
var url_link = data.paginate_q['links'][index]['url'] + '&shop_name=' + name + '&product_id=' + id;
if (index == 1) {
$('.stamped-question').append("<li class='question_page active'><a href='javascript:void(0)' data-page='" + url_link + "' class='question_link' aria-label='Page 1'>" + index + "</a></li>");
} else {
$('.stamped-question').append("<li class='question_page'><a href='javascript:void(0)' data-page='" + url_link + "' class='question_link' aria-label='Page 1'>" + index + "</a></li>");
}
}
}
//           			 if (index === total - 1) {

//                      $('.stamped-question').append("<li class='next'><a href='javascript:void(0)' id='next_question' data-page='"+next_url+"' class='question_link' aria-label='Next page'>&gt;</a></li>");

//                   	}
}

});

}

});
$('#question_pagination').css('display', 'block');
});

$(document).on("click", "#reviews", function(e) {
e.preventDefault();
});
$(document).on("click", "#questions", function(e) {
e.preventDefault();
});

});


$(document).on("submit", "#review", function(e) {
e.preventDefault(); // avoid to execute the actual submit of the form.

var form = new FormData(this);
var url = $(this).attr('action');
$.ajax({
type: "POST",
url: url,
data: form, // serializes the form's elements.
cache: false,
contentType: false,
processData: false,
success: function(data) {

if (data.success == 'submited') {
$('#reviews_tab_content').css('display', '');
$('.write_a_review').css('display', '');
$('#facebook_share').attr('href', data.facebook_link);
$('#twitter_share').attr('href', data.twitter_link);
$('#thanks_msj').css('display', 'block');
setTimeout(function() {
$('#thanks_msj').css('display', 'none');
}, 5000);
$("#review")[0].reset();
$('.list_item').empty();
$('.list_item').append('&#9734;');
} else {
console.log('Some thing went Wrong!');
}
}
});

});

$(document).on("submit", "#question", function(e) {
e.preventDefault(); // avoid to execute the actual submit of the form.

var form = $(this).serialize();
var url = $(this).attr('action');
$.ajax({
type: "POST",
url: url,
data: form, // serializes the form's elements.
success: function(data) {
if (data.success == 'submited') {
$('#questions_tab_content').css('display', '');
$('.ask_a_question').css('display', '');
$('#thanks_msj_qus').css('display', 'block');
setTimeout(function() {
$('#thanks_msj_qus').css('display', 'none');
}, 5000);
$("#question")[0].reset();
} else {
console.log('Some thing went Wrong!');
}
}
});
});

}
};
ppTyInitialise();
})();
