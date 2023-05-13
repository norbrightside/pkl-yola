CREATE DATABASE IF NOT EXISTS SCM;
 USE SCM;
 CREATE TABLE IF NOT EXISTS suppliers (
    supplier_id INT PRIMARY KEY AUTO_INCREMENT,
    supplier_name VARCHAR(255) NOT NULL,
    supplier_address VARCHAR(255) NOT NULL,
    supplier_contact VARCHAR(255) NOT NULL
);
 CREATE TABLE IF NOT EXISTS raw_materials (
    material_id INT PRIMARY KEY AUTO_INCREMENT,
    material_name VARCHAR(255) NOT NULL,
    material_unit VARCHAR(255) NOT NULL,
    material_unit_price DECIMAL(10,2) NOT NULL
);
 CREATE TABLE IF NOT EXISTS productions (
    production_id INT PRIMARY KEY AUTO_INCREMENT,
    production_date DATE NOT NULL,
    material_id INT NOT NULL,
    production_qty INT NOT NULL,
    FOREIGN KEY (material_id) REFERENCES raw_materials(material_id)
);
 CREATE TABLE IF NOT EXISTS sales (
    sale_id INT PRIMARY KEY AUTO_INCREMENT,
    sale_date DATE NOT NULL,
    material_id INT NOT NULL,
    sale_qty INT NOT NULL,
    FOREIGN KEY (material_id) REFERENCES raw_materials(material_id)
);
 CREATE TABLE IF NOT EXISTS stock (
    stock_id INT PRIMARY KEY AUTO_INCREMENT,
    material_id INT NOT NULL,
    stock_qty INT NOT NULL,
    FOREIGN KEY (material_id) REFERENCES raw_materials(material_id)
);