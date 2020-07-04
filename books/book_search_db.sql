use book_searh_db;
/*create table books(
    book_id int auto_increment,
    bname varchar(30),
    description text,
    image text,
    constraint books_pk primary key(book_id)
);
create table genres(
    genre_id int auto_increment,
    gname varchar(30),
    book_id int,
    constraint genres_pk primary key(genre_id),
    constraint genre_book_fk foreign key(book_id)
                   references books(book_id) on delete cascade
);
create table authors(
    authors_id int auto_increment,
    a_fullname varchar(50),
    book_id int,
    constraint authors_pk primary key(authors_id),
    constraint  authors_books_fk foreign key(book_id)
                    references books(book_id) on delete cascade
);*/
/*insert into authors(a_fullname, book_id)
values ('Дюма Александр',5),('Васильев Борис Львович',4),('Роулинг Джоан Кэтлин',3)
insert into genres(gname, book_id)
values ('Зарубежное фэнтези',3),('Фэнтези',3),('Книги о войне',4),('Классическая литература',4),('Исторические приключения',5)*/

select distinct bname from books,genres,authors where ((genres.gname='Зарубежное фэнтези'or genres.gname='Книги о войне')and books.book_id=genres.book_id)or (a_fullname='Дюма Александр'or a_fullname='Васильев Борис Львович' and authors.book_id=books.book_id);
select *from books where bname='Гарри Поттер и Кубок огня';