import { Component, NgZone } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ApiService } from '../shared/api.service';

@Component({
  selector: 'app-products',
  templateUrl: './products.component.html',
  styleUrls: ['./products.component.scss']
})
export class ProductsComponent {

  productForm !: FormGroup;
  editForm !: FormGroup;
  products:any = [];
  message!:any;
  errmess!:any;

  constructor(
    private api: ApiService,
    private formBuilder: FormBuilder,
    private ngZone: NgZone,
    ) { }

  ngOnInit(): void {
    this.productForm = this.formBuilder.group({
<<<<<<< HEAD
      Name: ['', Validators.required],
      Price: [''],
      Details:[''],
      Image:[''],
      InStock:[''],
      Brand:[''],
      Categorie:['']
=======
      name: ['', Validators.required],
      price: [''],
      details:[''],
      image:[''],
      inStock:[''],
      brand_id:[''],
      categorie_id:['']
>>>>>>> 5d6f40c0bc9decbf68467b0810a9e8357bf646b8

    });
    this.editForm = this.formBuilder.group({
      id: [''],
<<<<<<< HEAD
      Name: ['', Validators.required],
      Price: [''],
      Details:[''],
      Image:[''],
      InStock:[''],
      Brand:[''],
      Categorie:['']
=======
      name: ['', Validators.required],
      price: [''],
      details:[''],
      image:[''],
      inStock:[''],
      brand_id:[''],
      categorie_id:['']
>>>>>>> 5d6f40c0bc9decbf68467b0810a9e8357bf646b8
    });
    this.getProducts();
  }

  showMessage() {
    // set a timeout function to clear the message after 4 seconds
    this.ngZone.run(() => {
      setTimeout(() => {
        this.message = '';
        this.errmess ='';
      }, 4000);
    });
  }

  getProducts() {
    this.api.getProducts().subscribe({
      next: (response: any) => {
        this.products = response.data;
<<<<<<< HEAD
=======
        this.showMessage();
        
        
        // this.message = response.message;
>>>>>>> 5d6f40c0bc9decbf68467b0810a9e8357bf646b8
      },
      error: (err) => {
        console.log('Hiba! A REST API lekérdezés sikertelen!');
        console.log(err);
      }
    });
  }
  

  onClick() {
    this.addProduct();
  }

  addProduct() {
    let data = {
<<<<<<< HEAD
      name: this.productForm.value.Name,
      price: this.productForm.value.Price,
      detale: this.productForm.value.Details,
      image: this.productForm.value.Image,
      instock: this.productForm.value.InStock,
      brand: this.productForm.value.Brand,
      categorie: this.productForm.value.Categorie
=======
      name: this.productForm.value.name,
      price: this.productForm.value.price,
      details: this.productForm.value.details,
      image: this.productForm.value.image,
      inStock: this.productForm.value.inStock,
      brand_id: this.productForm.value.brand_id,
      categorie_id: this.productForm.value.categorie_id
>>>>>>> 5d6f40c0bc9decbf68467b0810a9e8357bf646b8
    };

    this.clearField();
    this.api.addProduct(data)
    .subscribe({
      next: (data:any) => {
        console.log('vissza: ' + data);
        this.message = data.message;
        this.getProducts();
        this.showMessage();
      },
      error: (err:any) => {
        this.errmess = err.error.message;
        this.showMessage();
      }
    });
  }

  clearField() {
    this.productForm.patchValue({
        name: '', 
        price: '',
        details: '',
        image: '',
        inStock: '',
        brand_id: '',
        categorie_id: '',
      });
  }

  deleteProduct(id: number) {
    this.api.deleteProduct(id).subscribe({
      next: (res:any) => {
        this.message = res.message;
        this.getProducts();
        this.showMessage();
      },
      error: (err) => {
        this.errmess = err.error.message;
        this.showMessage();
      }
    });
  }

  editProduct(product: any) {
    this.editForm.patchValue({id: product.id});
<<<<<<< HEAD
    this.editForm.patchValue({Name: product.name});
    this.editForm.patchValue({Price: product.price});
    this.editForm.patchValue({Details: product.details});
    this.editForm.patchValue({Image: product.image});
    this.editForm.patchValue({InStock: product.inStock});
    this.editForm.patchValue({Brand: product.brand_id});
    this.editForm.patchValue({Categorie: product.categorie_id});
=======
    this.editForm.patchValue({name: product.name});
    this.editForm.patchValue({price: product.price});
    this.editForm.patchValue({details: product.details});
    this.editForm.patchValue({image: product.image});
    this.editForm.patchValue({inStock: product.inStock});
    this.editForm.patchValue({brand_id: product.brand_id});
    this.editForm.patchValue({categorie_id: product.categorie_id});
>>>>>>> 5d6f40c0bc9decbf68467b0810a9e8357bf646b8
  }
  
  updateProduct() {
    let data = {
      id: this.editForm.value.id,
<<<<<<< HEAD
      name: this.editForm.value.Name,
      price: this.editForm.value.Price,
      detail: this.editForm.value.Details,
      image: this.editForm.value.Image,
      inStock: this.editForm.value.InStock,
      brand: this.editForm.value.Brand,
      categorie: this.editForm.value.Categorie
=======
      name: this.editForm.value.name,
      price: this.editForm.value.price,
      detail: this.editForm.value.deatails,
      image: this.editForm.value.image,
      inStock: this.editForm.value.inStock,
      brand_id: this.editForm.value.brand_id,
      categorie_id: this.editForm.value.categorie_id
>>>>>>> 5d6f40c0bc9decbf68467b0810a9e8357bf646b8
    };

    this.api.updateProduct(data).subscribe({
      next: (res:any) => {
        console.log(res.message);
        this.message = res.message;
        this.getProducts();
        this.showMessage();
      },
      error: (err) => {
        this.errmess = err.error.message;
        this.showMessage();
      }
    });

  }

}