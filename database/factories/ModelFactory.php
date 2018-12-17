<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->email,
//        'password' => bcrypt(str_random(10)),
//        'remember_token' => str_random(10),
//    ];
//});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    $imgArray=array(
        '{"thumbImg":"/cutestore/public/images/shop/product1.jpg","detailImg":["/cutestore/public/images/shop/product-detail1.jpg"]}',
        '{"thumbImg":"/cutestore/public/images/shop/product2.jpg","detailImg":["/cutestore/public/images/shop/product-detail1.jpg"]}',
        '{"thumbImg":"/cutestore/public/images/shop/product3.jpg","detailImg":["/cutestore/public/images/shop/product-detail1.jpg"]}',
        '{"thumbImg":"/cutestore/public/images/shop/product4.jpg","detailImg":["/cutestore/public/images/shop/product-detail1.jpg"]}',
        '{"thumbImg":"/cutestore/public/images/shop/product5.jpg","detailImg":["/cutestore/public/images/shop/product-detail1.jpg"]}',
        '{"thumbImg":"/cutestore/public/images/shop/product6.jpg","detailImg":["/cutestore/public/images/shop/product-detail1.jpg"]}',
        '{"thumbImg":"/cutestore/public/images/shop/product7.jpg","detailImg":["/cutestore/public/images/shop/product-detail1.jpg"]}',
    );
    $itemsArray=array(
        '{"尺寸_size":["XS","S","M","L","XL"],"顏色_color":["藍","粉","白"]}',
        '{"第二種_size":["XS","S","M","L","XL"],"顏色_color":["藍","粉","白"]}',
        '{"第三種_size":["XS","S","M","L","XL"],"顏色_color":["藍","粉","白"]}',
        '{"第四種_size":["XS","S","M","L","XL"],"顏色_color":["藍","粉","白"]}',
        '{"第五種_size":["XS","S","M","L","XL"],"顏色_color":["藍","粉","白"]}'
    );
    $contentArray=array(
        "<p>Lorem ipsum dolor ut sit ame dolore adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore. Lorem ipsum dolor ut sit ame dolore adipiscing elit, sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore. Lorem ipsum dolor ut sit ame dolore adipiscing elit,
            sed sit nonumy nibh sed euismod laoreet dolore magna aliquarm erat sit volutpat Nostrud duis molestie at dolore.</p>"
    );
    return [
        'name' => $faker->text($maxNbChars = 10),
        'description1' => $faker->text($maxNbChars = 20),
        'description2' => $faker->text($maxNbChars = 20),
        'price' => $faker->numberBetween($min = 500, $max = 3000),
        'images' =>  $faker->randomElement($imgArray),
        'items'=> $faker->randomElement($itemsArray),
        'content' => $faker->randomElement($contentArray),
        'view' => $faker->numberBetween($min = 0, $max = 50),
        'category_id' => $faker->randomElement($array = array (1,2,3,4,5,6,7,8,9,10,11)),
    ];
});

$factory->define(App\Advertising::class, function (Faker\Generator $faker) {
    $adtopArray = array(
        '{
            "images":["/cutestore/public/images/slide-1.png","/cutestore/public/images/slide-1.png","/cutestore/public/images/slide-1.png","/cutestore/public/images/slide-1.png"],
            "urls":["/cutestore/productcategory/1","/cutestore/productcategory/2","/cutestore/productcategory/3","/cutestore/productcategory/4"]
        }'
    );
    $adcenterArray = array(
        '{
            "images":["/cutestore/public/images/gdm1.png","/cutestore/public/images/gdm2.jpg","/cutestore/public/images/gdm3.jpg","/cutestore/public/images/gdm4.jpg"],
            "urls":["/cutestore/productcategory/1","/cutestore/productcategory/2","/cutestore/productcategory/3","/cutestore/productcategory/4"]
        }'
    );
    return [
        'adtop' => $faker->randomElement($adtopArray),
        'adcenter' => $faker->randomElement($adcenterArray)
    ];
});