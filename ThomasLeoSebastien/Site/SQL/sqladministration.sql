use mysql;
drop database if exists administrationlts;
create database administrationlts;
use administrationlts;

create table Entreprise(
idEntreprise int not null AUTO_INCREMENT,
nomEntreprise varchar(50),
secteurActivite varchar(50),
adresseEntreprise varchar(100),
villeEntreprise varchar(30),
cpEntreprise int(5),
numTelEntreprise varchar(20),
PRIMARY KEY(idEntreprise)
);

create table Eleve(
idEleve int not null AUTO_INCREMENT,
nomEleve varchar(50),
prenomEleve varchar(50),
optionEleve varchar(5),
nomClasse varchar(20),
emailEleve varchar(50),
PRIMARY KEY(idEleve)
);

create table Classe(
idClasse int not null AUTO_INCREMENT,
nomClasse varchar(20),
PRIMARY KEY(idClasse)
);

create table Stage(
idStage int not null AUTO_INCREMENT,
nomEleve varchar(50),
prenomEleve varchar(50),
nomClasse varchar(20),
nomEntreprise varchar(50),
dateRDVStage date,
PRIMARY KEY(idStage)
);
