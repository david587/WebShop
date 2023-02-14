import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class LoginService {

  constructor(private http: HttpClient) {}

  login(email:string, pass:string) {
      let endpoint = 'login';
      let url = "http://localhost:8000/api/" + endpoint;
      
      let loginData = {
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
      return this.http.post<any>(url, loginData, httpOption);
    }
  }
