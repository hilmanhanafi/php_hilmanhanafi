CREATE DATABASE IF NOT EXISTS testdb;
USE testdb;

-- Tabel person
CREATE TABLE person (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    alamat VARCHAR(100)
);

-- Tabel hobi
CREATE TABLE hobi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    person_id INT,
    nama_hobi VARCHAR(100) NOT NULL,
    FOREIGN KEY (person_id) REFERENCES person(id) ON DELETE CASCADE
);

-- Contoh data
INSERT INTO person (nama,alamat) VALUES
('sentot','bandung'),
('ali','jakarta'),
('mahmud','bali'),
('shena','USA');

INSERT INTO hobi (person_id, nama_hobi) VALUES
(1, 'membaca'),
(1, 'menulis'),
(2, 'renang'),
(3, 'futsal'),
(3, 'renang'),
(3, 'membaca'),
(4, 'renang');
