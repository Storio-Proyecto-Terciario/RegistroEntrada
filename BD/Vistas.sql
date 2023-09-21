USE Registro;
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

