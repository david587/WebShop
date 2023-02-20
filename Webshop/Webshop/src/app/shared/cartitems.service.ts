import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';


@Injectable({
  providedIn: 'root'
})
export class ProductsService {
  host = "http://localhost:8000/api";

  constructor(private http: HttpClient) { }

  getProducts(){
    let endpoint = "cartItems";
    let url = this.host + "/"+endpoint;
    return this.http.get<any>(url)
  }
}
