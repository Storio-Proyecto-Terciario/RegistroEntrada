create database Registro;

use Registro;


create table Usuarios(
UsuarioCI INT PRIMARY KEY,
UsuarioNombre VARCHAR(25) NOT NULL,
UsuarioApellido VARCHAR(25) NOT NULL,
UsuarioTipo VARCHAR(25) NOT NULL,
UsuarioExiste BIT NOT NULL,
CHECK (UsuarioTipo='Alumno'OR UsuarioTipo='Profesor'OR UsuarioTipo='Administrativo'OR UsuarioTipo='Direccion'OR UsuarioTipo='Funcionario')
);


create table Administrativos(
UsuarioCI INT PRIMARY KEY,
AdministrativoJefe INT,
AdministrativoContra VARCHAR(255) NOT NULL,
AdministrativoContacto VARCHAR(25) NOT NULL,
AdministrativoExiste BIT default(1) NOT NULL,
CONSTRAINT FK_AdminitrativoID FOREIGN KEY (UsuarioCI) REFERENCES Usuarios(UsuarioCI),
CONSTRAINT FK_AdminitrativoJefeID FOREIGN KEY (AdministrativoJefe) REFERENCES Usuarios(UsuarioCI)
);

CREATE TABLE Registro (
    RegistroID INT IDENTITY(1,1) PRIMARY KEY,
    UsuarioCI INT,
    RegistroDesc VARCHAR(255),
    RegistroInvitado BIT,
    CONSTRAINT FK_RegistroUsuID FOREIGN KEY (UsuarioCI) REFERENCES Usuarios(UsuarioCI),
    CONSTRAINT CK_InvitadoUsuarioCI CHECK ((RegistroInvitado = 1 AND UsuarioCI IS NULL) OR (RegistroInvitado = 0 AND UsuarioCI IS NOT NULL))
);



create table Realiza(
RealizaID INT IDENTITY(1,1) PRIMARY KEY,
UsuarioCI INT ,
RegistroID INT NOT NULL,
RealizaDia DATE NOT NULL,
RealizaHora TIME NOT NULL,
CONSTRAINT FK_RealizaUsuID FOREIGN KEY (UsuarioCI) REFERENCES Usuarios(UsuarioCI),
CONSTRAINT FK_RegistroREgistroID FOREIGN KEY (RegistroID) REFERENCES Registro(RegistroID),
);
