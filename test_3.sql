CREATE TABLE karyawan (
    id_karyawan INT AUTO_INCREMENT PRIMARY KEY,
    nik VARCHAR(10) UNIQUE,
    nama VARCHAR(100),
    ttl DATE,
    alamat TEXT,
    id_jabatan INT,
    id_dept INT,
    FOREIGN KEY (id_jabatan) REFERENCES jabatan(id_jabatan),
    FOREIGN KEY (id_dept) REFERENCES department(id_dept)
);

CREATE TABLE jabatan (
    id_jabatan INT AUTO_INCREMENT PRIMARY KEY,
    nama_jabatan VARCHAR(100),
    id_level INT,
    FOREIGN KEY (id_level) REFERENCES level(id_level)
);

CREATE TABLE level (
    id_level INT AUTO_INCREMENT PRIMARY KEY,
    nama_level VARCHAR(100)
);

CREATE TABLE department (
    id_dept INT AUTO_INCREMENT PRIMARY KEY,
    nama_dept VARCHAR(100)
);


-- Tabel level
INSERT INTO level (nama_level) VALUES ('Junior'), ('Mid'), ('Senior');

-- Tabel department
INSERT INTO department (nama_dept) VALUES ('HR'), ('Engineering'), ('Marketing');

-- Tabel jabatan
INSERT INTO jabatan (nama_jabatan, id_level) VALUES
('Staff', 1),
('Supervisor', 2),
('Manager', 3);

-- Tabel karyawan
INSERT INTO karyawan (nik, nama, ttl, alamat, id_jabatan, id_dept) VALUES
('085123123123', 'Ali', '1990-01-01', 'Cibubur', 1, 1),
('085121212121', 'Adi', '1985-05-05', 'Depok', 2, 2),
('085123121212', 'Joni', '1992-09-09', 'Bogor', 3, 3);

SELECT
    karyawan.nama AS nama_karyawan,
    jabatan.nama_jabatan,
    department.nama_dept,
    level.nama_level
FROM
    karyawan
JOIN
    jabatan ON karyawan.id_jabatan = jabatan.id_jabatan
JOIN
    department ON karyawan.id_dept = department.id_dept
JOIN
    level ON jabatan.id_level = level.id_level;


UPDATE karyawan
SET alamat = 'Bali'
WHERE nik = '1234567890';

DELETE FROM karyawan
WHERE nik = '085123123123';
