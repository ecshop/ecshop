<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::any('/', 'IndexController@index');
    Route::any('/activity.php', 'ActivityController@index');
    Route::any('/affiche.php', 'AfficheController@index');
    Route::any('/affiliate.php', 'AffiliateController@index');
    Route::any('/article_cat.php', 'ArticleCatController@index');
    Route::any('/article.php', 'ArticleController@index');
    Route::any('/auction.php', 'AuctionController@index');
    Route::any('/brand.php', 'BrandController@index');
    Route::any('/captcha.php', 'CaptchaController@index');
    Route::any('/catalog.php', 'CatalogController@index');
    Route::any('/category.php', 'CategoryController@index');
    Route::any('/comment.php', 'CommentController@index');
    Route::any('/compare.php', 'CompareController@index');
    Route::any('/exchange.php', 'ExchangeController@index');
    Route::any('/feed.php', 'FeedController@index');
    Route::any('/flow.php', 'FlowController@index');
    Route::any('/gallery.php', 'GalleryController@index');
    Route::any('/goods.php', 'GoodsController@index');
    Route::any('/group_buy.php', 'GroupBuyController@index');
    Route::any('/message.php', 'MessageController@index');
    Route::any('/myship.php', 'MyshipController@index');
    Route::any('/package.php', 'PackageController@index');
    Route::any('/pick_out.php', 'PickOutController@index');
    Route::any('/quotation.php', 'QuotationController@index');
    Route::any('/receive.php', 'ReceiveController@index');
    Route::any('/region.php', 'RegionController@index');
    Route::any('/respond.php', 'RespondController@index');
    Route::any('/search.php', 'SearchController@index');
    Route::any('/sitemaps.php', 'SitemapsController@index');
    Route::any('/snatch.php', 'SnatchController@index');
    Route::any('/tag_cloud.php', 'TagCloudController@index');
    Route::any('/topic.php', 'TopicController@index');
    Route::any('/vote.php', 'VoteController@index');
    Route::any('/wholesale.php', 'WholesaleController@index');
});
