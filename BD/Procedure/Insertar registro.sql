 use proyecto;
 DELIMITER //
CREATE PROCEDURE insertarRegistro(IN ci INT, des varchar(255) )
BEGIN
  INSERT INTO `registro` ( `UsuarioCI`, `RegistroDesc`) 
  VALUES 
  ( ci, des);
  INSERT INTO `realiza` ( `UsuarioCI`, `RegistroID`, `RealizaDia`, `RealizaHora`) VALUES 
  (ci, insert_id(), curdate(), CURTIME());


END;
//
DELIMITER ;