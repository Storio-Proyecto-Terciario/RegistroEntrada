CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_InsertarAdministrativoSupervisa`(
    IN p_UsuarioCI INT,
    IN p_AdministrativoContra VARCHAR(255),
    IN p_AdministrativoContacto VARCHAR(25),
    IN p_AdministrativoJefe INT
)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        
        ROLLBACK;
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error en la transacción';
    END;

    START TRANSACTION; 
	IF p_UsuarioCI=(SELECT UsuarioCI FROM administrativos WHERE UsuarioCI=p_UsuarioCI and 
    `AdministrativoExiste`=1 ) THEN
        
	ROLLBACK;
    END IF;
    
    IF p_UsuarioCI=(SELECT UsuarioCI FROM administrativos WHERE UsuarioCI=p_UsuarioCI and 
    `AdministrativoExiste`=0 ) THEN
        
        UPDATE Administrativos
        SET AdministrativoContra = p_AdministrativoContra,
            AdministrativoContacto = p_AdministrativoContacto,
            AdministrativoExiste = 1
        WHERE UsuarioCI = p_UsuarioCI;
        
          UPDATE supervisa
        SET Supervisado= p_AdministrativoJefe
        WHERE UsuarioCI = p_UsuarioCI;
    else
        
        INSERT INTO Administrativos (UsuarioCI, AdministrativoContra, AdministrativoContacto)
        VALUES (p_UsuarioCI, p_AdministrativoContra, p_AdministrativoContacto);
		
        INSERT INTO Supervisa (Supervisado, AdministrativoJefe)
        VALUES (p_UsuarioCI, p_AdministrativoJefe);
    END IF;

 
    



    COMMIT; 
END