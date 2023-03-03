import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.scss']
})
export class DashboardComponent implements OnInit {
  name:any;
  ngOnInit(): void {
    this.getname();
  }
  
  getname(){
    this.name = localStorage.getItem('name');
  }
   
}
