import { Component, OnInit } from '@angular/core';
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

  constructor(
    private api: ApiService,
    ) { }

    ngOnInit(): void{
      this.getEmails();
      }

getEmails(){
  this.api.getEmails().subscribe({
    next: (response:any) => {
      this.emails =  response.data;
      console.log(response.data);
    },
    error: (err:any) => {
      console.log('Hiba! Email lekérése sikertelen!');
      console.log(err);
    }

  })
}

  sendEmail(){}
}

