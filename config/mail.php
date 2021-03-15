<?php
return [
  'driver' => 'smtp',
  'host' => '',
  'port' => 465,
  'from' => [
    'address' => '',
    'name' => '',
  ],
  'encryption' => 'ssl',
  'username' => '',
  'password' => '',
  'sendmail' => '',
  'markdown' => [
    'theme' => 'default',
    'paths' => [
      resource_path('views/vendor/mail'),
    ],
  ],
];
