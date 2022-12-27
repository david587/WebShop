insert into keyboards (name, brand, price, details, img) 
values ("Razer", "Gipr", 1554, "new", LOAD_FILE('./img'));


insert into compatibilities(pc, ps, nintendo_switch, xbox, keyboard_id )
values (true, true, false, false,
(select keyboards_id from keyboards where keyboards.name = "Razer")
);

--mouses--
insert into mouses (name, brand, price, details, img) 
values ("g20", "Logitech", 6430, "new", LOAD_FILE('./img'));

insert into compatibilities(pc, ps, nintendo_switch, xbox, mouse_id )
values (true, true, false, false,
(select mouses_id from mouses where mouses.name = "g20")
);

--mousepads--
insert into mousepads (name, brand, price, details, img) 
values ("g20 mousepad", "Logitech", 3400, "new", LOAD_FILE('./img'));

insert into compatibilities(pc, ps, nintendo_switch, xbox, mouse_id )
values (true, true, false, false,
(select mousepads_id from mousepads where mousepads.name = "g20 mousepads")
);

--headsets--
insert into headsets (name, brand, price, details, img) 
values ("stringer", "HyperX", 17430, "new", LOAD_FILE('./img'));

insert into compatibilities(pc, ps, nintendo_switch, xbox, mouse_id )
values (true, true, true, false,
(select headsets_id from headsets where headsets.name = "stringer")
);
