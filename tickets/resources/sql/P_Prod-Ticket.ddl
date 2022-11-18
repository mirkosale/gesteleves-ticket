-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Fri Nov 18 10:49:41 2022 
-- * LUN file: F:\01-Projets\P_Prod-MIN3\Ticketting\P_Prod-Ticket.lun 
-- * Schema: dbTickets/mld 
-- ********************************************* 


-- Database Section
-- ________________ 

drop database if exists db_Tickets;
create database db_Tickets;
use db_Tickets;


-- Tables Section
-- _____________ 

create table t_file (
     idFile int not null auto_increment,
     filName varchar(50) not null,
     filDirectory varchar(255) not null,
     idTicket int not null,
     constraint ID_t_file_ID primary key (idFile));

create table t_intervene (
     idTicket int not null,
     idTechnician int not null,
     intDate date not null,
     intDescription varchar(255) not null,
     constraint ID_t_intervene_ID primary key (idTechnician, idTicket, intDate));

create table t_technician (
     idTechnician int not null auto_increment,
     tecName varchar(255) not null,
     constraint ID_t_technician_ID primary key (idTechnician));

create table t_ticket (
     idTicket int not null auto_increment,
     ticTitle varchar(255) not null,
     ticDescritption varchar(255) not null,
     ticStatus int not null,
     ticPriority int not null,
     ticOpenDate date not null,
     ticResolutionDate date,
     idUser int not null,
     idType int not null,
     constraint ID_t_ticket_ID primary key (idTicket));

create table t_type (
     idType int not null auto_increment,
     typName varchar(255) not null,
     constraint ID_t_type_ID primary key (idType));

create table t_user (
     idUser int not null auto_increment,
     useName varchar(255) not null,
     usePassword varchar(50) not null,
     constraint ID_t_user_ID primary key (idUser));


-- Constraints Section
-- ___________________ 

alter table t_file add constraint FKt_attach_FK
     foreign key (idTicket)
     references t_ticket (idTicket);

alter table t_intervene add constraint FKt_i_t_t_1
     foreign key (idTechnician)
     references t_technician (idTechnician);

alter table t_intervene add constraint FKt_i_t_t_FK
     foreign key (idTicket)
     references t_ticket (idTicket);

alter table t_ticket add constraint FKt_open_FK
     foreign key (idUser)
     references t_user (idUser);

alter table t_ticket add constraint FKt_have_FK
     foreign key (idType)
     references t_type (idType);


-- Index Section
-- _____________ 

create unique index ID_t_file_IND
     on t_file (idFile);

create index FKt_attach_IND
     on t_file (idTicket);

create unique index ID_t_intervene_IND
     on t_intervene (idTechnician, idTicket, intDate);

create index FKt_i_t_t_IND
     on t_intervene (idTicket);

create unique index ID_t_technician_IND
     on t_technician (idTechnician);

create unique index ID_t_ticket_IND
     on t_ticket (idTicket);

create index FKt_open_IND
     on t_ticket (idUser);

create index FKt_have_IND
     on t_ticket (idType);

create unique index ID_t_type_IND
     on t_type (idType);

create unique index ID_t_user_IND
     on t_user (idUser);

DROP USER IF EXISTS `dbTickets_user`@`localhost`;
CREATE USER `dbTickets_user`@`localhost` identified by '.Etml-';
GRANT INSERT, SELECT, DELETE, UPDATE ON `db_Tickets`.* TO `dbTickets_user`@`localhost`;
FLUSH PRIVILEGES;