<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['verify.shopify']], function () {

    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('home');

    //Products
    Route::get('products', [App\Http\Controllers\ProductController::class, 'Products'])->name('products');
    Route::get('product-detail/{id}', [App\Http\Controllers\ProductController::class, 'ProductDetail'])->name('product.detail');
    Route::get('sync-products', [App\Http\Controllers\ProductController::class, 'ShopifyProducts'])->name('sync.products');
    Route::post('fake-stats', [App\Http\Controllers\ProductController::class, 'FakeStats'])->name('fake.stats');
    Route::get('products-filter', [App\Http\Controllers\ProductController::class, 'ProductsFilter'])->name('products.filter');

    // Reviews
    Route::get('review-request', [App\Http\Controllers\ReviewController::class, 'ReviewRequest'])->name('review.request');
    Route::get('review-view/{id}', [App\Http\Controllers\ReviewController::class, 'ReviewDetail'])->name('review.view');
    Route::get('review-feature/{id}', [App\Http\Controllers\ReviewController::class, 'ReviewFeature'])->name('review.feature');
    Route::post('review-update', [App\Http\Controllers\ReviewController::class, 'ReviewUpdate'])->name('review.update');
    Route::post('review-reply', [App\Http\Controllers\ReviewController::class, 'ReviewReply'])->name('review.reply');
    Route::get('verify-review/{id}', [App\Http\Controllers\ReviewController::class, 'ReviewVerify'])->name('verify.review');
    Route::get('reply-delete/{id}', [App\Http\Controllers\ReviewController::class, 'ReplyDelete'])->name('reply.delete.review');
    Route::get('review-pending/{id}', [App\Http\Controllers\ReviewController::class, 'ReviewPending'])->name('review.pending');
    Route::get('review-publish/{id}', [App\Http\Controllers\ReviewController::class, 'ReviewPublish'])->name('review.publish');
    Route::get('review-archive/{id}', [App\Http\Controllers\ReviewController::class, 'ReviewArvhive'])->name('review.archive');
    Route::get('review-delete/{id}', [App\Http\Controllers\ReviewController::class, 'ReviewDelete'])->name('review.delete');
    Route::post('add-photo', [App\Http\Controllers\ReviewController::class, 'ReviewAddPhoto'])->name('add.photo');
    Route::get('add-review/{id}', [App\Http\Controllers\ReviewController::class, 'AddNewReview'])->name('add.review');
    Route::post('update.photos', [App\Http\Controllers\ReviewController::class, 'UpdatePhotos'])->name('update.photos');
    Route::get('reviews-filter', [App\Http\Controllers\ReviewController::class, 'ReviewsFilter'])->name('reviews.filter');

    //Questions
    Route::get('question-request', [App\Http\Controllers\QuestionController::class, 'QuestionRequest'])->name('question.request');
    Route::get('question-publish/{id}', [App\Http\Controllers\QuestionController::class, 'QuestionPublish'])->name('question.publish');
    Route::get('question-view/{id}', [App\Http\Controllers\QuestionController::class, 'QuestionView'])->name('question.view');
    Route::post('question-reply', [App\Http\Controllers\QuestionController::class, 'QuestionReply'])->name('question.reply');
    Route::post('question.update', [App\Http\Controllers\QuestionController::class, 'QuestionUpdate'])->name('question.update');
    Route::get('reply.delete/{id}', [App\Http\Controllers\QuestionController::class, 'QuestionReplyDelete'])->name('reply.delete');
    Route::get('verify-question/{id}', [App\Http\Controllers\QuestionController::class, 'QuestionVerify'])->name('verify.question');
    Route::get('question-delete/{id}', [App\Http\Controllers\QuestionController::class, 'QuestionDelete'])->name('question.delete');
    Route::get('add-question/{id}', [App\Http\Controllers\QuestionController::class, 'AddNewQuestion'])->name('add.question');
    Route::get('question-filter', [App\Http\Controllers\QuestionController::class, 'QuestionFilter'])->name('question.filter');

    // Settings
    Route::get('settings', [App\Http\Controllers\AdminController::class, 'ThemeSettings'])->name('settings');
    Route::any('setting-save', [App\Http\Controllers\AdminController::class, 'SettingSave'])->name('setting.save');



    Route::get('/testing', function() {

        $shop = \Illuminate\Support\Facades\Auth::user();




        $response = $shop->api()->rest('GET', '/admin/script_tags.json');

        dd($response);
    })->name('getwebbhook');
});

    //Review Submit
    Route::post('review-submit', [App\Http\Controllers\ReviewController::class, 'ReviewSubmit'])->name('review.submit');

    //Question Submit
    Route::post('question-submit', [App\Http\Controllers\QuestionController::class, 'QuestionSubmit'])->name('question.submit');
    // html append
    Route::get('get-data', [App\Http\Controllers\AdminController::class, 'HtmlAppend'])->name('get.data');
    //Customer Location
    Route::get('customer-location',  [App\Http\Controllers\ReviewController::class, 'CustomerLocation'])->name('customer.location');

    //Reviews append
    Route::get('get-reviews',  [App\Http\Controllers\ReviewController::class, 'AppendReviews'])->name('get.reviews');

    //Questions append
    Route::get('get-questions',  [App\Http\Controllers\QuestionController::class, 'AppendQuestions'])->name('get.questions');

    //Review likes
    Route::get('update-likes',  [App\Http\Controllers\ReviewController::class, 'UpdateLikes'])->name('update.likes');
    //Review Dislikes
    Route::get('update-dislikes',  [App\Http\Controllers\ReviewController::class, 'UpdateDisLikes'])->name('update.dislikes');

    // Question likes
    Route::get('update-question-likes',  [App\Http\Controllers\QuestionController::class, 'UpdateQuestionLikes'])->name('update.question.likes');
    //Question Dislikes
    Route::get('update-question-dislikes',  [App\Http\Controllers\QuestionController::class, 'UpdateQuestionDisLikes'])->name('update.question.dislikes');
    // Setting
    Route::get('get-setting',  [App\Http\Controllers\AdminController::class, 'GetSetting'])->name('get.setting');
    // Filter Reviews
    Route::get('filter-reviews',  [App\Http\Controllers\ReviewController::class, 'FilterReviews'])->name('filter.reviews');
    Route::get('filter-on-stars',  [App\Http\Controllers\ReviewController::class, 'FilterOnStars'])->name('filter.on.stars');

    //Filter Questions
    Route::get('filter-questions',  [App\Http\Controllers\QuestionController::class, 'FilterQuestions'])->name('filter.questions');
    Route::get('questions-filter',  [App\Http\Controllers\QuestionController::class, 'QuestionsFilter'])->name('questions.filter');

    // Share facebook
    Route::get('on-facebook',  [App\Http\Controllers\AdminController::class, 'ShareFacebook'])->name('on.facebook');
    Route::get('on-facebook-q',  [App\Http\Controllers\AdminController::class, 'ShareFacebookQ'])->name('on.facebook.q');
    // Share twitter
    Route::get('on-twitter',  [App\Http\Controllers\AdminController::class, 'ShareTwitter'])->name('on.twitter');
    // popup
    Route::get('get-popup',  [App\Http\Controllers\ReviewController::class, 'GetPopup'])->name('get.popup');

    // loadscript
    Route::get('script-js',  [App\Http\Controllers\AdminController::class, 'LoadScript'])->name('script.js');
    // product page
    Route::get('on-product',  [App\Http\Controllers\AdminController::class, 'ProductPage'])->name('on.product');





