CREATE TABLE users (
	id integer primary key auto_increment,
    username varchar(16) not null unique,
    password varchar(255) not null,
    email varchar(255) not null,
    name varchar(255) not null,
    surname varchar(255) not null
)engine="InnoDB";

CREATE TABLE contents (
	id integer primary key auto_increment,
    img_url varchar(255) not null,
    descrizione varchar(255) not null
)engine = "InnoDB";

CREATE TABLE preferiti (
    userid int not null,
    id int not null,
    url varchar(255) not null,
    testo varchar(255) not null,

    PRIMARY KEY(userid, id),
    INDEX index_userid(userid),
    FOREIGN KEY (userid) REFERENCES user(id)
)engine = "InnoDB";

INSERT INTO contents(img_url, descrizione) VALUES ("Images/miami.jpg", "Verstappen vince anche a Miami! Secondo Leclerc, terzo Sainz");

INSERT INTO contents(img_url, descrizione) VALUES ("Images/lecrash.jpg", "Continua la maledizione di monaco per Leclerc! A muro con la 312T alla Rascasse");

INSERT INTO contents(img_url, descrizione) VALUES ("Images/barcelona.jpg", "Vince Verstappen in Spagna. Leclerc out al giro 23 perde una gara dominata");

INSERT INTO contents(img_url, descrizione) VALUES ("Images/dannyRic.jpg", "Forte impatto per Daniel Ricciardo alle Piscine durante la FP2");

INSERT INTO contents(img_url, descrizione) VALUES ("Images/monacoP1.jpg","Charles Leclerc, P1 durante le prime due libere, Sainz subito dietro");




