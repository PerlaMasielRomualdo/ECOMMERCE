<?php 
    $app->get('/customer/{id}', 'CustomersController:selectCustomers');
    $app->post('/customer', 'CustomersController:insertCustomers');
    $app->put('/customer', 'CustomersController:updateCustomers');
?>