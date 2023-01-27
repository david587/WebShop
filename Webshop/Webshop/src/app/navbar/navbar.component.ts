import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css']
})
export class NavbarComponent implements OnInit {
<<<<<<< HEAD

=======
  navVisible =false;
>>>>>>> ffe7901c58235b516c33253a271c9a43a34f0d64
  constructor() { }

  ngOnInit(): void {
  }

<<<<<<< HEAD
=======
  onClickToggle()
  {
    if(this.navVisible == false){
      this.navVisible =true;
    }
    else{
      this.navVisible =false;
    }
   
  }

>>>>>>> ffe7901c58235b516c33253a271c9a43a34f0d64
}
