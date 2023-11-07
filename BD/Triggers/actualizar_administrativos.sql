CREATE DEFINER=`root`@`localhost` TRIGGER `actualizar_administrativos` AFTER UPDATE ON `usuarios` FOR EACH ROW BEGIN
    UPDATE administrativos
    SET AdministrativoExiste = NEW.UsuarioExiste
    WHERE UsuarioCI = NEW.UsuarioCI;
END