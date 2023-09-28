DELIMITER //
CREATE PROCEDURE InsertarAdministrativoSupervisa(
    IN p_UsuarioCI INT,
    IN p_AdministrativoContra VARCHAR(255),
    IN p_AdministrativoContacto VARCHAR(25),
    IN p_AdministrativoJefe INT
)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        -- Manejar errores de SQL si es necesario
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error en la transacción';
    END;

    START TRANSACTION; -- Iniciar una transacción

    -- Insertar en la tabla Administrativos
    INSERT INTO Administrativos (UsuarioCI, AdministrativoContra, AdministrativoContacto)
    VALUES (p_UsuarioCI, p_AdministrativoContra, p_AdministrativoContacto);

    -- Insertar en la tabla Supervisa si se proporciona un jefe
    IF p_AdministrativoJefe IS NOT NULL THEN
        INSERT INTO Supervisa (UsuarioCI, AdministrativoJefe)
        VALUES (p_UsuarioCI, p_AdministrativoJefe);
    END IF;

    COMMIT; -- Confirmar la transacción si todo se realizó correctamente
END;
//
DELIMITER ;
