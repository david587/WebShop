import { Component } from '@angular/core';
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

  constructor(
    private api: ApiService,
    private formBuilder: FormBuilder
    ) { }

  ngOnInit(): void {
    this.productForm = this.formBuilder.group({
      Name: ['', Validators.required],
      Price: [''],
      Details:[''],
      Image:[''],
      InStock:[''],
      Brand:[''],
      Categorie:['']

    });
    this.editForm = this.formBuilder.group({
      id: [''],
      Name: ['', Validators.required],
      Price: [''],
      Details:[''],
      Image:[''],
      InStock:[''],
      Brand:[''],
      Categorie:['']
    });
    this.getProducts();
  }

  getProducts() {
    this.api.getProducts().subscribe({
      next: (response: any) => {
        this.products = response.data;
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
      name: this.productForm.value.Name,
      price: this.productForm.value.Price,
      detale: this.productForm.value.Details,
      image: this.productForm.value.Image,
      instock: this.productForm.value.InStock,
      brand: this.productForm.value.Brand,
      categorie: this.productForm.value.Categorie
    };
    this.clearField();
    this.api.addProduct(data)
    .subscribe({
      next: (data:any) => {
        console.log('vissza: ' + data);
        this.getProducts();
      },
      error: (err:any) => {
        console.log('Hiba! A termék felévtele sikertelen!')
      }
    });
  }

  clearField() {
    this.productForm.patchValue({
        Name: '', 
        Price: '',
        Detale: '',
        Image: '',
        InStock: '',
        Brand: '',
        Categorie: '',
      });
  }

  deleteProduct(id: number) {
    this.api.deleteProduct(id).subscribe({
      next: (res) => {
        console.log(res);
        this.getProducts();
      },
      error: (err) => {
        console.log(err);
      }
    });
  }

  editProduct(product: any) {
    this.editForm.patchValue({id: product.id});
    this.editForm.patchValue({Name: product.name});
    this.editForm.patchValue({Price: product.price});
    this.editForm.patchValue({Details: product.details});
    this.editForm.patchValue({Image: product.image});
    this.editForm.patchValue({InStock: product.inStock});
    this.editForm.patchValue({Brand: product.brand_id});
    this.editForm.patchValue({Categorie: product.categorie_id});
  }
  
  updateProduct() {
    let data = {
      id: this.editForm.value.id,
      name: this.editForm.value.Name,
      price: this.editForm.value.Price,
      detail: this.editForm.value.Details,
      image: this.editForm.value.Image,
      inStock: this.editForm.value.InStock,
      brand: this.editForm.value.Brand,
      categorie: this.editForm.value.Categorie
    };
    this.api.updateProduct(data).subscribe({
      next: (res) => {
        console.log(res);
        this.getProducts();
      },
      error: (err) => {
        console.log(err);
      }
    });

  }

}