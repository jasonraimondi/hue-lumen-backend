<?php

$app->get('/setup', 'VoteController@setup');
$app->get('/vote/{id}', 'VoteController@show');
