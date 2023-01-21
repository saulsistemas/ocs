SELECT * FROM `config`;
SELECT * FROM `accountinfo_config`;
SELECT * FROM `bios`;
SELECT * FROM `cpus`;
SELECT * FROM `drives`;
SELECT * FROM `memories`;
SELECT * FROM `monitors`;
SELECT * FROM `software`;
SELECT * FROM `inputs`;
SELECT * FROM `hardware`;
SELECT * FROM `storages`;
SELECT con.*, 
acc.name as nam, acc.COMMENT ,
(SELECT fields_3 from accountinfo as ed where ed.fields_3 = config.IVALUE and config.COMMENTS =3)  as d
FROM config con
LEFT JOIN accountinfo_config acc
ON con.COMMENTS = acc.ID
;

SELECT * FROM `accountinfo`;

select fields_10, count(HARDWARE_ID) cantidad FROM `accountinfo`  group by fields_10;
SELECT * FROM `hardware`;

create table z_brands(
id int primary key auto_increment,
name varchar(250),
status varchar (16),
created_at varchar (40),
updated_at varchar (40)
);
INSERT INTO `ocsweb`.`z_brands` (`name`, `status`) VALUES ('DELL', 'HABILITADO');
INSERT INTO `ocsweb`.`z_brands` (`name`, `status`) VALUES ('HP', 'HABILITADO');
INSERT INTO `ocsweb`.`z_brands` (`name`, `status`) VALUES ('LENOVO', 'HABILITADO');
INSERT INTO `ocsweb`.`z_brands` (`name`, `status`) VALUES ('EPSON', 'HABILITADO');
INSERT INTO `ocsweb`.`z_brands` (`name`, `status`) VALUES ('RICOH', 'HABILITADO');
INSERT INTO `ocsweb`.`z_brands` (`name`, `status`) VALUES ('IPHONE', 'HABILITADO');
INSERT INTO `ocsweb`.`z_brands` (`name`, `status`) VALUES ('MOTOROLA', 'HABILITADO');
INSERT INTO `ocsweb`.`z_brands` (`name`, `status`) VALUES ('SAMSUNG', 'HABILITADO');


create table z_models(
id int primary key auto_increment,
brand_id int,
name varchar(250),
status varchar (16),
created_at varchar (40),
updated_at varchar (40)
);

INSERT INTO `ocsweb`.`z_models` (`brand_id`, `name`, `status`) VALUES ('1', 'LATITUDE 5410', 'HABILITADO');
INSERT INTO `ocsweb`.`z_models` (`brand_id`, `name`, `status`) VALUES ('1', '	LATITUDE 3420', 'HABILITADO');
INSERT INTO `ocsweb`.`z_models` (`brand_id`, `name`, `status`) VALUES ('1', 'OPTIPLEX 3080', 'HABILITADO');
INSERT INTO `ocsweb`.`z_models` (`brand_id`, `name`, `status`) VALUES ('1', 'XPS 13 9310', 'HABILITADO');
INSERT INTO `ocsweb`.`z_models` (`brand_id`, `name`, `status`) VALUES ('1', 'XPS 13 9320	', 'HABILITADO');
INSERT INTO `ocsweb`.`z_models` (`brand_id`, `name`, `status`) VALUES ('2', 'ELITEDESK 800 G1', 'HABILITADO');
INSERT INTO `ocsweb`.`z_models` (`brand_id`, `name`, `status`) VALUES ('2', 'ELITEBOOK 840 G3', 'HABILITADO');
INSERT INTO `ocsweb`.`z_models` (`brand_id`, `name`, `status`) VALUES ('2', 'ELITEBOOK 840 G8', 'HABILITADO');

create table z_categories(
id int primary key auto_increment,
name varchar(250),
status varchar (16),
created_at varchar (40),
updated_at varchar (40)
);
INSERT INTO `ocsweb`.`z_categories` (`name`, `status`) VALUES ('LAPTOP', 'HABILITADO');
INSERT INTO `ocsweb`.`z_categories` (`name`, `status`) VALUES ('DESKTOP', 'HABILITADO');
INSERT INTO `ocsweb`.`z_categories` (`name`, `status`) VALUES ('SERVIDOR', 'HABILITADO');
INSERT INTO `ocsweb`.`z_categories` (`name`, `status`) VALUES ('MONITOR', 'HABILITADO');
INSERT INTO `ocsweb`.`z_categories` (`name`, `status`) VALUES ('CELULAR', 'HABILITADO');
INSERT INTO `ocsweb`.`z_categories` (`name`, `status`) VALUES ('ALL IN ONE', 'HABILITADO');
INSERT INTO `ocsweb`.`z_categories` (`name`, `status`) VALUES ('IMPRESORA', 'HABILITADO');
INSERT INTO `ocsweb`.`z_categories` (`name`, `status`) VALUES ('TABLET', 'HABILITADO');
INSERT INTO `ocsweb`.`z_categories` (`name`, `status`) VALUES ('VIDEOCONFERENCIA', 'HABILITADO');

create table z_Offices(
id int primary key auto_increment,
name varchar(250),
status varchar (16),
created_at varchar (40),
updated_at varchar (40)
);
INSERT INTO `ocsweb`.`z_offices` (`name`, `status`) VALUES ('SAN BORJA', 'HABILITADO');
INSERT INTO `ocsweb`.`z_offices` (`name`, `status`) VALUES ('AREQUIPA', 'HABILITADO');
INSERT INTO `ocsweb`.`z_offices` (`name`, `status`) VALUES ('CHICLAYO', 'HABILITADO');
INSERT INTO `ocsweb`.`z_offices` (`name`, `status`) VALUES ('CUSCO', 'HABILITADO');
INSERT INTO `ocsweb`.`z_offices` (`name`, `status`) VALUES ('HUANCAYO', 'HABILITADO');
INSERT INTO `ocsweb`.`z_offices` (`name`, `status`) VALUES ('PIURA', 'HABILITADO');
INSERT INTO `ocsweb`.`z_offices` (`name`, `status`) VALUES ('PPAL', 'HABILITADO');
INSERT INTO `ocsweb`.`z_offices` (`name`, `status`) VALUES ('PVEN', 'HABILITADO');
INSERT INTO `ocsweb`.`z_offices` (`name`, `status`) VALUES ('PUCALLPA', 'HABILITADO');
INSERT INTO `ocsweb`.`z_offices` (`name`, `status`) VALUES ('TRUJILLO', 'HABILITADO');



create table z_acquisitions(
id int primary key auto_increment,
name varchar(250),
status varchar (16),
created_at varchar (40),
updated_at varchar (40)
);
INSERT INTO `ocsweb`.`z_acquisitions` (`name`, `status`) VALUES ('ALQUILADO', 'HABILITADO');
INSERT INTO `ocsweb`.`z_acquisitions` (`name`, `status`) VALUES ('PROPIO', 'HABILITADO');

create table z_status_assignments(
id int primary key auto_increment,
name varchar(250),
status varchar (16),
created_at varchar (40),
updated_at varchar (40)
);
INSERT INTO `ocsweb`.`z_status_assignments` (`name`, `status`) VALUES ('ASIGNADO', 'HABILITADO');
INSERT INTO `ocsweb`.`z_status_assignments` (`name`, `status`) VALUES ('EN ALMACEN', 'HABILITADO');
INSERT INTO `ocsweb`.`z_status_assignments` (`name`, `status`) VALUES ('PRESTAMO', 'HABILITADO');
INSERT INTO `ocsweb`.`z_status_assignments` (`name`, `status`) VALUES ('ROBADO', 'HABILITADO');

create table z_status_hardware(
id int primary key auto_increment,
name varchar(250),
status varchar (16),
created_at varchar (40),
updated_at varchar (40)
);
INSERT INTO `ocsweb`.`z_status_hardware` (`name`, `status`) VALUES ('OPERATIVO', 'HABILITADO');
INSERT INTO `ocsweb`.`z_status_hardware` (`name`, `status`) VALUES ('NUEVO', 'HABILITADO');
INSERT INTO `ocsweb`.`z_status_hardware` (`name`, `status`) VALUES ('EN GARANTIA', 'HABILITADO');
INSERT INTO `ocsweb`.`z_status_hardware` (`name`, `status`) VALUES ('INOPERATIVO', 'HABILITADO');
INSERT INTO `ocsweb`.`z_status_hardware` (`name`, `status`) VALUES ('ROBADO', 'HABILITADO');

create table z_networks(
id int primary key auto_increment,
name varchar(250),
status varchar (16),
created_at varchar (40),
updated_at varchar (40)
);
INSERT INTO `ocsweb`.`z_networks` (`name`, `status`) VALUES ('IT', 'HABILITADO');
INSERT INTO `ocsweb`.`z_networks` (`name`, `status`) VALUES ('OT', 'HABILITADO');

create table z_managements(
id int primary key auto_increment,
name varchar(250),
status varchar (16),
created_at varchar (40),
updated_at varchar (40)
);
INSERT INTO `ocsweb`.`z_managements` (`name`, `status`) VALUES ('ADMINISTRACION Y FINANZAS', 'HABILITADO');
INSERT INTO `ocsweb`.`z_managements` (`name`, `status`) VALUES ('COMERCIAL', 'HABILITADO');
INSERT INTO `ocsweb`.`z_managements` (`name`, `status`) VALUES ('GERENCIA GENERAL', 'HABILITADO');
INSERT INTO `ocsweb`.`z_managements` (`name`, `status`) VALUES ('LEGAL', 'HABILITADO');
INSERT INTO `ocsweb`.`z_managements` (`name`, `status`) VALUES ('OPERACIONES', 'HABILITADO');
INSERT INTO `ocsweb`.`z_managements` (`name`, `status`) VALUES ('PERSONAS', 'HABILITADO');
INSERT INTO `ocsweb`.`z_managements` (`name`, `status`) VALUES ('RIESGO OPERACIONAL', 'HABILITADO');

create table z_areas(
id int primary key auto_increment,
name varchar(250),
status varchar (16),
created_at varchar (40),
updated_at varchar (40)
);

create table z_employees(
id int primary key auto_increment,
management_id int, /*Gerencia*/
Office_id int,/*SEDE*/
area_id int, /*AREA*/
code varchar (30),
name varchar(350),
job varchar(300),
discharge_date varchar(40),
status varchar (16),
created_at varchar (40),
updated_at varchar (40)
);

create table z_providers(
id int primary key auto_increment,
name varchar(250),
status varchar (16),
created_at varchar (40),
updated_at varchar (40)
);
INSERT INTO `ocsweb`.`z_providers` (`name`, `status`) VALUES ('SOLGAS', 'HABILITADO');
INSERT INTO `ocsweb`.`z_providers` (`name`, `status`) VALUES ('SYSTEM BASE', 'HABILITADO');
INSERT INTO `ocsweb`.`z_providers` (`name`, `status`) VALUES ('WINWARE', 'HABILITADO');
INSERT INTO `ocsweb`.`z_providers` (`name`, `status`) VALUES ('CSI', 'HABILITADO');

create table z_products(
id int primary key auto_increment,
brand_id int,
model_id int,
employee_id int,
network_id int,/*OT IT*/
provider_id int,
status_assignment_id int, /*ESTADO ASIGNADO*/
status_hardware_id int, /*ESTADO EQUIPO*/
hardware_id int ,/*OCS*/
cod_inventory varchar (100),
date_validation varchar(40),
date_update varchar(40),
date_devolution varchar(40),
comment varchar(1000),
created_at varchar (40),
updated_at varchar (40)
)
;
CREATE TABLE z_roles (
  `id` int primary key auto_increment,
  `name` varchar(50) 
) ;

CREATE TABLE `z_menus` (
  `id` int primary key auto_increment,
  `name` varchar(50) ,
  `link` varchar(100) ,
  `status` int 
) ;

CREATE TABLE `z_usuario` (
  `id` int primary key auto_increment,
  `code` varchar(10) ,
  `name` varchar(50) ,
  `last_name` varchar(100) ,
  `username` varchar(30) ,
  `password` varchar(30) ,
  `rol_id` int ,
  `status` int 
) ;

CREATE TABLE `z_permissions` (
  `id` int primary key auto_increment,
  `menu_id` int,
  `rol_id` int,
  `pread` int,
  `pinsert` int,
  `pupdate` int,
  `pdelete` int
)