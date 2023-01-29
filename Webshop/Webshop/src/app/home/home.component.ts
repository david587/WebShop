import { Component, OnInit } from '@angular/core';
import  { RandomService } from "../shared/random.service";

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})

export class HomeComponent implements OnInit{
  
  constructor(private random: RandomService){}
  ngOnInit(): void {
    this.getRandomProducts();
  }

  getRandomProducts()
  {
    this.random.getRandomProducts().subscribe({
      next: (data: any)=>
      {
        console.log(data);
        
      }
    })
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
