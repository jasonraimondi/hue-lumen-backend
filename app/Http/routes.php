<?php

$app->get('/', 'PhoneController@index');
$app->post('/sendText', 'PhoneController@send');

$app->get('/setup', 'VoteController@setup');
$app->get('/vote/{id}', 'VoteController@show');
$app->get('/queue/{id}', 'VoteController@queue');

