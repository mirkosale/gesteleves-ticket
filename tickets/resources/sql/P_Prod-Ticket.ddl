-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.2              
-- * Generator date: Sep 14 2021              
-- * Generation date: Fri Nov 25 10:37:21 2022 
-- * LUN file: F:\01-Projets\P_Prod-MIN3\Ticketing\P_Prod-Ticket.lun 
-- * Schema: db_Tickets/mld 
-- ********************************************* 


-- Database Section
-- ________________ 

drop database if exists db_Tickets;
create database db_Tickets;
use db_Tickets;

-- Tables Section
-- _____________ 

create table t_intervene (
     idTicket int not null,
     idTechnician int not null,
     intDate date not null,
     intDescription varchar(32767) not null,
     constraint ID_t_intervene_ID primary key (idTechnician, idTicket, intDate));

create table t_priority (
     idPriority int not null auto_increment,
     priImpact int not null,
     priUrgency int not null,
     constraint ID_t_priority_ID primary key (idPriority));

create table t_status (
     idStatus int not null auto_increment,
     staName varchar(255) not null,
     constraint ID_t_status_ID primary key (idStatus));

create table t_technician (
     idTechnician int not null auto_increment,
     tecName varchar(255) not null,
     constraint ID_t_technician_ID primary key (idTechnician));

create table t_ticket (
     idTicket int not null auto_increment,
     ticTitle varchar(255) not null,
     ticDescription varchar(32767) not null,
     ticFilename char(255) not null,
     ticOpenDate date not null,
     ticResolutionDate date,
     idUser int not null,
     idType int not null,
     idStatus int not null,
     idPriority int not null,
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

alter table t_ticket add constraint FKt_state_FK
     foreign key (idStatus)
     references t_status (idStatus);

alter table t_ticket add constraint FKt_prioritize_FK
     foreign key (idPriority)
     references t_priority (idPriority);


-- Index Section
-- _____________ 

create unique index ID_t_intervene_IND
     on t_intervene (idTechnician, idTicket, intDate);

create index FKt_i_t_t_IND
     on t_intervene (idTicket);

create unique index ID_t_priority_IND
     on t_priority (idPriority);

create unique index ID_t_status_IND
     on t_status (idStatus);

create unique index ID_t_technician_IND
     on t_technician (idTechnician);

create unique index ID_t_ticket_IND
     on t_ticket (idTicket);

create index FKt_open_IND
     on t_ticket (idUser);

create index FKt_have_IND
     on t_ticket (idType);

create index FKt_state_IND
     on t_ticket (idStatus);

create index FKt_prioritize_IND
     on t_ticket (idPriority);

create unique index ID_t_type_IND
     on t_type (idType);

create unique index ID_t_user_IND
     on t_user (idUser);

DROP USER IF EXISTS `dbTickets_user`@`localhost`;
CREATE USER `dbTickets_user`@`localhost` identified by '.Etml-';
GRANT INSERT, SELECT, DELETE, UPDATE ON `db_Tickets`.* TO `dbTickets_user`@`localhost`;
FLUSH PRIVILEGES;