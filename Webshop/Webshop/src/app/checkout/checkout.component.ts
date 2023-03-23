import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';
import { ProductsService } from '../shared/products.service';
@Component({
  selector: 'app-checkout',
  templateUrl: './checkout.component.html',
  styleUrls: ['./checkout.component.css']
})
export class CheckoutComponent implements OnInit {

  message !: string;
  nextForm !: FormGroup;
  constructor(
    private router: Router,
    private productService: ProductsService,
    private formBuilder: FormBuilder,
  ) { }

  ngOnInit(): void {
    this.nextForm = this.formBuilder.group({
      shippingAddress:[''],
      phone:[''],
      paymentMethod:[''],
  });
  
  }
  next () {
    let shippingAddress = this.nextForm.value.shippingAddress;
    let phone = this.nextForm.value.phone;
    let paymentMethod = this.nextForm.value.paymentMethod;

    
    this.productService.next(shippingAddress, phone, paymentMethod)
    .subscribe({
      next: data => {
        this.message = data.message
        this.router.navigate(['/'], {state: {message: this.message}} );
      }
  });
}

}
