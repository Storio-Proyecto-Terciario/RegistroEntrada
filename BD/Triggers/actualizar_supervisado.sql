CREATE DEFINER=`root`@`localhost` TRIGGER `actualizar_supervisado` AFTER UPDATE ON `administrativos` FOR EACH ROW BEGIN
    DECLARE jefe_ci INT;
    
    -- Verificar si el administrativo fue eliminado
    IF OLD.AdministrativoExiste = 1 AND NEW.AdministrativoExiste = 0 THEN
        -- Obtener el jefe del administrativo eliminado
        SELECT AdministrativoJefe INTO jefe_ci FROM Supervisa WHERE Supervisado = OLD.UsuarioCI;

        -- Actualizar los supervisados del administrativo eliminado
        UPDATE Supervisa SET Supervisado = jefe_ci WHERE UsuarioCI = OLD.UsuarioCI;


        -- Actualizar el jefe de los subordinados del administrativo eliminado
        UPDATE Supervisa SET AdministrativoJefe = jefe_ci WHERE AdministrativoJefe = OLD.UsuarioCI;

     END IF;
END