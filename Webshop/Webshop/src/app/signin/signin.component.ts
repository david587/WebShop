import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { LoginService } from '../shared/login.service';

@Component({
  selector: 'app-signin',
  templateUrl: './signin.component.html',
  styleUrls: ['./signin.component.scss']
})
export class SigninComponent implements OnInit {

  loginForm !: FormGroup

  constructor(
    private formBuilder: FormBuilder,
    private loginService: LoginService
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
    this.loginService.login(email, pass)
    .subscribe({
      next: data => {
        console.log(data.token)
        console.log(data.name)
        localStorage.setItem('token', data.token);
        localStorage.setItem('name', data.name);
      },
      error: err => {
        console.log('Hiba! Az azonosítás sikertelen!')
      }
    });
  }
}
