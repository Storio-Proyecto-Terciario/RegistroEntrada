-- Crear un desencadenador (trigger) para ajustar UsuarioCI a NULL cuando sea necesario
CREATE TRIGGER SetUsuarioCINull
ON Registro
AFTER UPDATE
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
