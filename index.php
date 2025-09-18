<?php

require("router2.php");
require("base.php");





app::get("/", function(){

    echo("Hello World");

});

// test routes:

app::get("/cars/{id}", function($id){

    echo("Car with id: " . $id);

});

app::get("/cars/{brand}/model/{id}", function($brand, $id){

    echo("A " . $brand . " with id: " . $id);

});

app::get("/cars/{brand}/{model}/{id}", function($brand, $model, $id){

    echo("A " . $brand . " " . $model . " with id: " . $id);

});



// Old routes:


/* app::get("/create/car", function(){

    include("createCar.php");

}); */




/* 
app::post("/save/car", function($data){

    app::debug($data);

}); */


app::listen();

