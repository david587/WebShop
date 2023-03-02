import { Injectable, OnInit } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ProductsService implements OnInit {
  products !: any;
  host = "http://localhost:8000/api";


  constructor(private http: HttpClient) { }
  ngOnInit(): void {
    this.getProducts();
  }
  getProducts(){
    let endpoint = "Products";
    let url = this.host + "/" +endpoint;
    return this.http.get<any>(url)
  }
  //cartitem->getCartItem() kell token
  getCartItem() {
    let endpoint = 'products';
    let url = "http://localhost:8000/api/"+endpoint;

    let token = localStorage.getItem('token');

    let headers = new HttpHeaders({
      'Content-Type': 'applicaton/json',
      'Authorization': 'Bearer ' + token
    });

    let httpOption = {
      headers: headers
    };
    return this.http.get<any>(url, httpOption);
  }

  getRandomFour(){
    let endpoint = "Products/Home";
    let url = this.host + "/" +endpoint;
    return this.http.get<any>(url)
  }
  
}

