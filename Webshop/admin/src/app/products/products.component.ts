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
      name: ['', Validators.required],
      price: [''],
      details:[''],
      image:[''],
      inStock:[''],
      brand_id:[''],
      categorie_id:['']

    });
    this.editForm = this.formBuilder.group({
      id: [''],
      name: ['', Validators.required],
      price: [''],
      details:[''],
      image:[''],
      inStock:[''],
      brand_id:[''],
      categorie_id:['']
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
        this.showMessage();
        
        
        // this.message = response.message;
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
      name: this.productForm.value.name,
      price: this.productForm.value.price,
      details: this.productForm.value.details,
      image: this.productForm.value.image,
      inStock: this.productForm.value.inStock,
      brand_id: this.productForm.value.brand_id,
      categorie_id: this.productForm.value.categorie_id
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
        this.errmess = 'Hiba! A termék felvétele sikertelen!';
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
        this.message = err;
        console.log(err);
        this.showMessage();
      }
    });
  }

  editProduct(product: any) {
    this.editForm.patchValue({id: product.id});
    this.editForm.patchValue({name: product.name});
    this.editForm.patchValue({price: product.price});
    this.editForm.patchValue({details: product.details});
    this.editForm.patchValue({image: product.image});
    this.editForm.patchValue({inStock: product.inStock});
    this.editForm.patchValue({brand_id: product.brand_id});
    this.editForm.patchValue({categorie_id: product.categorie_id});
  }
  
  updateProduct() {
    let data = {
      id: this.editForm.value.id,
      name: this.editForm.value.name,
      price: this.editForm.value.price,
      detail: this.editForm.value.deatails,
      image: this.editForm.value.image,
      inStock: this.editForm.value.inStock,
      brand_id: this.editForm.value.brand_id,
      categorie_id: this.editForm.value.categorie_id
    };

    this.api.updateProduct(data).subscribe({
      next: (res:any) => {
        console.log(res.message);
        this.message = res.message;
        this.getProducts();
        this.showMessage();
      },
      error: (err) => {
        console.log(err);
        this.showMessage();
      }
    });

  }

}