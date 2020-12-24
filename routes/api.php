<?php
use Illuminate\Support\Facades\Route as route;

// Users endpoints
route::apiResource('users', 'User\UserController', [ 'except'=>['create','edit'] ]);

// Buyers endpoints
route::apiResource('buyers', 'Buyer\BuyerController', [ 'only'=>['index','show'] ]);

// Sellers endpoints
route::apiResource('sellers', 'Seller\SellerController', [ 'only'=>['index','show'] ]);

// Categories endpoints
route::apiResource('categories', 'Category\CategoryController', [ 'except'=>['create','edit'] ]);

// Products endpoints
route::apiResource('products', 'Product\ProductController', [ 'only'=>['index','show'] ]);

// Transactions endpoints
route::apiResource('transactions', 'Transaction\TransactionController', [ 'only'=>['index','show'] ]);

