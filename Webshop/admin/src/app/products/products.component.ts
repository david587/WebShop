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
      inName: ['', Validators.required],
      inPrice: [''],
      inDetails:[''],
      inImage:[''],
      inInStock:[''],
      inBrand:[''],
      inCategorie:['']

    });
    this.editForm = this.formBuilder.group({
      edInId: [''],
      edInName: ['', Validators.required],
      edInPrice: [''],
      edInDetails:[''],
      edInImage:[''],
      edInInStock:[''],
      edInBrand:[''],
      edInCategorie:['']
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
      name: this.productForm.value.inName,
      price: this.productForm.value.inPrice,
      detale: this.productForm.value.inDetails,
      image: this.productForm.value.inImage,
      instock: this.productForm.value.inInStock,
      brand: this.productForm.value.inBrand,
      categorie: this.productForm.value.inCategorie
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
        inName: '', 
        inPrice: '',
        inDetale: '',
        inImage: '',
        inInStock: '',
        inBrand: '',
        inCategorie: '',
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
    this.editForm.patchValue({edInId: product.id});
    this.editForm.patchValue({edInName: product.name});
    this.editForm.patchValue({edInPrice: product.price});
    this.editForm.patchValue({edInDetails: product.details});
    this.editForm.patchValue({edInImage: product.image});
    this.editForm.patchValue({edInInStock: product.inStock});
    this.editForm.patchValue({edInBrand: product.brand_id});
    this.editForm.patchValue({edInCategorie: product.categorie_id});
  }
  
  updateProduct() {
    let data = {
      id: this.editForm.value.edInId,
      name: this.editForm.value.edInName,
      price: this.editForm.value.edInPrice,
      detail: this.editForm.value.edInDetails,
      image: this.editForm.value.edInImage,
      inStock: this.editForm.value.edInInStock,
      brand: this.editForm.value.edInBrand,
      categorie: this.editForm.value.edInCategorie
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