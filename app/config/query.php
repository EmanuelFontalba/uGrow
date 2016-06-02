<?php
	//Todas las consultas de la aplicación
	define("INSERTAR_USUARIO", "INSERT INTO users (user, pass, name, lastname, mail, birthdate, trades, rating, picture, description, location, register, idCity) VALUES (:user, :password, :name, :lastname, :email, :birthdate, :trades, :rating, :picture, :description, :location, :register, :city)");
	define("TODOS_USUARIOS_USER", "SELECT user FROM users");
	define("GET_USER_USERNAME", "SELECT * FROM users WHERE user = :user");
	define("MODIFY_USER", "UPDATE users SET user = :new_user, pass = :password, name = :name, lastname = :lastname, mail = :email, birthdate = :birthdate, description = :description, location = :location WHERE user = :user");
	define("GET_USER_ID", "SELECT user FROM users WHERE id = :id");
	define("GETALL_USER_ID", "SELECT * FROM users WHERE id = :id");
	define("ALL_CITIES", "SELECT * FROM cities");
	define("ALL_COMMENT", "SELECT * from comments");
	define("ALL_COMMENT_USER", "SELECT * from comments where idTarget = :idUser");
	define("ALL_PRODUCTS", "SELECT * FROM products");
	define("ADD_PRODUCT", "INSERT INTO products(product) VALUES (:product)");
	define("GET_PRODUCT", "SELECT product from products where id = :id");
	define("GET_ID_PRODUCT", "SELECT id from products where product = :product");
	define("GET_SOWINGS", "SELECT * FROM siembra where idUser = :idUser");
	define("ADD_TIP", "INSERT INTO tips(idUser, title, date, content, link) values (:idUser, :title, :date, :content, :link)");
	define("GET_TIPS_FOR_USER", "SELECT * from tips where idUser = :idUser");
	define("GET_ALL_TIPS", "SELECT * FROM tips");
	define("CLOSE_ACCOUNT", "DELETE FROM users where id = :id");
	define("ADD_OFFER", "INSERT INTO offers (idUser, idProduct, quantity) VALUES (:idUser, :idProduct, :quantity)");
	define("GET_OFFER_IDPRODUCT","SELECT * FROM offers where idProduct = :idProduct");
	define("GET_USER_ID_FOR_DIR", "SELECT * FROM users where idCity = :idCity");
	define("GET_CITY_FOR_ID", "SELECT * FROM cities where id = :id");
	define("GET_TIPS_RECENTS", "SELECT * FROM tips ORDER BY id desc  LIMIT 0, 8");
?>