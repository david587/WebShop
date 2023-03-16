import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ProductsService } from '../shared/products.service';

@Component({
  selector: 'app-products',
  templateUrl: './products.component.html',
  styleUrls: ['./products.component.css']
})
export class ProductsComponent implements OnInit {

  searchValue : string="";
  products !: any;
  constructor(
    private productService: ProductsService,
    private router: Router,
    ) { }

  ngOnInit(): void {
    this.getProducts();
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
  this.productService.getProducts().subscribe({
    next: (products:any) => {        
      this.products = products.data;
      console.log(products.data);
      
    },
    error: (err: any) => {
      console.log('Hiba! A REST API lekérdezés sikertelen!');
      console.log(err);
    }
  });
 }
}
