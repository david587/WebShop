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
    let endpoint = 'cartItems/show';
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

  addToCart(id: number){
    let endpoint = 'cartItems';
    let url = "http://localhost:8000/api/"+endpoint + "/" + id;

    let token = localStorage.getItem('token');
    console.log(token);

    let headers = new HttpHeaders({
      'Content-Type': 'applicaton/json',
      'Authorization': 'Bearer ' + token
    });

    let httpOption = {
      headers: headers
    };
    return this.http.post<any>(url," ", httpOption);
  }

  remove(id:number){

    let endpoint = 'cartItems/delete';
    let url = "http://localhost:8000/api/"+endpoint + "/" + id;

    let token = localStorage.getItem('token');
    console.log(token);

    let headers = new HttpHeaders({
      'Content-Type': 'applicaton/json',
      'Authorization': 'Bearer ' + token
    });
    let httpOption = {
      headers: headers
    };

    return this.http.delete<any>(url, httpOption);
  }
  newsLetter(email:string){
    let endpoint = 'Users/NewsLetter';
    let url = "http://localhost:8000/api/" + endpoint;

    let data = {
      email: email,
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

  }

