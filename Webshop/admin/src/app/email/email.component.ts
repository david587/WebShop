import { Component, NgZone, OnInit } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { ApiService } from '../shared/api.service';

@Component({
  selector: 'app-email',
  templateUrl: './email.component.html',
  styleUrls: ['./email.component.scss']
})
export class EmailComponent implements OnInit{

  emailForm !: FormGroup;
  emails:any = [];
  message!:any;

  constructor(
    private api: ApiService,
    private ngZone: NgZone,
    ) { }

    ngOnInit(): void{
      this.getEmails();
      }

getEmails(){
  this.api.getEmails().subscribe({
    next: (response:any) => {
      this.emails =  response.data;
      this.showMessage();
    },
    error: (err:any) => {
      console.log('Hiba! Email lekérése sikertelen!');
      console.log(err);
    }

  })
}

  sendEmail(){
    this.api.sendEmail().subscribe({
      next: (response:any) => {
        this.showMessage();
      },
      error: (err:any) => {
        this.message = "sikeresen elküldve!"
       this.showMessage();
      }
  
    })
  }

  showMessage() {
    // set a timeout function to clear the message after 4 seconds
    this.ngZone.run(() => {
      setTimeout(() => {
        this.message = '';
      }, 4000);
    });
  }
}

