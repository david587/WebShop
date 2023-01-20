insert into keyboards (name, brand, price, details, img) 
values ("K552-2 Kumara gamer keyboard", "Redragon", 20664, "REDRAGON K530 Draconic RGB mechanical keyboard, red switch, Hungarian layout, 61 keys, USB-C, Bluetooth", LOAD_FILE('../Webshop/src/assets/images/K552_keyboard.png'));

insert into mouses (name, brand, price, details, img) 
values ("M908 Impact gamer mouse", "Redragon", 11640, "Customizable usage. Thanks to its adjustable sensitivity, you can adapt the mobility of the mouse pointer to your personal needs.", LOAD_FILE('../Webshop/src/assets/images/m908-impact.png'));

insert into mousepads (name, brand, price, details, img) 
values ("Flick L gamer mousepad", "Redragon", 4599, "The surface is made of silk-like fabric
The bottom is made of natural rubber
Anti-slip, environmentally friendly and long-lasting
Waterproof and easy to clean
Use super fine and high density material", LOAD_FILE('../Webshop/src/assets/images/flick-l-mousepad.png'));

insert into headsets (name, brand, price, details, img) 
values ("HyperXCloud Stinger gamer Headset", "Hp", 17430, "Lightweight headphones with earcups that can be rotated 90 degrees
Directional 50mm drivers for precise sound reproduction
Exclusive HyperX memory foam
Adjustable steel headband
Intuitive volume control on the earpiece
Noise-cancelling microphone that can be switched off with the rotary mechanism
Compatible with many platforms", LOAD_FILE('../Webshop/src/assets/images/hyperx-stinger.png'));


insert into compatibilities(pc, ps, PlayStation, xbox, keyboard_id,mouse_id,mousepad_id,headset_id )
values (
    true, true, false, false,
(select keyboards_id from keyboards where keyboards.name = "K552-2 Kumara gamer keyboard"),
(select mouses_id from mouses where mouses.name = "M908 Impact gamer mouse"),
(select mousepads_id from mousepads where mousepads.name = "Flick L gamer mousepad"),
(select headsets_id from headsets where headsets.name = "HyperXCloud Stinger gamer Headset")
);

insert into categories (keyboard_id,mouse_id,headset_id,mousepad_id)
values
(
    (select keyboards_id from keyboards where keyboards.name = "K552-2 Kumara gamer keyboard"),
    (select mouses_id from mouses where mouses.name ="M908 Impact gamer mouse"),
    (select mousepads_id from mousepads where mousepads.name="Flick L gamer mousepad"),
    (select headsets_id from headsets where headsets.name = "HyperXCloud Stinger gamer Headset")
);


INSERT INTO users (name,email, password, confirm_password, timestamps)
values
(
    "Kis Dávid","david@gmail.com","123456","123456","2023-01-03"
);


INSERT INTO carts (quantity,productName,productPrice,productBrand,categorie_id,user_id)
values
(
    2,
    (select name from keyboards where keyboards.name = "K552-2 Kumara gamer keyboard"),
    (select price from keyboards where keyboards.name = "K552-2 Kumara gamer keyboard"),
    (select brand from keyboards where keyboards.name = "K552-2 Kumara gamer keyboard"),
    (select keyboards_id from keyboards where keyboards.name ="K552-2 Kumara gamer keyboard"),
    (select users_id from users where users.email = "david@gmail.com")
);


INSERT into buyers (name,email,address,phone,card,user_id)
values
(
    "Kis Dávid","david@gmail.com","Esztergom","063212321",231231231,
    (select users_id from users where users.email = "david@gmail.com")
);


INSERT INTO purcases (timestamps,productName,productBrand,productPrice,buyerName,buyerEmail,buyerAddress,cart_id,buyer_id)
values
(
    "2022-08-04",
    (select name from keyboards where keyboards.name = "K552-2 Kumara gamer keyboard"),
    (select brand from keyboards where keyboards.name = "K552-2 Kumara gamer keyboard"),
    (select price from keyboards where keyboards.name = "K552-2 Kumara gamer keyboard"),
    (select name from buyers where buyers.name = "Kis Dávid"),
    (select email from buyers where buyers.name = "Kis Dávid"),
    (select address from buyers where buyers.name = "Kis Dávid"),
    (select carts_id from carts where user_id = 1),
    (select buyers_id from buyers where user_id = 1)
);


--második adat
insert into keyboards (name, brand, price, details, img) 
values ("Apex Pro Tkl gamer keyboard", "Steelseries", 151554, "World's fastest OmniPoint 2.0 adjustable switches with 11x quicker response and 10x swifter actuation", LOAD_FILE('/home/davis/desktop/1.JPG'));

insert into mouses (name, brand, price, details, img) 
values ("M711 Cobra gamer mouse", "Redragon", 10430, "Customizable usage. Thanks to its adjustable sensitivity, you can adapt the mobility of the mouse pointer to your personal needs.", LOAD_FILE('./img'));

insert into mousepads (name, brand, price, details, img) 
values ("QCK L: SAINTS ROW EDITION gamer mousepad", "Steelseries", 6400, "Exclusive QcK micro-woven cloth for maximum control,450 mm x 400 mm x 3mm,Durable and washable for easy cleaning", LOAD_FILE('./img'));

insert into headsets (name, brand, price, details, img) 
values ("G Pro gamer headset", "Logitech", 34430, "The durable aluminum fork and steel headband are designed for long-lasting use.", LOAD_FILE('./img'));


insert into compatibilities(pc, ps, PlayStation, xbox, keyboard_id,mouse_id,mousepad_id,headset_id )
values (
    true, true, false, false,
(select keyboards_id from keyboards where keyboards.name = "Apex Pro Tkl gamer keyboard"),
(select mouses_id from mouses where mouses.name = "M711 Cobra gamer mouse"),
(select mousepads_id from mousepads where mousepads.name = "QCK L: SAINTS ROW EDITION gamer mousepad"),
(select headsets_id from headsets where headsets.name = "G Pro gamer headset")
);

insert into categories (keyboard_id,mouse_id,headset_id,mousepad_id)
values
(
    (select keyboards_id from keyboards where keyboards.name = "Apex Pro Tkl gamer keyboard"),
    (select mouses_id from mouses where mouses.name ="M711 Cobra gamer mouse"),
    (select mousepads_id from mousepads where mousepads.name="QCK L: SAINTS ROW EDITION gamer mousepad"),
    (select headsets_id from headsets where headsets.name = "G Pro gamer headset")
);


INSERT INTO users (name,email, password, confirm_password, timestamps)
values
(
    "Nagy János","nagyjanos@gmail.com","12345","12345","2023-01-04"
);


INSERT INTO carts (quantity,productName,productPrice,productBrand,categorie_id,user_id)
values
(
    2,
    (select name from keyboards where keyboards.name = "Apex Pro Tkl gamer keyboard"),
    (select price from keyboards where keyboards.name = "Apex Pro Tkl gamer keyboard"),
    (select brand from keyboards where keyboards.name = "Apex Pro Tkl gamer keyboard"),
    (select keyboards_id from keyboards where keyboards.name ="Apex Pro Tkl gamer keyboard"),
    (select users_id from users where users.email = "nagyjanos@gmail.com")
);


INSERT into buyers (name,email,address,phone,card,user_id)
values
(
    "Nagy János","nagyjanos@gmail.com","Budapest","0654341",443656556,
    (select users_id from users where users.email = "nagyjanos@gmail.com")
);


INSERT INTO purcases (timestamps,productName,productBrand,productPrice,buyerName,buyerEmail,buyerAddress,cart_id,buyer_id)
values
(
    "2023-01-04",
    (select name from keyboards where keyboards.name = "Apex Pro Tkl gamer keyboard"),
    (select brand from keyboards where keyboards.name = "Apex Pro Tkl gamer keyboard"),
    (select price from keyboards where keyboards.name = "Apex Pro Tkl gamer keyboard"),
    (select name from buyers where buyers.name = "Nagy János"),
    (select email from buyers where buyers.name = "Nagy János"),
    (select address from buyers where buyers.name = "Nagy János"),
    (select carts_id from carts where user_id = 2),
    (select buyers_id from buyers where user_id = 2)
);

