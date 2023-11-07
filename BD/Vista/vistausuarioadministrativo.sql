CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `proyecto`.`vistausuarioadministrativo` AS
    SELECT 
        `u`.`UsuarioCI` AS `UsuarioCI`,
        `u`.`UsuarioNombre` AS `UsuarioNombre`,
        `u`.`UsuarioApellido` AS `UsuarioApellido`,
        `a`.`AdministrativoContacto` AS `AdministrativoContacto`,
        `a`.`AdministrativoExiste` AS `AdministrativoExiste`,
        `s`.`AdministrativoJefe` AS `AdministrativoJefe`
    FROM
        ((`proyecto`.`usuarios` `u`
        JOIN `proyecto`.`administrativos` `a` ON ((`u`.`UsuarioCI` = `a`.`UsuarioCI`)))
        LEFT JOIN `proyecto`.`supervisa` `s` ON ((`a`.`UsuarioCI` = `s`.`Supervisado`)))