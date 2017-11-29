 create table user(
id int not null auto_increment,
username varchar(255),
password varchar(255),
login_count int,
date_created datetime,
last_ip varchar(255),
primary key(id));

