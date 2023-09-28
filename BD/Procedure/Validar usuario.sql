CREATE PROCEDURE ValidarUsuario
@id int
AS

SELECT UsuarioCI
FROM Usuarios
WHERE UsuarioCI = @id
AND UsuarioExiste = 1;


 --
 
 DELIMITER //
CREATE PROCEDURE ValidarUsuario(IN id INT)
BEGIN
    SELECT UsuarioCI
    FROM Usuarios
    WHERE UsuarioCI = id
    AND UsuarioExiste = 1;
END;
//
DELIMITER ;
