import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { AuthService } from '../shared/auth.service';
import { Router } from '@angular/router';
import { EmitterService } from '../shared/emitter.service';

@Component({
  selector: 'app-signin',
  templateUrl: './signin.component.html',
  styleUrls: ['./signin.component.scss']
})
export class SigninComponent implements OnInit {

  message !: string;
  error !: any;
  loginForm !: FormGroup

  constructor(
    private formBuilder: FormBuilder,
    private authService: AuthService,
    private router: Router,
    private emit: EmitterService
    ) { }

  ngOnInit(): void {
    this.loginForm = this.formBuilder.group({
      email: [''],
      password: ['']
    });
  }

  login () {
    let email = this.loginForm.value.email;
    let pass = this.loginForm.value.password;

    
    this.authService.login(email, pass)
    .subscribe({
      next: data => {
        localStorage.setItem('token', data.data.token);
        localStorage.setItem('name', data.data.name);

        this.message = data.message
        this.showMessage(this.message);

        this.router.navigate(['/products']);
        this.emit.onButton();

      },
      error: (err:any) => {
        this.error = err.error.message;
        console.log(err.error.message);
      }
    });

  }
  showMessage(message: string, duration: number = 3000): void {
    this.message = message;
    setTimeout(() => this.message="", duration);
  }
}
