<?php

return [
    'enforceSSL' => true,
    'headers' => [
        'hsts' => true,
        'x-frame-options' => 'SAMEORIGIN',
        'x-content-type-options' => 'nosniff',
        'x-xss-protection' => '1; mode=block',
        'permissions-policy' => 'camera=(), microphone=(), geolocation=(), fullscreen=(self), payment=(), accelerometer=(), gyroscope=()',
        'feature-policy' => "camera 'none'; microphone 'none'; geolocation 'none'; fullscreen 'none'; payment 'none'; accelerometer 'none'; gyroscope 'none';",
        'cross-origin' => [
            'embedder-policy' => 'require-corp',
            'resource-policy' => 'same-origin',
            'opener-policy' => 'same-origin',
        ],
    ],

    // leave the policy empty if you don't want to use it'
    'policy' => [
        // if you not want wo publish an mail address, you can enter a url to a contact form
        'contact' => 'mailto:security@xyz.com',
        'languages' => ['en'],
    ],
];
