SELECT pc,mouses.name, keyboards.name, mousepads.name,
headsets.name,categories_id,carts.quantity,users.email
,buyers.email,purcases.timestamps
FROM compatibilities 
JOIN keyboards on keyboard_id = keyboards.keyboards_id 
JOIN mouses on mouse_id = mouses.mouses_id 
JOIN mousepads on mousepad_id = mousepads.mousepads_id 
JOIN headsets on headset_id = headsets.headsets_id 
JOIN categories on headsets_id = categories.headset_id 
JOIN carts on categories_id = carts.categorie_id 
JOIN users on user_id = users.users_id 
JOIN buyers on users_id = buyers.buyers_id 
JOIN purcases on buyers_id = purcases.buyer_id;