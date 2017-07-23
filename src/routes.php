<?php
use App\Controllers as Controllers;

$app->get('/[{name}]', function ($request, $response, $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});

// $app->get('/users[/]', function ($request, $response, $args) {
//     $users = new Controllers\User($this);
//     $todos = $users->AllUsers();
//     return $this->response->withJson($todos);
// });

// $app->get('/user/{id}[/]', function ($request, $response, $args) {
//     $user = new Controllers\User($this);
//     $return = $user->getUser($args['id']);
//     return $response->withJson($return);
// });

// $app->post('/user[/]', function ($request, $response, $args) {
//     $content = $request->getParsedBody();
//     $user = new Controllers\User($this);
//     if($user->addNew($content)) {
//         return $response->getBody()->write($request->getBody());
//     } else {
//         return false;
//     }
// });

// $app->put('/user/{id}[/]', function ($request, $response, $args) {
//     $id = $args['id'];
//     $content = $request->getParsedBody();
//     $user = new Controllers\User($this);
//     if($user->updUser($id,$content)) {
//         return "{ 'id' : " . $id . "}";
//     } else {
//         return false;
//     }
// });

// $app->delete('/user/{id}[/]', function ($request, $response, $args) {
//     $id = $args['id'];
//     $user = new Controllers\User($this);
//     if($user->delUser($id)) {
//         return "{ 'id' : " . $id . "}";
//     } else {
//         return false;
//     }
// });