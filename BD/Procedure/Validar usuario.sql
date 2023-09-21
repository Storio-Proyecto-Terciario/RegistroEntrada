CREATE PROCEDURE ValidarUsuario
@id int
AS

SELECT UsuarioCI, UsuarioExiste
FROM Usuarios
WHERE UsuarioCI = @id
AND UsuarioExiste = 1;
