create table articles
(
    id        int auto_increment
        primary key,
    title     varchar(60)   null,
    author    varchar(50)   null,
    image     text          null,
    content   text          null,
    date_time int           null,
    category  int           null,
    views     int default 0 null,
    constraint fk_categ
        foreign key (category) references categories (id)
)
    charset = latin1;

INSERT INTO mysqldb.articles (id, title, author, image, content, date_time, category, views) VALUES (1, 'First title', 'Rustamjon', 'https://static.scientificamerican.com/sciam/cache/file/EAF12335-B807-4021-9AC95BBA8BEE7C8D_source.jpg?w=590&h=800&74A94564-944F-4349-96BD18788411EAA6', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1586084701, 1, 190);
INSERT INTO mysqldb.articles (id, title, author, image, content, date_time, category, views) VALUES (2, 'Second article', 'someone_second', 'https://images.unsplash.com/photo-1480365501497-199581be0e66?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80', 'Ships without sailors could keep humans out of harm’s way, and that possibility is not their only potential benefit. Without crews, shippers could save money normally spent on salaries, keep boats away from shore for longer and, without wasting room on accommodations, try more efficient designs that would emit less pollution. ', 1586084952, 2, 56);
INSERT INTO mysqldb.articles (id, title, author, image, content, date_time, category, views) VALUES (3, 'Third article', 'Jeyhun', 'https://cdni.rt.com/russian/images/2019.11/article/5dc1288902e8bd657e2f3d9c.jpg', 'The autonomous shipping market is projected to grow from $90 billion today to more than $130 billion by 2030. But the technology remains in its early stages—particularly for large vessels designed to face the open ocean—which means testing is still vital. This year two very different projects will gamble on automated sea voyages.', 1586056003, 1, 37);
INSERT INTO mysqldb.articles (id, title, author, image, content, date_time, category, views) VALUES (4, 'Fourth article', 'Tester', 'https://scx2.b-cdn.net/gfx/news/hires/2019/2-nature.jpg', 'Ocean Infinity, a seabed-exploration company based in both Austin, Tex., and Fareham, England, is pioneering the use of large, uncrewed survey ships with a fleet it calls the Armada. By the end of 2020 its 15 full-size commercial ships, ranging in length from 69 to 120 feet, will begin mapping subsea terrain and inspecting underwater infrastructure, such as telecommunications and wind farm cables, as well as oil and gas pipelines.', 1586060003, 2, 71);
INSERT INTO mysqldb.articles (id, title, author, image, content, date_time, category, views) VALUES (5, 'Fifth article', 'Fifth author', 'https://img.etimg.com/thumb/width-640,height-480,imgsize-1016106,resizemode-1,msid-68721417/pop-the-nature-pill-spending-just-20-mins-outside-can-lower-your-stress.jpg', 'Meanwhile the Chester, Conn.–based marine-research-and-exploration nonprofit ProMare and the technology company IBM are partnering to send a completely autonomous 49-foot-long trimaran (a boat with one main hull and two smaller outrigger hulls) across the Atlantic in September.', 1586080003, 3, 41);
INSERT INTO mysqldb.articles (id, title, author, image, content, date_time, category, views) VALUES (6, 'Sixth article', 'Sixth author', 'https://miro.medium.com/max/3840/1*U18aWqq2322t8Z26zZ0SIg.jpeg', 'The craft, dubbed the Mayflower Autonomous Ship (MAS), or Mayflower, will roughly retrace the 1620 voyage of the original Mayflower from Plymouth, England, to Plymouth, Mass.—a journey that will pit an autonomous vessel against potentially stormy seas.', 1586084003, 4, 64);