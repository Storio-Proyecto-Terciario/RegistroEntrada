CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = root@localhost 
    SQL SECURITY DEFINER
VIEW proyecto.vistausuarios AS
SELECT usuarios.*
FROM usuarios
LEFT JOIN administrativos ON usuarios.UsuarioCI = administrativos.UsuarioCI
WHERE administrativos.AdministrativoExiste = false OR administrativos.UsuarioCI IS NULL;