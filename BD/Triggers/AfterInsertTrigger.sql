CREATE DEFINER=`root`@`localhost` TRIGGER `AfterInsertTrigger` AFTER INSERT ON `registro` FOR EACH ROW BEGIN
    IF (select count(*) from usuarios u left join registro r on u.UsuarioCI=r.UsuarioCI where u.UsuarioCI=new.UsuarioCI) = 0 then
        UPDATE Registro
        SET RegistroInvitado = 1
        WHERE RegistroID = NEW.RegistroID;
    END IF;
END