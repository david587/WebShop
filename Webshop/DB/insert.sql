
insert into keyboards (name, brand, price, details, img) 
values ("Razer", "Gipr", 1554, "new", LOAD_FILE('./img'));


insert into compatibilities(pc, ps, nintendo_switch, xbox, keyboard_id )
values (true, true, false, false,
(select keyboards_id from keyboards where keyboards.name = "Razer")
);