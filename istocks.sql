
create database if not exists istocks;
use istocks;
drop database istocks;
create table Entreprises
(
    CodeEntr varchar(20) primary key not null,
    NomEntr varchar(80) not null,
    _description varchar(255),
    secteurEntr varchar(50),
    adresse varchar(255),
    ville varchar(80),
    codePostal varchar(10),
    pays varchar(80),
    email varchar(150),
    fix varchar(15),
    fax varchar(15),
    siteWeb varchar(150),
    fullNameContact varchar(100),
    gsmContact varchar(15),
    logoEntr varchar(50) not null,
    codeDGFK1 varchar(20) null,
    codeDGFK2 varchar(20) null,
    EtatEntr varchar(3) not null,
    constraint EtatEntr_pk1 check (EtatEntr in ('A','D','AC','R'))
    
);
alter table Entreprises add foreign key (codeDGFK1) references Collaborateurs(CodeEntrFK);

--Entreprises : 

insert into Entreprises values('E1','nike','xxxxxxx','habilt','caleforn34','america','2355500','america','admin.nike@nike.com','005523623','00556636','www.nike.com','admin02','05262626','e.jpeg','E1','E2','AC');
insert into Entreprises values('E2','adidass','xxxxxxx','habilt','calefornia y23 n34','america','2355500','america','admin.nike@nike.com','005523623','00556636','www.nike.com','admin02','05262626','e.jpeg','E1','E2','R');
insert into Entreprises values('E3','balanciaga','xxxxxxx','habilt','calefornia y23 n34','america','2355500','america','admin.nike@nike.com','005523623','00556636','www.nike.com','admin02','05262626','e.jpeg','E1','E2','D');
insert into Entreprises values('E4','lacost','xxxxxxx','habilt','calefornia y23 n34','america','2355500','america','admin.nike@nike.com','005523623','00556636','www.nike.com','admin02','05262626','e.jpeg','E1','E2','A');
insert into Entreprises values('E5','versace','xxxxxxx','habilt','calefornia y23 n34','america','2355500','america','admin.nike@nike.com','005523623','00556636','www.nike.com','admin02','05262626','e.jpeg','E1','E2','A');

create table Poles
(
    codePL varchar(20) primary key not null,
    CodeEntrFK varchar(20) null,
    NomPL varchar(80) not null,
    _description varchar(255),
    secteurPL varchar(50),
    adresse varchar(255),
    ville varchar(80),
    codePostal varchar(10),
    pays varchar(80),
    email varchar(150),
    fix varchar(15),
    fax varchar(15),
    siteWeb varchar(150),
    fullNameContact varchar(100),
    gsmContact varchar(15),
    logoPL varchar(50) not null,
    codeDPLFK1 varchar(20) null,
    codeDPLFK2 varchar(20) null
);
--alter table Poles add frk :

alter table Poles add foreign key (codeDPLFK1) references Collaborateurs(CodeEntrFK);
alter table Poles add foreign key (CodeEntrFK) references Entreprises(CodeEntr);
--insertion poles : 
insert into Poles values('P1','E1','xxxxx','shop','xxxxx12','r','Dd','FD','DFR','EFf','DD','DD','DD','DD','DD','DD','DD','DD');
insert into Poles values('P2','E2','cccc','ffffff','xxxxx88','r','Dd','FD','DFR','FFFFF','DGD','DD','DD','DD','DD','DD','DD','DD');
insert into Poles values('P3','E1','vvvvv','xxxxx897','a','r','Dd','FD','FGHF','FGHFGH','DD','DD','DD','DD','DD','DD','DD','DD');
insert into Poles values('P4','E1','gggg','ffffff','xxxxx9087','r','Dd','FD','DFR','EFf','DD','DD','DD','DD','DD','DD','DD','DD');
insert into Poles values('P5','E5','mmmmm','ffffff','xxxxx09879','r','Dd','FD','DFR','EFf','DD','DD','DD','DD','DD','DD','DD','DD');


create table Departements
(
    codeDep varchar(20) primary key not null,
    CodeEntrFK varchar(20) null,
    CodePLFK varchar(20) null,
    NomDep varchar(80) not null,
    _description varchar(255),
    secteurPL varchar(50),
    adresse varchar(255),
    ville varchar(80),
    codePostal varchar(10),
    pays varchar(80),
    email varchar(150),
    fix varchar(15),
    fax varchar(15),
    siteWeb varchar(150),
    fullNameContact varchar(100),
    gsmContact varchar(15),
    logoDep varchar(50) not null,
    codeCDFK1 varchar(20) null,
    codeDCDFK2 varchar(20) null
);
--alter table deppartements add FRK :
alter table Departements add foreign key (CodeEntrFK) references Poles(CodeEntrFK);
alter table Departements add foreign key (CodePLFK) references Poles(codePL);
alter table Departements add foreign key (codeCDFK1) references Collaborateurs(CodeEntrFK);
--Departements :

insert into Departements values('D1','E1','P1','shop','xxxxx12','r','Dd','FD','DFR','EFf','DD','DD','DD','DD','DD','DD','DD','DD');
insert into Departements values('D2','E1','P1','ffffff','xxxxx88','r','Dd','FD','DFR','FFFFF','DGD','DD','DD','DD','DD','DD','DD','DD');
insert into Departements values('D3','E1','P3','xxxxx897','a','r','Dd','FD','FGHF','FGHFGH','DD','DD','DD','DD','DD','DD','DD','DD');
insert into Departements values('D4','E1','P1','ffffff','xxxxx9087','r','Dd','FD','DFR','EFf','DD','DD','DD','DD','DD','DD','DD','DD');
insert into Departements values('D5','E5','P1','ffffff','xxxxx09879','r','Dd','FD','DFR','EFf','DD','DD','DD','DD','DD','DD','DD','DD');


create table Services
(
    codeSrv varchar(20) primary key not null,
    CodeEntrFK varchar(20) null,
    CodeDepFK varchar(20) null,
    NomSrv varchar(80) not null,
    _description varchar(255),
    fix varchar(15),
    fax varchar(15),
    codeCDFK1 varchar(20) null,
    codeCDFK2 varchar(20) null
);

--drop table Services;
--alter table Services add foreign key :

alter table Services add foreign key (CodeEntrFK) references Poles(CodeEntrFK);
--??
alter table Services add foreign key (CodeDepFK) references Departements(codeDep);
alter table Services add foreign key (codeCDFK1) references Collaborateurs(CodeEntrFK);


--Services : 
insert into Services values('S1','E1','D1','shop','xxxxx12','r','Dd','FD','DFR');
insert into Services values('S2','E1','D1','ffffff','xxxxx88','r','Dd','FD','DFR');
insert into Services values('S3','E3','D3','xxxxx897','a','r','Dd','FD','FGHF');
insert into Services values('S4','E1','D2','ffffff','xxxxx9087','r','Dd','FD','DFR');
insert into Services values('S5','E5','D5','ffffff','xxxxx09879','r','Dd','FD','DFR');

create table Collaborateurs
(
    matricule varchar(20) primary key not null,
    CodeEntrFK varchar(20) null,
    nom varchar(80) not null,
    prenom varchar(80) not null,
    nomArabe varchar(80),
    prenomArabe varchar(80),
    cin varchar(10) not null,
    constraint cin_pk check (cin in ('C','M','D','V')),
    civilite varchar(2) not null,
    nationalite varchar(50) not null,
    email varchar(150),
    gsm varchar(15),
    adresse varchar(255),
    ville varchar(150),
    codePostal varchar(10),
    pays varchar(80),
    photo varchar(50) not null,
    fonction varchar(150),
    grade varchar(100),
    echelle int ,
    echellon int,
    _description varchar(255),
    codeSrvFK1 varchar (20) null,
    codeEntrFK2 varchar(20) null,
    typeContrat varchar(5) not null,
    constraint typeCtr_pk check (typeContrat in ('R','F','V','C','A','CDI','CDD','E','S')),
    numContrat varchar(20),
    etatColabo varchar(2) not null,
    constraint etatColl_pk check (etatColabo in ('A','D','R'))
);

--add foreign key Collaborateurs :

alter table Collaborateurs add foreign key (CodeEntrFK) references Entreprises(CodeEntr);
alter table Collaborateurs add foreign key (codeSrvFK1) references Services(codeSrv);
alter table Collaborateurs add foreign key (codeEntrFK2) references Services(CodeEntrFK);


--Collaborateurs

insert into Collaborateurs values('C1','shop','xxxxx12','r','Dd','FD','DFR','EFf','DD','DD','DD','DD','DD','DD','DD','DD','ssd','dfd',12,23,'fffgfgfgf','S1','E1','DFDD','DDfgg','A');
insert into Collaborateurs values('C2','ffffff','xxxxx88','r','Dd','FD','DFR','FFFFF','DGD','DD','DD','DD','DD','DD','DD','DD','ssd','dfd',12,23,'fffgfgfgf','S1','E1','DFDD','DDfgg','A');
insert into Collaborateurs values('C3','xxxxx897','a','r','Dd','FD','FGHF','FGHFGH','DD','DD','DD','DD','DD','DD','DD','DD','ssd','dfd',12,23,'fffgfgfgf','S1','E1','DFDD','DDfgg','AC');
insert into Collaborateurs values('C4','ffffff','xxxxx9087','r','Dd','FD','DFR','EFf','DD','DD','DD','DD','DD','DD','DD','DD','ssd','dfd',12,23,'fffgfgfgf','S1','E1','DFDD','DDfgg','CDD');
insert into Collaborateurs values('C5','ffffff','xxxxx09879','r','Dd','FD','DFR','EFf','DD','DD','DD','DD','DD','DD','DD','DD','ssd','dfd',12,23,'fffgfgfgf','S1','E1','DFDD','DDfgg','E');
