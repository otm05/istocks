
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
alter table Poles add foreign key (CodeEntrFK) references Entreprises(CodeEntr);
alter table Poles add foreign key (codeDPLFK1) references Collaborateurs(CodeEntrFK);

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

insert into Departements values('D1','E1','P1','shop','xxxxx12','r','Dd','FD','DFR','EFf','DD','DD','DD','DD','DD','DD','DD','DD','FFFD');
insert into Departements values('D2','E1','P1','ffffff','xxxxx88','r','Dd','FD','DFR','FFFFF','DGD','DD','DD','DD','DD','DD','DD','DD','FFFD');
insert into Departements values('D3','E1','P3','xxxxx897','a','r','Dd','FD','FGHF','FGHFGH','DD','DD','DD','DD','DD','DD','DD','DD','FFFD');
insert into Departements values('D4','E1','P1','ffffff','xxxxx9087','r','Dd','FD','DFR','EFf','DD','DD','DD','DD','DD','DD','DD','DD','FFFD');
insert into Departements values('D5','E5','P1','ffffff','xxxxx09879','r','Dd','FD','DFR','EFf','DD','DD','DD','DD','DD','DD','DD','DD','FFFD');

update Services set NomSrv='GERRR' , _description='FFFFF' , fix='0000000' , fax='00000000000' where codeSrv='s2';


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

update Services set CodeEntrFK='D',CodeDepFK='D',NomSrv='D',_description='D',fix='0',fax='0',codeCDFK1='D',codeCDFK2='DD' where codeSrv='Ser1';
--Services : 
insert into Services values('Ser1','','','shoping','xxxxx12','053566845','053566845','','');
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

insert into Collaborateurs values('C1','shop','xxxxx12','r','Dd','FD','C','C','DD','DD','DD','DD','DD','DD','DD','DD','ssd','dfd',12,23,'fffgfgfgf','S1','E1','R','DDfgg','A');
insert into Collaborateurs values('C2','shop','xxxxx12','r','Dd','FD','C','C','DD','DD','DD','DD','DD','DD','DD','DD','ssd','dfd',12,23,'fffgfgfgf','S1','E1','R','DDfgg','A');
insert into Collaborateurs values('C3','shop','xxxxx12','r','Dd','FD','C','C','DD','DD','DD','DD','DD','DD','DD','DD','ssd','dfd',12,23,'fffgfgfgf','S1','E1','R','DDfgg','A');

--G2

--Table Fournisseurs
create table Fournisseurs
(
 codeFour varchar(20),
  codeEntrFk varchar(20),
  nomFour varchar(80),
  raisonSocialFour varchar(255),
  description varchar(255),
  secteur varchar(20),
  categorie int,
  adresse varchar(255),
  ville varchar(80),
  codePostale varchar(10),
  pays varchar(80),
  email varchar(150),
  fixe varchar(15),
  fax varchar(15),
  siteWeb varchar(150),
  fullNameContact varchar(100),
  gsmContact varchar(15),
  logoFour varchar(50),
  constraint pk_Four primary key(codeFour,codeEntrFk)
);
alter table Fournisseurs add foreign key (codeEntrFk) references Entreprises(codeEntr) on delete cascade;

--Table Categories
create table Categories(
     codeCat varchar(20) ,
     codeEntrFk varchar(20),
     codeFmlFk varchar(20) ,
     nomCat varchar(80),
     description varchar(255),
     constraint pk_ctg primary key(codeCat,codeEntrFk)
);
alter table Categories add foreign key (codeEntrFk) references Entreprises(codeEntr) on delete cascade;
alter table Categories add foreign key (codeFmlFk) references Familles(codeFml) on delete cascade;

--Table Unites
create table Unites(
    codeUnit varchar(20),
    codeEntrFk varchar(20) null,
    nomUnit varchar(50),
    typeUnit varchar(50),
    constraint pk_Unt primary key(codeUnit,codeEntrFk)
);
alter table Unites add foreign key (codeEntrFk) references Entreprises(codeEntr) on delete cascade;

--Table Casier
create table Casiers(
    numCasier varchar(10) ,
    codeEntrFk varchar(20) null,
    codeRangFk varchar(20) null,
    forme varchar(225),
    description varchar(255),
    constraint pk_Cs primary key(numCasier,codeEntrFk)
);
alter table Casiers add foreign key (codeEntrFk) references Entreprises(codeEntr) on delete cascade;
alter table Casiers add foreign key (codeRangFk) references Rangs(codeRang) on delete cascade;

create table Marques(
    codeMrq varchar(20),
    codeEntrFk varchar(20) null,
    nomMrq varchar(80),
    categorieMrq varchar(3),
    _description varchar(255),
    paysOrigine varchar(80),
    logoFour varchar(50),
    constraint pk primary key(codeMrq,codeEntrFk)
);
alter table Marques add foreign key (codeEntrFk) references Entreprises(codeEntr) on delete cascade;
alter table Marques add constraint categorieMrq check (categorieMrq in('L','LC','N','C'));

create table Familles (
    codeFml varchar(20),
    codeEntrFk varchar(20) null,
    nomFml varchar(80),
    description varchar(255),
    constraint pk primary key(codeFml,codeEntrFk)
);
alter table Familles add foreign key (codeEntrFk) references Entreprises(codeEntr) on delete cascade;

create table Magasins(
    codeMag varchar(20),
    codeEntrFk varchar(20) null,
    nomMag varchar(20),
    adresse varchar(80),
    ville varchar(255),
    pays varchar(80),
    description varchar(255),
    constraint pk primary key(codeMag,codeEntrFk)
);
alter table Magasins add foreign key (codeEntrFk) references Entreprises(codeEntr) on delete cascade;
create table Rangs(
    codeRang varchar(20),
    codeMagFk varchar(20) null,
    codeEntrFk varchar(20) null,
    description varchar(255),
     constraint pk primary key(codeRang,codeEntrFk)
);
alter table Rangs add foreign key (codeEntrFk) references Entreprises(codeEntr) on delete cascade;
alter table Rangs add foreign key (codeMagFk) references Magasins(codeMag) on delete cascade;

--Les Inserts:

insert into Casiers values('numCas1','E1','Rang1','forme1','descr1');
insert into Casiers values('numCas2','E1','Rang1','forme2','descr2');

insert into Rangs values('Rang1','Mg1','E1','desc1');

insert into Magasins values('Mg1','E1','nomMG1','Adresse1','ville1','pays2','Desc1');

insert into Unites values('Unit1','E1','nomUnit1','typeUnit1');
insert into Unites values('Unit2','E1','nomUnit2','typeUnit3');
insert into Unites values('Unit3','E1','nomUnit3','typeUnit4');


insert into Marques values('1','E1','marq1','L','des1','pays1','logo1');
insert into Marques values('2','E1','marq2','C','des2','pays2','logo2');
insert into Marques values('3','E1','marq3','LC','des3','pays3','logo3');
insert into Marques values('4','E1','marq4','L','des4','pays4','logo4');
insert into Marques values('5','E1','marq5','N','des5','pays5','logo5');

insert into Fournisseurs values('F1','E1','nomF1','RaisF1','descr1','secteur1',1,'adresse1','ville1','codeP1','pays1','email1','0987654321','05432466876','siteW1','fullname1','gsm1','logo1');
insert into Fournisseurs values('F2','E1','nomF2','RaisF2','descr2','secteur2',2,'adresse2','ville2','codeP2','pays2','email2','0987654321','05432466876','siteW2','fullname2','gsm2','logo2');
insert into Fournisseurs values('F3','E1','nomF3','RaisF3','descr3','secteur3',3,'adresse3','ville3','codeP3','pays3','email3','0987654321','05432466876','siteW3','fullname3','gsm3','logo3');
insert into Fournisseurs values('F4','E1','nomF4','RaisF4','descr4','secteur4',4,'adresse4','ville4','codeP4','pays4','email4','0987654321','05432466876','siteW4','fullname4','gsm4','logo4');
insert into Fournisseurs values('F5','E1','nomF5','RaisF5','descr5','secteur5',5,'adresse5','ville5','codeP5','pays5','email5','0987654321','05432466876','siteW5','fullname5','gsm5','logo5');

insert into Categories values('cat1','E1','fm1','nomct1','desc1');
insert into Categories values('cat2','E1','fm2','nomct2','desc2');
insert into Categories values('cat3','E1','fm3','nomct3','desc3');
insert into Categories values('cat4','E1','fm4','nomct4','desc4');
insert into Categories values('cat5','E1','fm5','nomct5','desc5');

insert into Familles values('fm1','E1','nomfm1','desc1');
insert into Familles values('fm2','E1','nomfm2','desc2');
insert into Familles values('fm3','E1','nomfm3','desc3');
insert into Familles values('fm4','E1','nomfm4','desc4');
insert into Familles values('fm5','E1','nomfm5','desc5');


