CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_insertarUsuario`(
IN p_UsuarioCI INT, 
IN p_UsuarioNombre VARCHAR(25), 
IN p_UsuarioApellido VARCHAR(25), 
IN p_UsuarioTipo VARCHAR(25)
)
BEGIN
    IF p_UsuarioCI=(SELECT UsuarioCI FROM usuarios WHERE UsuarioCI=p_UsuarioCI and 
    `UsuarioExiste`=0 ) THEN
        
        UPDATE Usuarios
        SET UsuarioNombre = p_UsuarioNombre,
            UsuarioApellido = p_UsuarioApellido,
            UsuarioTipo = p_UsuarioTipo,
            UsuarioExiste = 1
        WHERE UsuarioCI = p_UsuarioCI;
    else
        INSERT INTO Usuarios (UsuarioCI, UsuarioNombre, UsuarioApellido, UsuarioTipo)
        VALUES (p_UsuarioCI, p_UsuarioNombre, p_UsuarioApellido, p_UsuarioTipo);
    END IF;
END