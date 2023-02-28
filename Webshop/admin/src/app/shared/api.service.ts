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
    let endpoint = 'Products/Delete';
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
    let endpoint = 'Products/Update';
    let url = this.apihost + endpoint + "/" + id;
    let token = localStorage.getItem('token');    
    let headers = new HttpHeaders({
      'Content-Type': 'applicaton/json',
      'Authorization': 'Bearer ' + token
    });
    let httpOption = {
      headers: headers
    };
    return this.http.post(url, product, httpOption);
  }

  //Users

  getUsers(){
    
    let endpoint = 'Users/Show';
    let url = this.apihost + endpoint;

    return this.http.get<any>(url);
  }

  giveAdmin(user:any){
    let id = user.id;
    let endpoint = 'User/Admin';
    let url = this.apihost + endpoint + "/" + id;

    return this.http.get<any>(url);
  }

  sendEmail(){
    let endpoint = '/sendEmail';
    let url = this.apihost + endpoint;

    return this.http.get<any>(url);
  }


  // Brands

  getBrands(){
    let endpoint = '/Brand/index';
    let url = this.apihost + endpoint;
    return this.http.get<any>(url);
  }

  addBrand(data:any){
    let endpoint = '/Brand/Store';
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

  deleteBrand(id: number){
    let endpoint = '/Brand/Delete';
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

  // Categories

  getCategories(){
    let endpoint = '/Categories/index';
    let url = this.apihost + endpoint;
    return this.http.get<any>(url);
  }

  addCategorie(data:any){
    let endpoint = '/Categories/Store';
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

  deleteCategorie(id: number){
    let endpoint = '/Categories/Delete';
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

}
