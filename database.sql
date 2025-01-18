DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS guru;
DROP TABLE IF EXISTS mapel;
DROP TABLE IF EXISTS hasil;
DROP TABLE IF EXISTS jadwal;
DROP TABLE IF EXISTS obat;

CREATE TABLE users (
    Id INT(5) PRIMARY KEY,
    username VARCHAR(20) NOT NULL,
    full_name VARCHAR(35) NOT NULL,
    password VARCHAR(100) NOT NULL,
    level VARCHAR(15)
);

CREATE TABLE guru (
    nip VARCHAR(20) PRIMARY KEY,
    nm_guru VARCHAR(50),
    tmp_lahir VARCHAR(30),
    tgl_lahir date,
    jenkel VARCHAR(15),
    pendidikan_terakhir VARCHAR(10),
    alamat VARCHAR(100)
);

CREATE TABLE hasil (
    id_jadwal VARCHAR(5),
    id_mapel VARCHAR(5),
    hari VARCHAR(15),
    kelas VARCHAR(5)
);

CREATE TABLE jadwal (
    id_jadwal VARCHAR(5) PRIMARY KEY,
    ta_jadwal VARCHAR(10),
    sms_jadwal VARCHAR(15),
    nip VARCHAR(20)
);

CREATE TABLE mapel (
    id_mapel VARCHAR(10) PRIMARY KEY,
    nm_mapel VARCHAR(50),
    kkm VARCHAR(15)
);

CREATE TABLE obat (
    kd_obat VARCHAR(5) PRIMARY KEY,
    nm_obat VARCHAR(50),
    satuan VARCHAR(15),
    jenis_obat VARCHAR(25),
    stock INT(3)
);

INSERT INTO users VALUES
(1, 'hendra', 'hendrakho', SHA1('12345678'), 'admin'),
(2, 'clari', 'clarisha', SHA1('12345678'), 'user');