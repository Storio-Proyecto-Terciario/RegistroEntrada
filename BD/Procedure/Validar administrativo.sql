CREATE PROCEDURE ValidarAdministrativo
@id int
AS

SELECT a.UsuarioCI
FROM Administrativos a
JOIN Usuarios u ON a.UsuarioCI = u.UsuarioCI AND u.UsuarioExiste = 1
WHERE a.UsuarioCI = @id
AND a.AdministrativoExiste = 1


DELIMITER //
CREATE PROCEDURE ValidarAdministrativo(IN id INT)
BEGIN
    SELECT a.UsuarioCI
    FROM Administrativos a
    JOIN Usuarios u ON a.UsuarioCI = u.UsuarioCI AND u.UsuarioExiste = 1
    WHERE a.UsuarioCI = id
    AND a.AdministrativoExiste = 1;
END;
//
DELIMITER ;
