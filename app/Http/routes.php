<?php

$app->get('/', function() {
   return view('index');
});

$app->get('/setup', 'VoteController@setup');
$app->get('/vote/{id}', 'VoteController@show');
$app->get('/queue/{id}', 'VoteController@queue');
