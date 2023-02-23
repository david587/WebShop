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
      Detale:[''],
      Image:[''],
      InStock:[''],
      Brand:[''],
      Categorie:['']

    });
    this.editForm = this.formBuilder.group({
      Id: [''],
      Name: ['', Validators.required],
      Price: [''],
      Detale:[''],
      Image:[''],
      InStock:[''],
      Brand:[''],
      Categorie:['']
    });
    this.getProducts();
  }

  getProducts() {
    this.api.getProducts().subscribe({
      next: (products:any) => {        
        this.products = products;
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
      detale: this.productForm.value.Detale,
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
    this.editForm.patchValue({name: product.name});
    this.editForm.patchValue({price: product.price});
    this.editForm.patchValue({details: product.details});
    this.editForm.patchValue({image: product.image});
    this.editForm.patchValue({inStock: product.inStock});
    this.editForm.patchValue({brand_id: product.brand});
    this.editForm.patchValue({categorie_id: product.categorie});
  }
  
  updateProduct() {
    let data = {
      id: this.editForm.value.Id,
      name: this.editForm.value.Name,
      price: this.editForm.value.Price,
      detail: this.editForm.value.detail,
      image: this.editForm.value.image,
      inStock: this.editForm.value.inStock,
      brand: this.editForm.value.brand,
      categorie: this.editForm.value.categorie
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
