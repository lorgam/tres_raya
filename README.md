# Tres en raya

Implementación de un juego de tres en raya desarrollado en Symfony con toda la lógica en PHP, guardando los estados en una base de datos de MariaDB.

## Forma de jugar

Seleccionar partida nueva para jugar o introducir el id de la partida que queremos continuar.

Hacer click en una casilla vacía, ésta se rellenará con X o O según el turno.

## Ejecución

Es un proyecto symfony osea que hay que incluirlo dentro de un servidor en el que hay que ejecutar `composer install` `yarn install` y `yarn encore dev` para poder tener la página funcionando.

Si no se quiere meter dentro de un servidor siempre se puede ejecutar `symfony server:start` para ejecutar un servidor de pruebas

## Base de datos

La base de datos está configurada como un MariaDB versión 10.3.23 con el usuario tres_raya, con contraseña tres_raya y sobre el schema tres_raya.
