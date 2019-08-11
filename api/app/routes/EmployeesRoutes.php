<?php
    $app->get('/employees/{id}', 'EmployeesController:selectEmployees');
    $app->post('/employees', 'EmployeesController:insertEmployees');
    $app->post('/employees/login', 'EmployeesController:login');
    $app->put('/employees', 'EmployeesController:updateEmployees');
?>