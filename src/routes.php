<?php
use App\Controllers as Controllers;

$app->get('/users', function ($request, $response, $args) {
    $users = new Controllers\User($this);
    $todos = $users->AllUsers();
    return $this->response->withJson($todos);
});
$app->post('/user/new', function ($request, $response, $args) {
    $content = $request->getParsedBody();
    $user = new Controllers\User($this);
    if($user->addNew($content)) {
        return $response->getBody()->write($request->getBody());
    } else {
        return false;
    }
});

$app->get('/user/{id}', function ($request, $response, $args) {
    $user = new Controllers\User($this);
    $return = $user->getUser($args['id']);
    return $response->withJson($return);
});

$app->put('/user/edit/{id}', function ($request, $response, $args) {
    $ticket_id = (int)$args['id'];
    $response->getBody()->write($ticket_id );
    return $response;
});

$app->delete('/user/del/{id}', function ($request, $response, $args) {
    $user = new Controllers\User($this);
    if($user->delUser($args['id'])) {
        return $response->getBody()->write($request->getBody());
    } else {
        return false;
    }
});