<?php
// Be careful with variables in routes. Some cases of using variables can break other routes.


$router->post("/api/account/login", "account@login" );
$router->post("/api/account/register", "account@register" );
$router->post("/api/account/logout", "account@logout" );
$router->get("/api/account", "account@index");



$router->get("/api/favorites", "favorites@list");
$router->post("/api/favorites/{id}/add", "favorites@add");
$router->delete("/api/favorites/{id}/delete", "favorites@delete");

$router->get("/api/movies/{page}", "movies@showPage");
$router->get("/api/movies/details/{id}", "movies@details");
$router->post("/api/movies/add", "movies@add");

$router->post("/api/movie/{id}/review/add", "reviews@add");
$router->put("/api/movie/{id}/review/edit", "reviews@edit");
$router->delete("/api/movie/{id}/review/delete", "reviews@delete");

$router->get("/api/account/profile", "account@getUserInfo");
$router->put("/api/account/profile", "account@editUserInfo");

