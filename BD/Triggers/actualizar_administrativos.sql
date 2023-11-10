CREATE DEFINER=`root`@`localhost` TRIGGER `actualizar_administrativos` AFTER UPDATE ON `usuarios` FOR EACH ROW BEGIN
    if new.UsuarioExiste =0 then
        UPDATE administrativos
        SET AdministrativoExiste = 0
        WHERE UsuarioCI = NEW.UsuarioCI;
    end if;
  
END