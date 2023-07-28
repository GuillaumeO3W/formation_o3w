#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: ville
#------------------------------------------------------------

CREATE TABLE ville(
        vil_id         Int  Auto_increment  NOT NULL ,
        vil_nom        Varchar (50) NOT NULL ,
        vil_superficie Float NOT NULL
	,CONSTRAINT ville_PK PRIMARY KEY (vil_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: tunnel
#------------------------------------------------------------

CREATE TABLE tunnel(
        tun_id          Int  Auto_increment  NOT NULL ,
        tun_progression Int NOT NULL
	,CONSTRAINT tunnel_PK PRIMARY KEY (tun_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: plage_horaire
#------------------------------------------------------------

CREATE TABLE plage_horaire(
        pla_id          Int  Auto_increment  NOT NULL ,
        pla_heure_debut Time NOT NULL ,
        pla_heure_fin   Time NOT NULL
	,CONSTRAINT plage_horaire_PK PRIMARY KEY (pla_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: taverne
#------------------------------------------------------------

CREATE TABLE taverne(
        tav_id             Int  Auto_increment  NOT NULL ,
        tav_nom            Varchar (50) NOT NULL ,
        tav_nombre_chambre Int NOT NULL ,
        vil_id             Int NOT NULL
	,CONSTRAINT taverne_PK PRIMARY KEY (tav_id)

	,CONSTRAINT taverne_ville_FK FOREIGN KEY (vil_id) REFERENCES ville(vil_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: groupe
#------------------------------------------------------------

CREATE TABLE groupe(
        gro_id Int  Auto_increment  NOT NULL ,
        pla_id Int NOT NULL ,
        tav_id Int NOT NULL
	,CONSTRAINT groupe_PK PRIMARY KEY (gro_id)

	,CONSTRAINT groupe_plage_horaire_FK FOREIGN KEY (pla_id) REFERENCES plage_horaire(pla_id)
	,CONSTRAINT groupe_taverne0_FK FOREIGN KEY (tav_id) REFERENCES taverne(tav_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: nains
#------------------------------------------------------------

CREATE TABLE nains(
        nai_id             Int  Auto_increment  NOT NULL ,
        nai_nom            Varchar (10) NOT NULL ,
        nai_longueur_barbe Float NOT NULL ,
        gro_id             Int
	,CONSTRAINT nains_PK PRIMARY KEY (nai_id)

	,CONSTRAINT nains_groupe_FK FOREIGN KEY (gro_id) REFERENCES groupe(gro_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: biere
#------------------------------------------------------------

CREATE TABLE biere(
        bie_id         Int  Auto_increment  NOT NULL ,
        bie_nom        Varchar (3) NOT NULL ,
        bie_disponible Bool NOT NULL
	,CONSTRAINT biere_PK PRIMARY KEY (bie_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: avoir
#------------------------------------------------------------

CREATE TABLE avoir(
        tun_id        Int NOT NULL ,
        nai_id        Int NOT NULL ,
        vil_id        Int NOT NULL ,
        ville_depart  Varchar (50) NOT NULL ,
        ville_arrivee Varchar (50) NOT NULL ,
        ville_origine Varchar (50) NOT NULL
	,CONSTRAINT avoir_PK PRIMARY KEY (tun_id,nai_id,vil_id)

	,CONSTRAINT avoir_tunnel_FK FOREIGN KEY (tun_id) REFERENCES tunnel(tun_id)
	,CONSTRAINT avoir_nains0_FK FOREIGN KEY (nai_id) REFERENCES nains(nai_id)
	,CONSTRAINT avoir_ville1_FK FOREIGN KEY (vil_id) REFERENCES ville(vil_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: creuser
#------------------------------------------------------------

CREATE TABLE creuser(
        tun_id Int NOT NULL ,
        gro_id Int NOT NULL
	,CONSTRAINT creuser_PK PRIMARY KEY (tun_id,gro_id)

	,CONSTRAINT creuser_tunnel_FK FOREIGN KEY (tun_id) REFERENCES tunnel(tun_id)
	,CONSTRAINT creuser_groupe0_FK FOREIGN KEY (gro_id) REFERENCES groupe(gro_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: etre_disponible
#------------------------------------------------------------

CREATE TABLE etre_disponible(
        bie_id Int NOT NULL ,
        tav_id Int NOT NULL
	,CONSTRAINT etre_disponible_PK PRIMARY KEY (bie_id,tav_id)

	,CONSTRAINT etre_disponible_biere_FK FOREIGN KEY (bie_id) REFERENCES biere(bie_id)
	,CONSTRAINT etre_disponible_taverne0_FK FOREIGN KEY (tav_id) REFERENCES taverne(tav_id)
)ENGINE=InnoDB;

