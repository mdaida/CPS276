DROP TABLE IF EXISTS `notes`;

CREATE TABLE `notes`(
    id          int         NOT NULL    AUTO_INCREMENT,
    timestap    DATETIME    NOT NULL,
    note        TEXT        NOT NULL,
    PRIMARY KEY (id)
)ENGINE=InnoDB;