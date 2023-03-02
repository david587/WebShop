import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { AuthService } from '../shared/auth.service';

@Component({
  selector: 'app-signin',
  templateUrl: './signin.component.html',
  styleUrls: ['./signin.component.scss']
})
export class SigninComponent implements OnInit {

  loginForm !: FormGroup

  constructor(
    private formBuilder: FormBuilder,
    private authService: AuthService
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
      },
      error: err => {
        console.log('Hiba! Az azonosítás sikertelen!')
      }
    });
  }
}
