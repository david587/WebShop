import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from '../shared/auth.service';
import { EmitterService } from '../shared/emitter.service';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {
  navVisible =false;
  authvisible:any;
  constructor(private authService: AuthService,private router: Router,private emit: EmitterService) { }

  ngOnInit(): void {
    this.hideAuth();
    this.emit.event.subscribe( ()=> {
      this.hideAuth();
    } );
  }

  hideAuth(){
    if(localStorage.getItem('token')){
      this.authvisible=true;
    }
    else{
      this.authvisible=false;
    }
  }

  logout()
  {
    this.authService.logout();
  }

  onClickToggle()
  {
    if(this.navVisible == false){
      this.navVisible =true;
    }
    else{
      this.navVisible =false;
    }
   
  }

}
