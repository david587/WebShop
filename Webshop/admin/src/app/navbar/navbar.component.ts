import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from '../shared/auth.service';
import { EmitterService } from '../shared/emitter.service';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.scss']
})
export class NavbarComponent implements OnInit {
  
  loginVisible:any;
  logoutVisible:any;
  constructor(private auth: AuthService,
              private router: Router,
              private emit: EmitterService
  ) { }
  
  ngOnInit(): void {
    this.emit.event.subscribe( ()=> {
      this.hideAuth();
    } );
  }

  hideAuth(){
    if(localStorage.getItem('token')){
      this.loginVisible=false;
      this.logoutVisible=true;
    }
  }

  logout()
  {
    this.auth.logout();
    this.logoutVisible=false;
    this.loginVisible=true;
    console.log(localStorage.getItem('token'));
     
  }

}
