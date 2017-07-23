<?php
use App\Controllers as Controllers;

$app->get('/users', function ($request, $response, $args) {
    $users = new Controllers\User($this);
    $todos = $users->AllUsers();
    return $this->response->withJson($todos);
});
$app->post('/user/new', function ($request, $response, $args) {
    $ticket_id = "teste";
    $response->getBody()->write($ticket_id );
    return $response;
});

$app->get('/user/{id}', function ($request, $response, $args) {
    $ticket_id = (int)$args['id'];
    $response->getBody()->write($ticket_id );
    return $response;
});

$app->put('/user/edit/{id}', function ($request, $response, $args) {
    $ticket_id = (int)$args['id'];
    $response->getBody()->write($ticket_id );
    return $response;
});

$app->delete('/user/del/{id}', function ($request, $response, $args) {
    $ticket_id = (int)$args['id'];
    $response->getBody()->write($ticket_id );
    return $response;
});