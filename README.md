# SimpleFileStorageWebsite
A simple online website where you can store you document.

Built and modified based on LifestyleStore project from https://github.com/sajalagrawal/LifestyleStore

Note: made for learning purpose, there are still many problems and vulnerabilities.
Note #2: some problems occurred and the code does not function properly when uploading files

- 1. Allow write access:
-   sudo chown -R www-data:www-data /var/www/
-   sudo chmod -R g+rw /var/www/
- 2. Database:
create table users(
  id int(6) unsigned auto_increment primary key,
  username varchar(30) not null,
  password varchar(255) not null,
  displayname varchar(30) not null
);

create table up_files(
  id int(6) unsigned auto_increment primary key,
  fname varchar(30) not null,
  fuplder varchar(30) not null,
  fdesc varchar(255) not null,
  fdatein varchar(30) not null,
  downloadCount int(5) not null,
  fmode varchar(10) not null
);
