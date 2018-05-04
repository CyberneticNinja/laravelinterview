<?php

use Faker\Generator as Faker;

$factory->define(App\UserList::class, function (Faker $faker) {
$title = [
  'Work',
  'Home',
  'Goals',
  'Birthdays',
  'Diet',
  'Friends',
  'Family'
];

$userlisttitle = $title[rand(0,6)];
    return [
      'title' => $userlisttitle,
      'users_id' => 1
    ];
});
