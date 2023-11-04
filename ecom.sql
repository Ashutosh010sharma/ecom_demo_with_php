CREATE TABLE IF NOT EXISTS users(
id INT(10) AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(120) NOT NULL,
email VARCHAR(120) NOT NULL,
password VARCHAR(120) NOT NULL,
user_type ENUM("user", "admin") DEFAULT "user",
profile VARCHAR(225) DEFAULT 'profile.jpg'
);


-- user details

CREATE TABLE IF NOT EXISTS users_details(
id INT(10) AUTO_INCREMENT PRIMARY KEY,
user_id INT() NOT NULL,
country VARCHAR(120) DEFAULT NULL,
state VARCHAR(120) DEFAULT NULL,
district VARCHAR(120) DEFAULT NULL,
pincode VARCHAR(120) DEFAULT NULL,
mobile VARCHAR(15) DEFAULT NULL,
local_address VARCHAR(120) DEFAULT NULL,
permanent_address VARCHAR(120) DEFAULT NULL,
FOREIGN KEY (user_id) REFERENCES users(id)
);


-- production_categorys
CREATE TABLE IF NOT EXISTS product_categorys(
id INT(10) AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(255) NOT NULL,
image VARCHAR(255) NOT NULL,
status ENUM("not_active","active") DEFAULT "not_active"
);

-- products
CREATE TABLE IF NOT EXISTS products(
id INT(10) AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255) NOT NULL,
price DOUBLE(8,2) NOT NULL,
sale_price DOUBLE(8,2) NOT NULL,
qty DOUBLE(8,2) NOT NULL,
details TEXT DEFAULT NULL,
image VARCHAR(120) NOT NULL
);


-- product_ratings
CREATE TABLE IF NOT EXISTS product_ratings(
id INT(10) AUTO_INCREMENT PRIMARY KEY, 
user_id INT(10) NOT NULL,
product_id INT(10) NOT NULL,
rate ENUM('1','2','3','4','5') DEFAULT'1',
FOREIGN KEY (user_id) REFERENCES users(id),
FOREIGN KEY (product_id) REFERENCES products(id)
);

-- product review

CREATE TABLE IF NOT EXISTS product_reviews(
id INT(10) AUTO_INCREMENT PRIMARY KEY,
user_id INT(10) NOT NULL,
product_id INT(10) NOT NULL,
review VARCHAR(225) NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(id),
FOREIGN KEY (product_id) REFERENCES products(id)
);

-- product cards
CREATE TABLE IF NOT EXISTS product_cards(
id INT(10) AUTO_INCREMENT PRIMARY KEY,
user_id INT(10) NOT NULL,
product_id INT(10) NOT NULL,
qty DOUBLE(8,2) NOT NULL,
FOREIGN KEY (product_id) REFERENCES products(id), 
FOREIGN KEY (user_id) REFERENCES users(id)
);

-- payments request details
CREATE TABLE IF NOT EXISTS payment_request_details(
id INT(10) AUTO_INCREMENT PRIMARY KEY,
phone VARCHAR(15) NOT NULL,
buyer_name VARCHAR (120) NOT NULL,
amount DOUBLE(8,2) NOT NULL,
purpose VARCHAR(120) NOT NULL,
payment_request_status VARCHAR(120) NOT NULL,
payment_id VARCHAR(120) DEFAULT NULL,
payment_status VARCHAR(120) DEFAULT NULL
);


-- order payments
CREATE TABLE IF NOT EXISTS order_payments(
id INT(10) AUTO_INCREMENT PRIMARY KEY,
payment_request_detail_id INT(10) NOT NULL,
FOREIGN KEY (payment_request_detail_id) REFERENCES payment_request_details(id)
);


-- producta_order

CREATE TABLE IF NOT EXISTS product_orders(
id INT(10) AUTO_INCREMENT PRIMARY KEY,
payment_id INT(10) NOT NULL,
FOREIGN KEY (payment_id) REFERENCES order_payments(id)
);

-- product order details
CREATE TABLE IF NOT EXISTS product_order_details(
id INT(10) AUTO_INCREMENT PRIMARY KEY,
order_id INT(10) NOT NULL,
product_id INT(10) NOT NULL,
user_id INT(10) NOT NULL,
qty DOUBLE(8,2) NOT NULL,
FOREIGN KEY (order_id) REFERENCES product_orders(id)     
);


