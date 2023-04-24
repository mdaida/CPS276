DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins`(
    admin_id          int         NOT NULL    AUTO_INCREMENT,
    admin_name        TEXT        NOT NULL,
    admin_email       TEXT        NOT NULL,
    admin_password    TEXT        NOT NULL,
    admin_status      ENUM('admin', 'staff') NOT NULL DEFAULT 'staff',
    PRIMARY KEY (admin_id)
)ENGINE=InnoDB;

INSERT INTO admins(admin_id, admin_name, admin_email, admin_password, admin_status)
VALUES(10001, 'Matt Daida', 'mdaida@admin.com', 'password', 'admin');
INSERT INTO admins(admin_id, admin_name, admin_email, admin_password, admin_status)
VALUES(10002, 'Matt Daida', 'mdaida@staff.com', 'password', 'staff');

UPDATE SET admin_password=PASSWORD(admin_password);