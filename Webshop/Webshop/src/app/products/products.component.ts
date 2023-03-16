import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';
import { ProductsService } from '../shared/products.service';

@Component({
  selector: 'app-products',
  templateUrl: './products.component.html',
  styleUrls: ['./products.component.css']
})
export class ProductsComponent implements OnInit {

  searchForm !: FormGroup;
  brandForm !: FormGroup;
  categorieForm !: FormGroup;

  products !: any;
  constructor(
    private productService: ProductsService,
    private router: Router,
    private formBuilder: FormBuilder,
    ) { }

  ngOnInit(): void {
    this.getProducts();

    this.searchForm = this.formBuilder.group({
      name: ['']
    });
    this.brandForm = this.formBuilder.group({
      name: ['']
    });
    this.categorieForm = this.formBuilder.group({
      name: ['']
    });
  }

  
  getProducts(){
    this.productService.getProducts().subscribe(
      res=>{
        console.log(res.data);
        this.products=res.data;

      }
    )
  }
  addToCart(id: number){
    if(!localStorage.getItem('token')){
      this.router.navigate(["signin"]);
    }
    else{
      this.productService.addToCart(id).subscribe(
        res=>{
          console.log(res.data);
      }
    )
    }
   
 }
 search(){
  let name = this.searchForm.value.name;

  this.productService.search(name).subscribe({
    next: data => {
      this.products = data.data;
      // console.log(this.products);
      console.log(data);
       
    }
  });
 }
 brand(){
  let name = this.brandForm.value.name;

  this.productService.brand(name).subscribe({
    next: data => {
      this.products = data.data;
      // console.log(this.products);
      console.log(data);
       
    }
  });
 }
 categorie(){
  let name = this.categorieForm.value.name;

  this.productService.categorie(name).subscribe({
    next: data => {
      this.products = data.data;
      // console.log(this.products);
      console.log(data);
       
    }
  });
 }
}
