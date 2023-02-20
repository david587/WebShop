import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Injectable } from '@angular/core';



@Injectable({
  providedIn: 'root'
})

export class ApiService {

  apihost = 'http://localhost:8000/api/';

  constructor(private http : HttpClient) { }

  getProducts() {
    let endpoint = 'Products';
    let url = this.apihost + endpoint;
    return this.http.get<any>(url);
  }

  addProduct(data: any) {
    let endpoint = 'Products/Store';
    let url = this.apihost + endpoint;

    let token = localStorage.getItem('token');

    let headers = new HttpHeaders({
      'Content-Type': 'applicaton/json',
      'Authorization': 'Bearer ' + token
    });

    let httpOption = {
      headers: headers
    };
    return this.http.post<any>(url, data, httpOption);
  }

  deleteProduct(id: number) {
    let endpoint = 'Products/Delete/{id}';
    let url = this.apihost + endpoint + "/" + id;
    let token = localStorage.getItem('token');    
    let headers = new HttpHeaders({
      'Content-Type': 'applicaton/json',
      'Authorization': 'Bearer ' + token
    });
    let httpOption = {
      headers: headers
    };
    return this.http.delete<any>(url, httpOption);
  }
  updateProduct(product: any) {
    let id = product.id;
    let endpoint = 'Products/Updata/{id}';
    let url = this.apihost + endpoint + "/" + id;
    let token = localStorage.getItem('token');    
    let headers = new HttpHeaders({
      'Content-Type': 'applicaton/json',
      'Authorization': 'Bearer ' + token
    });
    let httpOption = {
      headers: headers
    };
    return this.http.put(url, product, httpOption);
  }
}
