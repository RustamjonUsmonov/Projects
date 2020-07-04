create table categories
(
    id          int auto_increment
        primary key,
    name        varchar(60) null,
    images      text        null,
    description text        null,
    constraint categories_name_uindex
        unique (name)
)
    charset = latin1;

INSERT INTO mysqldb.categories (id, name, images, description) VALUES (1, 'Math', 'https://www.itweb.co.za/static/pictures/2018/05/resized/-fs-Math-2018.xl.jpg', 'In mathematics, a matrix (plural matrices) is a rectangular array of numbers, symbols, or expressions, arranged in rows and columns. Matrices are commonly written in box brackets. The horizontal and vertical lines of entries in a matrix are called rows and columns, respectively. The size of a matrix is defined by the number of rows and columns that it contains. ');
INSERT INTO mysqldb.categories (id, name, images, description) VALUES (2, '42 Lab', 'https://sun9-54.userapi.com/c604623/v604623704/14e77/yoGSovTi2gs.jpg?ava=1', 'Google’s popular Chrome browser has launched a new tool to help developers tune their websites for different visual deficiencies such as color blindness and blurred vision.Mathias Bynes, a Google employee working on developer tools for Chrome, tweeted a demo video showing how you can test your website for various paucities.

');
INSERT INTO mysqldb.categories (id, name, images, description) VALUES (3, 'IOS', 'https://sun9-53.userapi.com/c840727/v840727081/27ed3/_Xo6wnhArbE.jpg?ava=1', 'One of the bigger changes expected to the Apple iPhone hardware is a new camera system. We aren''t entirely sure what to expect as far as F/ stops, or ISO ranges here, but we do think there is a new camera that bumps off the back of the iPhone further than before. Our wish list would be a backward-facing 3D scanning camera with enhanced depth perception so I can make copies of things to send straight to the 3D printer!');
INSERT INTO mysqldb.categories (id, name, images, description) VALUES (4, 'DataLab', 'https://kpfu.ru/docs/F15987194943/img1937602511.jpg', 'In modern digital world namely world of huge data exchanges - there is an important and main question about data, how data store in the best way during system creation / system support and further data analysis.');