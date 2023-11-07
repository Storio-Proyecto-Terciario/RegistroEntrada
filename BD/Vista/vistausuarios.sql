CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `proyecto`.`vistausuarios` AS
    SELECT 
        `proyecto`.`usuarios`.`UsuarioCI` AS `UsuarioCI`,
        `proyecto`.`usuarios`.`UsuarioNombre` AS `UsuarioNombre`,
        `proyecto`.`usuarios`.`UsuarioApellido` AS `UsuarioApellido`,
        `proyecto`.`usuarios`.`UsuarioTipo` AS `UsuarioTipo`,
        `proyecto`.`usuarios`.`UsuarioExiste` AS `UsuarioExiste`
    FROM
        `proyecto`.`usuarios`
    WHERE
        `proyecto`.`usuarios`.`UsuarioCI` IN (SELECT 
                `proyecto`.`administrativos`.`UsuarioCI`
            FROM
                `proyecto`.`administrativos`)
            IS FALSE