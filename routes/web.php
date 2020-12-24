<?php
use Illuminate\Support\Facades\Route as route;

route::get('/', function () {
    return view('welcome');
});

