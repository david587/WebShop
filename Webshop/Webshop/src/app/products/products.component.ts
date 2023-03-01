import { Component, OnInit } from '@angular/core';
import { ProductsService } from '../shared/products.service';

@Component({
  selector: 'app-products',
  templateUrl: './products.component.html',
  styleUrls: ['./products.component.css']
})
export class ProductsComponent implements OnInit {
  products !: any;
  constructor(private api: ProductsService) { }

  ngOnInit(): void {
    this.getProducts();
  }
  getProducts(){
    this.api.getProducts().subscribe(
      res=>{
        console.log(res);
        this.products=res;

      }
    )
  }

}
