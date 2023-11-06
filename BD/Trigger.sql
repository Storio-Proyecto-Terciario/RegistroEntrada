use Proyecto;
-- Crear un desencadenador (trigger) para ajustar UsuarioCI a NULL cuando sea necesario

DELIMITER //
CREATE TRIGGER AfterInsertTrigger
AFTER INSERT ON Registro
FOR EACH ROW
BEGIN
    IF (select count(*) from usuarios u left join registro r on u.UsuarioCI=r.UsuarioCI where u.UsuarioCI=new.UsuarioCI) = 0 then
        UPDATE Registro
        SET RegistroInvitado = 1
        WHERE RegistroID = NEW.RegistroID;
    END IF;
END; //
DELIMITER ;