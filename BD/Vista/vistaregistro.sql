CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `proyecto`.`vistaregistro` AS
    SELECT 
        `u`.`UsuarioCI` AS `UsuarioCI`,
        `u`.`UsuarioNombre` AS `UsuarioNombre`,
        `u`.`UsuarioApellido` AS `UsuarioApellido`,
        `u`.`UsuarioTipo` AS `UsuarioTipo`,
        `r`.`UsuarioCI` AS `UsuarioRegistroCI`,
        `r`.`RegistroID` AS `RegistroID`,
        `r`.`RegistroDesc` AS `RegistroDesc`,
        `r`.`RegistroInvitado` AS `RegistroInvitado`,
        `rl`.`RealizaDia` AS `RealizaDia`,
        `rl`.`RealizaHora` AS `RealizaHora`
    FROM
        ((`proyecto`.`realiza` `rl`
        LEFT JOIN `proyecto`.`usuarios` `u` ON ((`rl`.`UsuarioCI` = `u`.`UsuarioCI`)))
        JOIN `proyecto`.`registro` `r` ON ((`rl`.`RegistroID` = `r`.`RegistroID`)))