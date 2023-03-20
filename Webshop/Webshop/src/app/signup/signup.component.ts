import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { AuthService } from '../shared/auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.css']
})
export class SignupComponent implements OnInit {

  message !: string;
  error !: any;

  signupForm !: FormGroup;
  constructor(
    private formBuilder: FormBuilder,
    private authService: AuthService,
    private router: Router,
  ) { }

  ngOnInit(): void {
    this.signupForm = this.formBuilder.group({
      name:[''],
      email:[''],
      address:[''],
      phone:[''],
      password:[''],
      confirm_password:['']
    });

  }

  signUp(){
    let name = this.signupForm.value.name;
    let email = this.signupForm.value.email;
    let address = this.signupForm.value.address;
    let phone = this.signupForm.value.phone;
    let password = this.signupForm.value.password;
    let confirm_password = this.signupForm.value.confirm_password;

    this.authService.signUp(name, email, address, phone, password, confirm_password)
    .subscribe({
      next: data => {
       this.message = data.message
       this.showMessage(this.message);
       
        this.router.navigate(['/signin']);
       
      },
      error: (err:any) => {
        this.error = err.error.errors;
        console.log(this.error);

        
      }
    });
  }
  showMessage(message: string, duration: number = 3000): void {
    this.message = message;
    setTimeout(() => this.message="", duration);
  }

}
