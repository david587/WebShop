import { Component, OnInit } from '@angular/core';
import { ProductsService } from '../shared/products.service';


@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent implements OnInit {
 
  currentprice = 0;
  products !: any;
  constructor(private productService: ProductsService) { }

  ngOnInit(): void {
    this.getCartItem();
  }
  getTotalPrice(): number {
    let totalPrice = 0;
    for (let product of this.products) {
      totalPrice += product.price * product.quantity;
    }
    return totalPrice;
  }
  getCartItem(){
    this.productService.getCartItem().subscribe({
        next: (products:any) => {        
          this.products = products.data;
          // for(let product of products.data){
          //   this.price += product.price * product.quantity;
          //   // this.currentprice = product.price
          //   console.log(this.price);
            
          // }
          console.log(products.data);
          
        },
        error: (err: any) => {
          console.log('Hiba! A REST API lekérdezés sikertelen!');
          console.log(err);
        }
      });
    
  }
  remove(id:number){

    this.productService.remove(id).subscribe({
      next: (res) => {
        
        console.log(res.data);
        
        this.getCartItem();
      },
      error: (err) => {
        console.log(err);
      }
    });
}
addToCart(id: number){
  this.productService.addToCart(id).subscribe(
    res=>{
      this.getCartItem();
  }
)
}
}
