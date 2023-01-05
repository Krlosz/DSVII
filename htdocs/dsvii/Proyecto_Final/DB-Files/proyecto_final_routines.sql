DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_categorias`()
BEGIN
select * from	categorias;
END ;;
DELIMITER ;

DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete`(in a int)
BEGIN
delete from productos where id = a;
END ;;
DELIMITER ;

DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar`(in nombre varchar(255), cantidad varchar(255), imagen varchar(255),categoria varchar(45))
BEGIN
insert into productos(nombre, cantidad, imagen, cod_categoria) values (nombre, cantidad, imagen, categoria);
END ;;
DELIMITER ;

DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select`()
BEGIN
select productos.id, productos.nombre, productos.cantidad, productos.imagen, categorias.categorias from productos inner join categorias on categorias.id = productos.cod_categoria;
END ;;
DELIMITER ;

DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_selectByCategoria`(in a int)
BEGIN
select productos.id, productos.nombre, productos.cantidad, productos.imagen, categorias.categorias from productos inner join categorias on categorias.id = productos.cod_categoria where productos.cod_categoria = a;
END ;;
DELIMITER ;

DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_selectOne`(in id int)
BEGIN
select productos.id, productos.nombre, productos.cantidad, productos.imagen, categorias.categorias from productos inner join categorias on categorias.id = productos.cod_categoria where productos.id=id;
/*select *from categorias;*/
END ;;
DELIMITER ;

DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_SelectUsuario`(in u varchar(250), p varchar(250))
BEGIN
SELECT * FROM usuarios WHERE usuario=u AND Contraseña=p;
END ;;
DELIMITER ;

DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update`(in a int, nombre varchar(255), cantidad varchar(255), categoria varchar(45))
BEGIN

UPDATE productos SET nombre=nombre, cantidad=cantidad, cod_categoria=categoria  WHERE id = a;
END ;;
DELIMITER ;
