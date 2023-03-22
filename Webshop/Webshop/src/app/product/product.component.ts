import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { ProductsService } from '../shared/products.service';

@Component({
  selector: 'app-product',
  templateUrl: './product.component.html',
  styleUrls: ['./product.component.css']
})
export class ProductComponent implements OnInit {
  product: any;
  message !: string;
  constructor(
    private productService: ProductsService,
    private router: Router
    ) { }

  ngOnInit(): void {
    console.log('ProductComponent ngOnInit called');
    this.product = history.state.product;
    
    
  }

  addToCart(id: number){
    if(!localStorage.getItem('token')){
      this.router.navigate(["signin"]);
    }
    else{
      this.productService.addToCart(id).subscribe(
        res=>{
        this.message = res.message
        console.log(this.message);
        
        this.showMessage(this.message);;
      }
    )
    }
 }

 showMessage(message: string, duration: number = 3000): void {
  this.message = message;
  setTimeout(() => this.message="", duration);
}

}
