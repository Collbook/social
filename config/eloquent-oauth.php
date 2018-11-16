<?php

use App\User;

return [
    'model' => User::class,
    'table' => 'oauth_identities',
    'providers' => [
        'facebook' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/facebook/redirect',
            'scope' => [],
        ],
        'google' => [
            'client_id' => '746873695778-asrah4prqlfm4fds4grmafi8pn9c9o2s.apps.googleusercontent.com',
            'client_secret' => 'B_q9gHMV45UtYCI7vO_LSsc8',
            'redirect_uri' => 'http://social.test/google/redirect',
            'scope' => [],
        ],
        'github' => [
            'client_id' => '2a7ff69561b4e46ded7d',
            'client_secret' => 'd4932f686b7bbd0ee7eed7c04b0412481be8dc06',
            'redirect_uri' => 'http://social.test/github/redirect',
            'scope' => [],
        ],
        'linkedin' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/linkedin/redirect',
            'scope' => [],
        ],
        'instagram' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/instagram/redirect',
            'scope' => [],
        ],
        'soundcloud' => [
            'client_id' => '12345678',
            'client_secret' => 'y0ur53cr374ppk3y',
            'redirect_uri' => 'https://example.com/your/soundcloud/redirect',
            'scope' => [],
        ],
    ],
];
