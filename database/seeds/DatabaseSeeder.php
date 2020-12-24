<?php

use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Product::truncate();
        Transaction::truncate();
        Category::truncate();
        DB::table('product_categories')->truncate();


        factory(User::class, 500)->create();
        factory(Category::class, 50)->create();
        factory(Product::class, 400)->create()->each(
            function ($product){
                $categories = Category::all()->random( mt_rand(1,5) )->pluck('id');
                $product->categories()->attach( $categories );
            }
        );

        factory(Transaction::class, 500)->create();
    }
}
