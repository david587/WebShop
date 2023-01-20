-- Táblák felvételének sorrendje

-- 1. compatibilities, 2. keyboards, 3. mouses, 4. mousepads,
--5. headsets, 6. categories, 7. carts, 8. users, 9. buyers,
--10. purcases

drop database if exists webshop;
create database webshop
collate utf8_hungarian_ci
charter set utf8;

grant all privileges 
on webshop.*
to webshop@localhost
identified by "Almafa12;";

create table keyboards (
    keyboards_id int not null primary key auto_increment,
    name varchar(50),
    brand varchar(50),
    price int,
    details varchar(500),
    img longblob
);

create table mouses (
    mouses_id int not null primary key auto_increment,
    name varchar(50),
    brand varchar(50),
    price int,
    details varchar(500),
    img longblob
);
create table mousepads (
    mousepads_id int not null primary key auto_increment,
    name varchar(50),
    brand varchar(50),
    price int,
    details varchar(500),
    img longblob
);
create table headsets (
    headsets_id int not null primary key auto_increment,
    name varchar(50),
    brand varchar(50),
    price int,
    details varchar(500),
    img longblob
);

create table compatibilities (
    compatibilities_id int not null primary key auto_increment,
    pc boolean,
    ps boolean,
    PlayStation boolean,
    xbox boolean,
    keyboard_id integer,
    mouse_id integer,
    mousepad_id integer,
    headset_id integer,
    foreign key(keyboard_id) references keyboards (keyboards_id),
    foreign key(mouse_id) references mouses (mouses_id),
    foreign key(mousepad_id) references mousepads (mousepads_id),
    foreign key(headset_id) references headsets (headsets_id)
);
create table categories (
    categories_id int not null primary key auto_increment,
    keyboard_id int,
    mouse_id int,
    mousepad_id int,
    headset_id int,
    foreign key (keyboard_id) references keyboards (keyboards_id),
    foreign key (mouse_id) references mouses (mouses_id),
    foreign key (mousepad_id) references mousepads (mousepads_id),
    foreign key (headset_id) references headsets (headsets_id)
);
create table users (
    users_id int not null primary key auto_increment,
    name varchar(50),
    email varchar(50),
    password varchar(50),
    confirm_password varchar(50),
    timestamps date
);
create table carts (
    carts_id int not null primary key auto_increment,
    quantity int,
    productName varchar(50),
    productPrice integer,
    productBrand varchar(50),
    categorie_id integer,
    user_id integer,
    foreign key (categorie_id) references categories (categories_id),
    foreign key (user_id) references users (users_id)
);
create table buyers (
    buyers_id int not null primary key auto_increment,
    name varchar(50),
    email varchar(50),
    address varchar(50),
    phone varchar(50),
    card varchar(50),
    user_id integer,
    foreign key (user_id) references users (users_id)
);
create table purcases (
    purcases_id int not null primary key auto_increment,
    timestamps date,
    cart_id integer,
    buyer_id integer,
    productName varchar(50),
    productPrice integer,
    productBrand varchar(50),
    buyerName varchar(50),
    buyerEmail varchar(50),
    buyerAddress varchar(50),
    foreign key (cart_id) references carts (carts_id),
    foreign key (buyer_id) references buyers (buyers_id)
);


