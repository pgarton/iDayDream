
drop table if exists login;
CREATE TABLE login(
id int(10) NOT NULL AUTO_INCREMENT primary key,
admin_status TINYINT(4) NOT NULL DEFAULT '0',
username varchar(255) NOT NULL,
password varchar(255) NOT NULL,
 created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 last_updated datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

insert into login values (null, TRUE, 'admin', MD5('@dm1n'), now(), now());
insert into login values (null, TRUE, 'Admin', MD5('Master123'), now(), now());
insert into login values (null, TRUE, 'Brandi', MD5('Day'), now(), now());

/*
// https://stackoverflow.com/questions/8710982/md5-password-retrieving

select * from login where password = md5('@dm1n') and admin_status > 0;

$pass = trim($_POST['pass']);
$pass = md5($pass);
*/
