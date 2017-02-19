# CRUD

CONFIGURACIÓN

CLONAR

git clone https://github.com/eulernunez/crud.git

SETEAR

El archivo application/config/config.php
setear/verificar $config['base_url'] = 'http://localhost/crud/';


El archivo application/config/database.php
setear/verificar los parametros:


'hostname' => 'localhost',


'username' => 'root',


'password' => '',


'database' => 'user-management',



Ejecutar el script user-management.sql que se encuentra en la raiz de la aplicación.


URL de la aplicación
http://localhost/crud/index.php/users
