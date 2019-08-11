<?php
    $app->get('/offices/{id}', 'OfficesController:selectOffices');
    $app->post('/offices', 'OfficesController:insertOffices');
    $app->put('/offices', 'OfficesController:updateOffices')
?>