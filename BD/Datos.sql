
INSERT INTO Usuarios (UsuarioCI, UsuarioNombre, UsuarioApellido, UsuarioTipo)
VALUES
(1, 'Juan', 'Perez', 'Alumno'),
(2, 'Maria', 'Rodriguez', 'Profesor'),
(3, 'Carlos', 'Lopez', 'Administrativo'),
(4, 'Ana', 'Martinez', 'Direccion'),
(5, 'Luis', 'Gonzalez', 'Funcionario'),
(6, 'Laura', 'Sanchez', 'Alumno'),
(7, 'Pedro', 'Fernandez', 'Alumno'),
(8, 'Carmen', 'Diaz', 'Alumno');


INSERT INTO Administrativos (UsuarioCI, AdministrativoContra, AdministrativoContacto)
VALUES
(3, 'Contraseña1', 'admin1@example.com'),
(4, 'Contraseña2', 'admin2@example.com'),
(5, 'Contraseña3', 'admin3@example.com');


INSERT INTO Supervisa (UsuarioCI, AdministrativoJefe)
VALUES
(3, 4),
(4, 5);


INSERT INTO Registro (UsuarioCI, RegistroDesc, RegistroInvitado)
VALUES
(1, 'Registro 1', 0),
(2, 'Registro 2', 0),
(6, 'Registro 3', 0),
(7, 'Registro 4', 0);

INSERT INTO Realiza (UsuarioCI, RegistroID, RealizaDia, RealizaHora)
VALUES
(1, 1, '2023-09-26', '08:00:00'),
(2, 2, '2023-09-27', '09:30:00'),
(6, 3, '2023-09-28', '10:45:00'),
(7, 4, '2023-09-28', '15:20:00');
