USE Proyecto;
CREATE VIEW VistaRegistro AS
SELECT
    U.UsuarioCI,
    U.UsuarioNombre,
    U.UsuarioApellido,
    R.RegistroID,
    R.RegistroDesc,
    R.RegistroInvitado,
    RL.RealizaDia,
    RL.RealizaHora
FROM Realiza RL
LEFT JOIN Usuarios U ON RL.UsuarioCI = U.UsuarioCI
INNER JOIN Registro R ON RL.RegistroID = R.RegistroID;

 -- 
 CREATE VIEW VistaUsuariosAdministrativos AS
SELECT
    U.UsuarioCI,
    U.UsuarioNombre,
    U.UsuarioApellido,
    A.AdministrativoContacto,
    S.AdministrativoJefe
FROM
    Usuarios U
INNER JOIN Administrativos A ON U.UsuarioCI = A.UsuarioCI
LEFT JOIN Supervisa S ON A.UsuarioCI = S.UsuarioCI;


