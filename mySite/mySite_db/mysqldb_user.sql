create table user
(
    login          varchar(30)          null,
    email          varchar(30)          null,
    password       varchar(60)          null,
    id             int auto_increment
        primary key,
    is_male        tinyint(1)           null,
    is_admin       tinyint(1) default 0 null,
    is_super_admin tinyint(1) default 0 null
)
    charset = latin1;

INSERT INTO mysqldb.user (login, email, password, id, is_male, is_admin, is_super_admin) VALUES ('rustam190401', 'me@mail.me', '$2y$10$BmonqbJDVujpwVqxHAsIku3K3AO6Qitame9Kvblxv1t0Qf7GmsIw6', 1, 1, 1, 1);
INSERT INTO mysqldb.user (login, email, password, id, is_male, is_admin, is_super_admin) VALUES ('Rihana', 'sec@not.me', '$2y$10$davhZFrSXNAUjuwhsCcpZeQ.Cfn6mXZ47t0VSAJehNOij04tFAx4.', 7, 0, 1, 0);
INSERT INTO mysqldb.user (login, email, password, id, is_male, is_admin, is_super_admin) VALUES ('Kristina', 'kr@kr.kr', '$2y$10$bDhxR90xQkV8AqcMxhAjwOcdUSM.6iayXGYTNB/NoI8.AiT.Lxc5m', 8, 0, 0, 0);
INSERT INTO mysqldb.user (login, email, password, id, is_male, is_admin, is_super_admin) VALUES ('smbdy', 'smbdy@smbd.smbd', '$2y$10$Mpe1NPbKliBFE6mMgzWHXeVbd66xHw3yRV3ir7VOUuWIQhgpXyS5S', 13, 1, 0, 0);