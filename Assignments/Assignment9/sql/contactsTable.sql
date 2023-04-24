DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts`(
    con_id          int         NOT NULL    AUTO_INCREMENT,
    con_name        TEXT        NOT NULL,
    con_address     TEXT        NOT NULL,
    con_city        TEXT        NOT NULL,
    con_state       TEXT        NOT NULL,
    con_email       TEXT        NOT NULL,
    con_DOB         DATE        NOT NULL,
    con_contact     ENUM('textUpdates', 'emailUpdates', 'newsletter') NULL,
    con_age         ENUM('10-18', '19-30', '31-50', '51+')  NULL,
    PRIMARY KEY (con_id)
)ENGINE=InnoDB;

INSERT INTO contacts(con_id, con_name, con_address, con_city, con_state, con_email, con_DOB, con_contact, con_age)
VALUES(10001, 'Matt Daida', '123 Someplace', 'Anywhere', 'MI', 'mdaida@test.com', '1999-02-23', 'textUpdates', '19-30');

