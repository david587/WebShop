import { Component, OnInit } from '@angular/core';
import { ProductsService } from '../shared/products.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})

export class HomeComponent implements OnInit{

  products !: any;
  host = "http://localhost:8000/api";

  constructor(private api: ProductsService) { }

  ngOnInit(): void {
    this.getRandomFour();
  }

  getRandomFour(){
    this.api.getRandomFour().subscribe(
      res=>{
        console.log(res.data);
        this.products=res.data;
      }
    )
  }

  


  path: string = '../assets/img/homeheadset.png';
  alt: string = 'headset';

  path1: string = '../assets/img/Series-xController.png';
  alt1: string = 'Series-xController';

  path2: string = '../assets/img/Hyper-xHeadset.png';
  alt2: string = 'Hyper-xHeadset';

  path3: string = '../assets/img/LogitechG-Pro.png';
  alt3: string = 'LogitechG-Pro';

  path4: string = '../assets/img/LogitechG502.png';
  alt4: string = 'LogitechG502';

    }
