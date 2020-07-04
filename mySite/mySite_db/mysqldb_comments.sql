create table comments
(
    id         int auto_increment
        primary key,
    name       varchar(30) null,
    comment    text        null,
    article_id int         null,
    constraint fk_article
        foreign key (article_id) references articles (id)
)
    charset = latin1;

INSERT INTO mysqldb.comments (id, name, comment, article_id) VALUES (1, 'RUS', 'First comment', 1);
INSERT INTO mysqldb.comments (id, name, comment, article_id) VALUES (2, 'USM', 'Second comment', 1);
INSERT INTO mysqldb.comments (id, name, comment, article_id) VALUES (6, 'Ð®Ð·ÐµÑ€', 'Ð¥Ð¾Ñ€Ð¾ÑˆÐ¸Ð¹ Ð¿Ð¾ÑÑ‚', 6);
INSERT INTO mysqldb.comments (id, name, comment, article_id) VALUES (7, 'ÐšÑ€Ð¸ÑÑ‚Ð¸Ð½Ð°', 'ÐšÐ»Ð°ÑÑÐ½Ð°Ñ Ñ„Ð¾Ñ‚ÐºÐ°', 2);
INSERT INTO mysqldb.comments (id, name, comment, article_id) VALUES (19, 'Somebody', 'well done', 5);
INSERT INTO mysqldb.comments (id, name, comment, article_id) VALUES (20, 'Famous', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.', 3);
INSERT INTO mysqldb.comments (id, name, comment, article_id) VALUES (22, 'rustam190401', 'It works
', 3);
INSERT INTO mysqldb.comments (id, name, comment, article_id) VALUES (23, 'Anonymous', 'something', 1);
INSERT INTO mysqldb.comments (id, name, comment, article_id) VALUES (24, 'Rihana', 'Not bad)
', 5);
INSERT INTO mysqldb.comments (id, name, comment, article_id) VALUES (25, 'Kristina', 'beautiful', 2);
INSERT INTO mysqldb.comments (id, name, comment, article_id) VALUES (26, 'rustam190401', 'Hi Kristina', 2);
INSERT INTO mysqldb.comments (id, name, comment, article_id) VALUES (27, 'Anonymous', 'Some text', 4);
INSERT INTO mysqldb.comments (id, name, comment, article_id) VALUES (28, 'Rihana', 'some text', 2);
INSERT INTO mysqldb.comments (id, name, comment, article_id) VALUES (29, 'Rihana', 'My_text', 1);
INSERT INTO mysqldb.comments (id, name, comment, article_id) VALUES (30, 'Rihana', 'hello world', 1);
INSERT INTO mysqldb.comments (id, name, comment, article_id) VALUES (31, 'rustam190401', 'qwertyz', 1);
INSERT INTO mysqldb.comments (id, name, comment, article_id) VALUES (32, 'rustam190401', 'new comment', 1);
INSERT INTO mysqldb.comments (id, name, comment, article_id) VALUES (43, 'Rihana', 'my comment', 1);
INSERT INTO mysqldb.comments (id, name, comment, article_id) VALUES (44, 'Rihana', 'Yes it works', 3);
INSERT INTO mysqldb.comments (id, name, comment, article_id) VALUES (45, 'rustam190401', 'MY comment', 1);
INSERT INTO mysqldb.comments (id, name, comment, article_id) VALUES (46, 'smbdy', 'hello guys
', 2);
INSERT INTO mysqldb.comments (id, name, comment, article_id) VALUES (47, 'smbdy', 'test comment', 2);