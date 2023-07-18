<?php
    require('stripe-php-master/init.php');

    $publishable_key="pk_test_51IicyjSG43wYUzCYoqrmvlO3FmAL83JfwBKTy8TZ4Pp0EzZ1FPixV5QkR5xPn5SsjAZrYe110WMmWFvWinjoIkbN00jgH16AMg";
    $secret_key="sk_test_51IicyjSG43wYUzCYXNjfGte6eTayuvShal5XmedzqKW3scoWqeGsDME3L962BSsjnkKv4r44H9QBrNDWqxaPwCIC00zk0SLMLD";

    \Stripe\Stripe::setApiKey($secret_key);
?> 