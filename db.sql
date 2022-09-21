SET @@AUTOCOMMIT = 1;

DROP DATABASE IF EXISTS SENIOR;
CREATE DATABASE SENIOR;

USE SENIOR;

-- user creates account, address is optional and will be added later after initial purchase
-- credit card will be added later after initial purchase

CREATE TABLE Users(
    user_id INTEGER PRIMARY KEY AUTOINCREMENT,
    username varchar(100) NOT NULL UNIQUE ,
    "password" varchar(100) NOT NULL , -- encrypted
    surname varchar (25) NOT NULL,
    preferred varchar (25) NOT NULL,
    title varchar (5) NOT NULL,
    email varchar(100) NOT NULL UNIQUE ,
    phone varchar(15) NOT NULL UNIQUE ,
    created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE UserAddresses(
    user_id int NOT NULL,
    address varchar (50) NOT NULL,
    suburb varchar(50) NOT NULL,
    "state" varchar (25) NOT NULL,
    postcode int(10) NOT NULL,
    country varchar (25) NOT NULL,
    PRIMARY KEY (user_id, address, postcode),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE UserCreditCards(
    user_id int NOT NULL,
    creditcard_no int (16) NOT NULL, -- encrypted
    creditcard_type varchar (25) NOT NULL,
    creditcard_expiry varchar (5) NOT NULL,
    PRIMARY KEY(user_id, creditcard_no),
    FOREIGN KEY (user_id) REFERENCES Users(user_id)
);

CREATE TABLE ItemStock(
    -- item_code is the barcode number (UPC or EAN)
    item_code INTEGER PRIMARY KEY,
    brand varchar(25) NOT NULL,
    item_name varchar(50) ,
    description varchar(200),
    price FLOAT(2),
    in_stock int NOT NULL,
    image_bytes blob
);

CREATE TABLE luShippingMethods(
    shipping_id INTEGER PRIMARY KEY AUTOINCREMENT,
    "type" varchar(25) NOT NULL UNIQUE ,
    price float(2) NOT NULL
);

CREATE TABLE Purchases(
    invoice_id INTEGER PRIMARY KEY AUTOINCREMENT,
    user_id int NOT NULL,
    shipping_id int NOT NULL,
    address varchar (50) NOT NULL,
    suburb varchar(50) NOT NULL,
    "state" varchar (25) NOT NULL,
    postcode int(10) NOT NULL,
    country varchar (25) NOT NULL,
    price FLOAT(2) NOT NULL,
    created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(user_id),
    FOREIGN KEY (shipping_id) REFERENCES luShippingMethods(shipping_id)
);

CREATE TABLE PurchaseItems(
    invoice_id int NOT NULL,
    item_code int NOT NULL,
    quantity int NOT NULL,
    PRIMARY KEY (invoice_id,item_code),
    FOREIGN KEY (invoice_id) REFERENCES Purchases(invoice_id),
    FOREIGN KEY (item_code) REFERENCES ItemStock(item_code)
);

CREATE user IF NOT EXISTS dbadmin@localhost;
GRANT all privileges ON SENIOR.* TO dbadmin@localhost;


--test inserts--
INSERT into Users(username, password, surname,preferred, title, email, phone) VALUES ('campingman154','dd0a10d89ad9c9e3f40b3c6f67f3b88eb9817ab928b5e55647516e486eb9cf22', 'Rosser', 'Richard', 'Mr', 'richardr@rosserfinance.com.au', '0477123467');

INSERT into ItemStock(item_code, brand, item_name, description, price, in_stock, image_bytes) VALUES (554893,'XTM 4x4','XTM 4x4 Double Swag',
                                                                                                      'If you are looking for a simple and easy way to camp, the XTM Double Swag delivers exactly that! You''ll have this swag assembled in no time, so all that''s left to do is sit back and enjoy the outdoors. Featuring quality 400GSM Ripstop poly-cotton canvas construction teamed with double stitched seams and a thick PVC flooring to keep the rain and moisture out.

This swag also comes with a 50mm thick foam mattress for a comfortable night’s sleep and convenient internal pockets to keep your essentials organised and easy to find. A perfect no-fuss sleeping solution for your next trip out into the bush.
',
                                                                                                      399.99,20,
                                                                                                      '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'
                                                                                                      );

INSERT into luShippingMethods(type, PRICE) VALUES ('Standard', 5.00);

INSERT into Purchases(user_id, shipping_id, address, suburb, state, postcode, country, price ) VALUES (1, 1, '34 Daybreak St', 'Burnside', 'SA', 5344, 'Australia', 79.90 );

INSERT into PurchaseItems(invoice_id, item_code, quantity) VALUES (1, 1, 4);