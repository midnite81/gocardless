<?php

use Faker\Generator as Faker;


$factory->define(\Midnite81\GoCardless\Models\Transaction::class, function (Faker $faker) {
    return [
        'transactionable_type' => 'App\User',
        'transactionable_id' => '1',
        'action' => $faker->word,
    ];
});

$factory->define(\Midnite81\GoCardless\Models\Transaction\Data::class, function (Faker $faker) {
    return [
        'transaction_id' => 1,
        'key' => $faker->word,
        'value' => $faker->word,
    ];
});
