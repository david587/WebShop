import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  host = "http://localhost:8000/api";

  constructor(private http: HttpClient) { }

  signUp(name:string, email:string, address:string, phone:number, password:string, confirm_password:string){
    let endpoint = 'register';
    let url = "http://localhost:8000/api/" + endpoint;

    let data = {
      name: name,
      email: email,
      address: address,
      phone: phone,
      password: password,
      confirm_password: confirm_password
    }
    let headers = new HttpHeaders({
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    });
    let httpOption = {
      headers: headers
    };
    return this.http.post<any>(url, data, httpOption);

  }
  
  login(email:string, pass:string) {
    let endpoint = 'login';
    let url = "http://localhost:8000/api/" + endpoint;
    
    let data = {
      email: email,
      password: pass
    };

    let headers = new HttpHeaders({
      'Content-Type': 'application/json',
      'Accept': 'application/json'
    });

    let httpOption = {
      headers: headers
    };
    return this.http.post<any>(url, data, httpOption);
  }
  
  logout() {
    let endpoint = 'logout';
    let url = this.host + "/" + endpoint;
    let token = localStorage.getItem('token');
    localStorage.removeItem('token');
    let headers = new HttpHeaders({
      'Content-Type': 'applicaton/json',
      'Authorization': 'Bearer ' + token
    });
    let httpOption = {
      headers: headers
    };
    return this.http.post(url, "", httpOption);
  }

}
