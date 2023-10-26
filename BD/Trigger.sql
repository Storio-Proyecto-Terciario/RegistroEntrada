use Proyecto;
-- Crear un desencadenador (trigger) para ajustar UsuarioCI a NULL cuando sea necesario
CREATE TRIGGER SetUsuarioCINull
AFTER UPDATE ON Registro
AS
BEGIN
    IF UPDATE(RegistroInvitado)  -- Verificar si se actualiza el campo RegistroInvitado
    BEGIN
        UPDATE Realiza
        SET UsuarioCI = NULL
        FROM Realiza r
        INNER JOIN inserted i ON r.RegistroID = i.RegistroID
        WHERE i.RegistroInvitado = 1;
    END
END;

-- mysql ver

DELIMITER //
CREATE TRIGGER SetUsuarioCINull
AFTER UPDATE ON Registro FOR EACH ROW
BEGIN
    IF NEW.RegistroInvitado <> OLD.RegistroInvitado THEN
        UPDATE Realiza r
        JOIN Registro i ON r.RegistroID = i.RegistroID
        SET r.UsuarioCI = NULL
        WHERE i.RegistroInvitado = 1;
    END IF;
END;
//
DELIMITER ;


