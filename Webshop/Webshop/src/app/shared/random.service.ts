import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})

export class RandomService {
  host = "http://localhost:8000/api";
  constructor(private http: HttpClient) { }

  getRandomProducts():any{
    let endpoint ="Products/Home";
    let url = this.host + "/" + endpoint;
    return this.http.get<any>(url);
  }
}
