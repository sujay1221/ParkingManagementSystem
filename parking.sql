-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: DEC 07, 2020 at 02:52 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parking_lot`
--

-- --------------------------------------------------------
create table users(
    users_id int,
    users_username varchar(20),
    users_password varchar(20),
    primary key(users_id)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
    
    
insert into users values(1,'suman','suman');
insert into users values(2,'sumanth','goud');
insert into users values(3,'suhail','idk');
insert into users values(4,'sujay','narayan');
insert into users values(5,'rahul','lao');




create table owner_table(
            owner_id int(11),
            owner_fname varchar(25) ,
            owner_lname varchar(25),
            owner_license_no varchar(25),
    owner_phno varchar(10),
    owner_addrs varchar(50),
    primary key(owner_id,owner_phno,owner_license_no),
    foreign key (owner_id) references users(users_id) on delete cascade on update cascade
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into owner_table values(1,'suman','shettigar','license1','9148061456','Flat No 10');
insert into owner_table values(2,'sumanth','goud','license2','9148061226','Flat No 11');

insert into owner_table values(3,'suhail','idk','license3','9148333356','Flat No 12');

insert into owner_table values(4,'sujay','narayan','license4','9148666456','Flat No 13');

insert into owner_table values(5,'rahul','lao','license5','9133331456','Flat No 14');



create table car_table(
    car_id int(11) AUTO_INCREMENT,
car_license_plate varchar(20),
owner_id int(11),
    primary key(car_id,car_license_plate),
foreign key (owner_id) references owner_table(owner_id)on delete cascade on update cascade)ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into car_table values(1,'ABC11',1);
insert into car_table values(2,'ABC22',2);
insert into car_table values(3,'ABC33',3);
insert into car_table values(4,'ABC44',4);
insert into car_table values(5,'ABC55',5);

create table lot_table(
    lot_id int(2),
    occupied tinyint(1),
    car_id int(2) null ,
    allotted_time timestamp,
    primary key(lot_id),
    unique(car_id),
    foreign key (car_id) references car_table(car_id)on delete set null on update cascade,
    constraint lot_limit check(lot_id between 1 and 10)
    
    

) ENGINE=InnoDB DEFAULT CHARSET=latin1;
    
    INSERT INTO `lot_table`(`lot_id`, `occupied`, `car_id`,`allotted_time`) VALUES (1,0,NULL,NULL);
    INSERT INTO `lot_table`(`lot_id`, `occupied`, `car_id`,`allotted_time`) VALUES (2,0,NULL,NULL);
    INSERT INTO `lot_table`(`lot_id`, `occupied`, `car_id`,`allotted_time`) VALUES (3,0,NULL,NULL);
    INSERT INTO `lot_table`(`lot_id`, `occupied`, `car_id`,`allotted_time`) VALUES (4,0,NULL,NULL);
    INSERT INTO `lot_table`(`lot_id`, `occupied`, `car_id`,`allotted_time`) VALUES (5,0,null,NULL);

create table admin(
    admin_id int,
    admin_username varchar(20),
    admin_password varchar(20),
    primary key(admin_id)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
    
    
insert into admin values(1,'admin','admin');

create table parking_history(
    lot_id int,
    car_id int,
    owner_id int,
    owner_fname varchar(20),
    owner_lname varchar(20),
    owner_phno varchar(10),
    in_time timestamp NULL,
    out_time timestamp NULL ,
    foreign key(lot_id) references lot_table(lot_id),
    foreign key(car_id) references car_table(car_id),
    foreign key(owner_id) references owner_table(owner_id)
    
    
)ENGINE=InnoDB DEFAULT CHARSET=latin1;




create table login_details(
    owner_id int,
    owner_password varchar(20),
    primary key(owner_id),
    foreign key (owner_id) references owner_table(owner_id)on delete cascade on update cascade

)ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into login_details values(1,'1');
insert into login_details values(2,'2');
insert into login_details values(3,'3');
insert into login_details values(4,'4');
insert into login_details values(5,'5');

create table admin_complaint(
    owner_id int,
    complaint varchar(500),
    foreign key(owner_id) references owner_table (owner_id)

)ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table user_complaint(
    owner_id int,
    complaint varchar(500),
    foreign key(owner_id) references owner_table (owner_id)on delete cascade on update cascade

)ENGINE=InnoDB DEFAULT CHARSET=latin1;


create table request(
    owner_id int,
    car_id int,
    primary key(car_id),
    foreign key (owner_id) references owner_table(owner_id) on update cascade on delete cascade,
    foreign key (car_id) references car_table(car_id) on update cascade on delete cascade
    

)ENGINE=InnoDB DEFAULT CHARSET=latin1;




