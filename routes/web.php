<?php

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
//namespace SendGrid;
//
Route::get('/', function () {

    return view('welcome');
});

Route::get('/send', function () {

    $from = new SendGrid\Email("桃原momobaru", "info@momobaru.com");
    $subject = "どーも";
    $to = new SendGrid\Email("to-name", "xxx@gmail.com");
    $content = new SendGrid\Content("text/plain", "hi どーもどーも");
    $mail = new SendGrid\Mail($from, $subject, $to, $content);

    $apiKey = getenv('SENDGRID_API_KEY');
    $sg = new \SendGrid($apiKey);

    $response = $sg->client->mail()->send()->post($mail);
    echo $response->statusCode();
    print_r($response->headers());
    echo $response->body();

//    return view('welcome');


});
