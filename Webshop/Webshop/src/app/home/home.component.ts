import { Component, OnInit } from '@angular/core';
import { ProductsService } from '../shared/products.service';
import { Router } from '@angular/router';
import { FormGroup, FormBuilder } from '@angular/forms';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})

export class HomeComponent implements OnInit{

  newsletterForm !: FormGroup;
  products !: any;

  constructor(
    private api: ProductsService,
    private productService: ProductsService,
    private router: Router,
    private formBuilder: FormBuilder,
    ) { }

  ngOnInit(): void {
    this.getRandomFour();
    this.newsletterForm = this.formBuilder.group({
      email:['']
  });
}

  getRandomFour(){
    this.api.getRandomFour().subscribe(
      res=>{
        console.log(res.data);
        this.products=res.data;
      }
    )
  }

  addToCart(id: number){
    this.api.addToCart(id).subscribe(
      res=>{
        console.log(res.data);
    }
  )
 }

 newsLetter(){
  let email = this.newsletterForm.value.email;

  this.productService.newsLetter(email)
  .subscribe({
    next: data => {
     
    },
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
