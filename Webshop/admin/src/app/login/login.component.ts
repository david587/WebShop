import { Component } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { AuthService } from '../shared/auth.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})

export class LoginComponent {
  
  loginForm !: FormGroup

  constructor(
    private formBuilder: FormBuilder,
    private auth: AuthService
    ) { }

  ngOnInit(): void {
    this.loginForm = this.formBuilder.group({
      email: [''],
      password: ['']
    });
  }

  login() {
    let email = this.loginForm.value.email;
    let pass = this.loginForm.value.password;
    this.auth.login(email, pass)
    .subscribe({
      next: data => {
        console.log(data.data.token)
        console.log(data.data.name)
        localStorage.setItem('token', data.data.token);
        localStorage.setItem('name', data.data.name);
        this.loginForm.patchValue({email: ''});
        this.loginForm.patchValue({password: ''});
      },
      error: err => {
        console.log('Hiba! Az azonosítás sikertelen!')
      }
    });
  }
}