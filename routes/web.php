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

    // Reviews
    Route::get('review-request', [App\Http\Controllers\ReviewController::class, 'ReviewRequest'])->name('review.request');
    Route::get('review.view/{id}', [App\Http\Controllers\ReviewController::class, 'ReviewDetail'])->name('review.view');
    Route::get('review-feature/{id}', [App\Http\Controllers\ReviewController::class, 'ReviewFeature'])->name('review.feature');
    Route::post('review-update', [App\Http\Controllers\ReviewController::class, 'ReviewUpdate'])->name('review.update');
    Route::post('review-reply', [App\Http\Controllers\ReviewController::class, 'ReviewReply'])->name('review.reply');
    Route::get('verify-review/{id}', [App\Http\Controllers\ReviewController::class, 'ReviewVerify'])->name('verify.review');
    Route::get('reply-delete/{id}', [App\Http\Controllers\ReviewController::class, 'ReplyDelete'])->name('reply.delete');
    Route::get('review.pending/{id}', [App\Http\Controllers\ReviewController::class, 'ReviewPending'])->name('review.pending');
    Route::get('review.publish/{id}', [App\Http\Controllers\ReviewController::class, 'ReviewPublish'])->name('review.publish');
    Route::get('review.archive/{id}', [App\Http\Controllers\ReviewController::class, 'ReviewArvhive'])->name('review.archive');
    Route::get('review-delete/{id}', [App\Http\Controllers\ReviewController::class, 'ReviewDelete'])->name('review.delete');
    Route::post('add-photo', [App\Http\Controllers\ReviewController::class, 'ReviewAddPhoto'])->name('add.photo');
    Route::get('add-review/{id}', [App\Http\Controllers\ReviewController::class, 'AddNewReview'])->name('add.review');
    Route::post('update.photos', [App\Http\Controllers\ReviewController::class, 'UpdatePhotos'])->name('update.photos');

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

    // Settings
    Route::get('settings', [App\Http\Controllers\AdminController::class, 'ThemeSettings'])->name('settings');
    Route::post('setting-save', [App\Http\Controllers\AdminController::class, 'SettingSave'])->name('setting.save');

});

    //Review Submit
    Route::post('review-submit', [App\Http\Controllers\ReviewController::class, 'ReviewSubmit'])->name('review.submit');

    //Question Submit
    Route::post('question-submit', [App\Http\Controllers\QuestionController::class, 'QuestionSubmit'])->name('question.submit');

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


