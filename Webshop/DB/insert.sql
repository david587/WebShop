insert into keyboards (name, brand, price, details, img) 
values ("Redragon", "Gipr", 1554, "new", LOAD_FILE('./img'));

insert into mouses (name, brand, price, details, img) 
values ("g20", "Logitech", 6430, "new", LOAD_FILE('./img'));

insert into mousepads (name, brand, price, details, img) 
values ("g20 mousepad", "Logitech", 3400, "new", LOAD_FILE('./img'));

insert into headsets (name, brand, price, details, img) 
values ("stringer", "HyperX", 17430, "new", LOAD_FILE('./img'));


insert into compatibilities(pc, ps, nintendo_switch, xbox, keyboard_id,mouse_id,mousepad_id,headset_id )
values (
    true, true, false, false,
(select keyboards_id from keyboards where keyboards.name = "Redragon"),
(select mouses_id from mouses where mouses.name = "g20"),
(select mousepads_id from mousepads where mousepads.name = "g20 mousepad"),
(select headsets_id from headsets where headsets.name = "stringer")
);

insert into categories (keyboard_id,mouse_id,headset_id,mousepad_id)
values
(
    (select keyboards_id from keyboards where keyboards.name = "Redragon"),
    (select mouses_id from mouses where mouses.name ="g20"),
    (select mousepads_id from mousepads where mousepads.name="g20 mousepad"),
    (select headsets_id from headsets where headsets.name = "stringer")
);


INSERT INTO users (email, password, confirm_password, timestamps)
values
(
    "david@gmail.com","1234","1234","2022-08-04"
);


INSERT INTO carts (quantity,categorie_id,user_id)
values
(
    2,
    (select keyboards_id from keyboards where keyboards.name ="Redragon"),
    (select users_id from users where users.email = "david@gmail.com")
);


INSERT into buyers (name,email,address,phone,card,user_id)
values
(
    "david","david@gmail.com","Esztergom","063212321",231231231,
    (select users_id from users where users.email = "david@gmail.com")
);


INSERT INTO purcases (timestamps,productName,productBrand,productPrice,buyerName,buyerEmail,buyerAddress,cart_id,buyer_id)
values
(
    "2022-08-04",
    (select name from keyboards where keyboards.name = "Redragon"),
    (select brand from keyboards where keyboards.name = "Redragon"),
    (select price from keyboards where keyboards.name = "Redragon"),
    (select name from buyers where buyers.name = "david"),
    (select email from buyers where buyers.name = "david"),
    (select address from buyers where buyers.name = "david"),
    (select carts_id from carts where user_id = 1),
    (select buyers_id from buyers where user_id = 1)
);