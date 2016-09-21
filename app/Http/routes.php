<?php

$app->get('/', 'PhoneController@index');
$app->post('/sendText', 'PhoneController@send');

$app->get('/setup', 'VoteController@setup');
$app->get('/vote/{sceneName}', 'VoteController@show');
$app->get('/queue/{sceneName}', 'VoteController@queue');

