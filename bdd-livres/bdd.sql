-- Creation de la base de données
-- Créer une base de données
CREATE DATABASE book_e_shop; 
USE book_e_shop; -- Indique la BDD à utiliser et dans laquelle on exécute les requêtes.

-- Table auteur (auteur)
CREATE TABLE IF NOT EXISTS auteur(
auteur_ID INT PRIMARY KEY,
auteur_nom VARCHAR(50),
auteur_prenom VARCHAR(50),
auteur_pays VARCHAR(50),
auteur_IMAGE VARCHAR(255), 
auteur_description  VARCHAR(50)
)


-- Table category (genre) ---
CREATE TABLE IF NOT EXISTS table_category(
category_id INT PRIMARY KEY,
category_title VARCHAR(50),
category_image VARCHAR(255),
category_description TEXT
)

-- Table table_type (type)
CREATE TABLE IF NOT EXISTS table_type(
table_type_ID INT PRIMARY KEY,
table_type_designation TEXT(150),
table_type_illustration VARCHAR(255), 
table_type_description  TEXT(150)
)

-- Table book (bd)
CREATE TABLE IF NOT EXISTS book(
book_ID INT PRIMARY KEY,
book_isbn VARCHAR(20) UNIQUE
book_title VARCHAR(255),
book_resume TEXT,
book_publisher VARCHAR(50),
book_date DATE,
book_cartoonist VARCHAR(50),
book_image VARCHAR(255)
book_description VARCHAR(50),
book_price DECIMAL(6,2),
book_type_id INT
-- FOREIGN KEY (typeID) REFERENCES typE (typeID)
)


-- Table customor (client)
CREATE TABLE IF NOT EXISTS customor(
customor_ID INT PRIMARY KEY,
customor_slug VARCHAR(64),-- Slug et le nom ou autre generer par le client 
customor_Lname VARCHAR(50),
customor_fname  VARCHAR(50),
customor_email VARCHAR(100) UNIQUE,
customor_passeword VARCHAR(64) DEFAULT NULL,
customor_adress VARCHAR(100) UNIQUE,
customor_zip INT,
customor_city VARCHAR(50),
customor_phone  VARCHAR(50),
susbcrition_description_date DATE,
customor_susbcrition_ID INT
-- FOREIGN KEY (custommor_susbcrition_ID) REFERENCES susbcrition(susbcrition_ID)

)

-- Table table_sale (client_bd)
CREATE TABLE IF NOT EXISTS table_sale(
table_sale_ID INT ,
table_sale_date DATE ,
table_sale_time  TIME,
table_sale_book-id VARCHAR(255),
table_sale_customer_id INT,,
table_sale_quantity VARCHAR(255) 
-- FOREIGN KEY (book_isbn) REFERENCES book(book_isbn)
-- FOREIGN KEY (clientID) REFERENCES client(clientID)
)

-- Table table_susbcribtion (abonnement)
CREATE TABLE IF NOT EXISTS susbcribtion(
susbcribtion_ID INT PRIMARY KEY,
susbcribtion_designation  VARCHAR(255),
susbcribtion_price DECIMAL(6,2),
susbcribtion_description  VARCHAR(50),
)

-- Table table_book_category  (genre_bd)
CREATE TABLE IF NOT EXISTS book_category(
book_category_id INT,
book_category_book  VARCHAR(50),
book_category_category_id INT
-- category_ID INT PRIMARY KEY
-- FOREIGN KEY (book_isbn) REFERENCES book(book_isbn)
)

-- Table table_book_autor (auteur_client)
CREATE TABLE IF NOT EXISTS book_autor(
book_autor_ID INT,
book_autor_book_id INT,
book_autor_autor_ID INT
-- EditDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
-- FOREIGN KEY (book_isbn) REFERENCES book(book_isbn)
)