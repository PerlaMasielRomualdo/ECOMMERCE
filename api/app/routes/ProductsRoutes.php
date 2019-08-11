<?php
    $app->get('/products', 'ProductsController:selectProducts');
    $app->post('/products', 'ProductsController:insertProducts');
    $app->put('/products', 'ProductsController:updateProducts');
?>