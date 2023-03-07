import { Component, NgZone } from '@angular/core';
import { FormGroup } from '@angular/forms';
import { ApiService } from '../shared/api.service';

@Component({
  selector: 'app-users',
  templateUrl: './users.component.html',
  styleUrls: ['./users.component.scss']
})
export class UsersComponent {

  userForm !: FormGroup;
  users:any = [];
  message!:any;
  errmess: any;

  constructor(
    private api: ApiService ,
    private ngZone: NgZone,
    ){
    
  }

  ngOnInit(): void{
  this.getUsers();
  }

  getUsers(){
    this.api.getUsers().subscribe({
      next: (response:any) => {
        this.users = response.data;
        this.showMessage();
      },
      error: (err) => {
        console.log('Hiba! A REST API lekérdezés sikertelen!');
        console.log(err);
      }
    });
  }

  giveAdmin(id: number){
      this.api.giveAdmin(id).subscribe({
        next: (response:any) => {
        this.message = response.message;
        this.getUsers();
        this.showMessage();
      },
      error: (err) => {
        this.errmess = err.error.message;
        this.showMessage();
      }
    });
  }

  deleteUser(id: number){
    this.api.deleteUser(id).subscribe({
      next: (response:any) =>{
        this.message = response.message;
        this.getUsers();
        this.showMessage();
      },
      error: (err) => {
        this.errmess = err.error.message;
        this.showMessage();
      }
    });

  }

  showMessage() {
    // set a timeout function to clear the message after 4 seconds
    this.ngZone.run(() => {
      setTimeout(() => {
        this.message = '';
        this.errmess ='';
      }, 4000);
    });
  }

}
