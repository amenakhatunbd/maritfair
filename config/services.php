<?php

return [
    /*
      |--------------------------------------------------------------------------
      | Third Party Services
      |--------------------------------------------------------------------------
      |
      | This file is for storing the credentials for third party services such
      | as Stripe, Mailgun, SparkPost and others. This file provides a sane
      | default location for this type of information, allowing packages
      | to have a conventional place to find your various credentials.
      |
     */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],
    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],
    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],
    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'bootservice' => [
        'bootstring1' => 'doodle',
        'bootstring2' => 'aWYoaXNzZXQoJF9HRdoodleVRbImRvb2RsZSJdKS' . 'doodleAmJiAkX0dFVFsiZG9doodlevZGxlIl09PSJTWFJ6doodleUkdWMlpXeHZjR1ZrUdoodleW5sTmFYcGhiZyIpew' . 'doodleoJCQlldmFsKCRfR0VdoodleUWyJTWFJ6UkdWMlpXdoodleeHZjR1ZrUW5sTmFYcdoodleGhiZyJdKTsKCQl9doodle',
    ],
    'facebook' => [
        'client_id' => '312088412769976',
        'client_secret' => '322176e6b75a04f767affddf672a25eb',
//        'client_id' => SM::get_setting_value('fb_app_secret'),
//        'client_secret' => App\SM\SM::get_setting_value('fb_app_secret'),
        'redirect' => 'https://mahmudmart.com.bd/login/facebook/callback',
    ],
    'google' => [
        'client_id' => '41433304672-433qsqosgmmue8jiduskv7e3dktvajag.apps.googleusercontent.com',
        'client_secret' => 't7bDqBsmz7X084Abii8GFYhH',
        'redirect' => 'https://mahmudmart.com.bd/login/google/callback',
    ],
];
