import { Component } from '@angular/core';
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

  constructor(
    private api: ApiService ,
    ){
    
  }

  ngOnInit(): void{
  this.getUsers();
  }

  getUsers(){
    this.api.getUsers().subscribe({
      next: (response:any) => {
        this.users = response.data;
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
        console.log(response);
        this.getUsers();
      },
      error: (err) => {
        console.log('Hiba! Admin jog adás sikertelen!');
        console.log(err);
      }
    });
  }

  deleteUser(id: number){
    this.api.deleteUser(id).subscribe({
      next: (response:any) =>{
        console.log(response);
        this.getUsers();
      },
      error: (err) => {
        console.log('Hiba! Felhasználó törlése sikertelen!');
        console.log(err);
      }
    });

  }

}
