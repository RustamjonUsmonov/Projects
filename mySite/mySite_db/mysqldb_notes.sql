create table notes
(
    id   int auto_increment
        primary key,
    name varchar(30) null
)
    charset = latin1;

INSERT INTO mysqldb.notes (id, name) VALUES (1, 'Home');
INSERT INTO mysqldb.notes (id, name) VALUES (2, 'Links');
INSERT INTO mysqldb.notes (id, name) VALUES (3, 'About');
INSERT INTO mysqldb.notes (id, name) VALUES (4, 'Product');
INSERT INTO mysqldb.notes (id, name) VALUES (5, 'SiteA');
INSERT INTO mysqldb.notes (id, name) VALUES (6, 'SiteB');
INSERT INTO mysqldb.notes (id, name) VALUES (7, 'SiteC');
INSERT INTO mysqldb.notes (id, name) VALUES (8, 'SiteD');