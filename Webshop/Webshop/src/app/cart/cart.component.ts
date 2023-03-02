import { Component, OnInit } from '@angular/core';
import { ProductsService } from '../shared/products.service';


@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent implements OnInit {
  products !: any;
  constructor(private ProductService: ProductsService) { }

  ngOnInit(): void {
    this.getCartItem();
  }
  getCartItem(){
    this.ProductService.getCartItem().subscribe({
        next: (products:any) => {        
          this.products = products;
        },
        error: (err: any) => {
          console.log('Hiba! A REST API lekérdezés sikertelen!');
          console.log(err);
        }
      });
    
  }
  emptyCart(){
    
  }
}
