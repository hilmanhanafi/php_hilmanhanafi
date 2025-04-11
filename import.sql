CREATE DATABASE IF NOT EXISTS testdb;
USE testdb;

-- Tabel person
CREATE TABLE person (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL
);

-- Tabel hobi
CREATE TABLE hobi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    person_id INT,
    nama_hobi VARCHAR(100) NOT NULL,
    FOREIGN KEY (person_id) REFERENCES person(id) ON DELETE CASCADE
);

-- Contoh data
INSERT INTO person (nama) VALUES
('Andi'),
('Budi'),
('Citra'),
('Dina'),
('Eka');

INSERT INTO hobi (person_id, nama_hobi) VALUES
(1, 'Sepak Bola'),
(2, 'Sepak Bola'),
(3, 'Membaca'),
(3, 'Sepak Bola'),
(4, 'Berenang'),
(5, 'Membaca'),
(5, 'Sepak Bola');
