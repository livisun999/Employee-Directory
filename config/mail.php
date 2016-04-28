<?php

return [
    'driver' => 'smtp',
    'host' => 'smtp.gmail.com',
    'port' => 587,            //Default
    'from' => ['address' => 'hihihehe@gmail.com', 'name' => ' Wellcom To System Employee-Directory'],
    'encryption' => 'tls',
    'username' => 'emplouyeedirectory@gmail.com',
    'password' => 'lovephuong1996',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'pretend' => false,
];