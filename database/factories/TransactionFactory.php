<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Seller;
use App\Models\Transaction;
use App\User;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {

    $seller = Seller::has('products')->get()->random();
    $buyer = User::all()->except($seller->id)->random();

    return [
        'quantity' => rand(1,3),
        'product_id'=>$seller->products->random()->id,
        'buyer_id'=>$buyer->id
    ];
});
