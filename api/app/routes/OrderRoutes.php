<?php
    $app->post('/orders', 'OrderController:insertOrder');

    $app->get('/orders/{id}', 'OrderController:selectOrder')
?>