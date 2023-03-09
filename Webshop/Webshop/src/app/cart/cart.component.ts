import { Component, OnInit } from '@angular/core';
import { ProductsService } from '../shared/products.service';


@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent implements OnInit {
 
  products !: any;
  constructor(private api: ProductsService) { }

  ngOnInit(): void {
    this.getCartItem();
  }
  getCartItem(){
    this.api.getCartItem().subscribe({
        next: (products:any) => {        
          this.products = products.data;
        },
        error: (err: any) => {
          console.log('Hiba! A REST API lekérdezés sikertelen!');
          console.log(err);
        }
      });
    
  }
  remove(id:number){
    this.api.remove(id).subscribe({
      next: (res) => {
        console.log(res.data);
        this.getCartItem();
      },
      error: (err) => {
        console.log(err);
      }
    });
}
}
