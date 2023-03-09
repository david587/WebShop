import { Component, NgZone } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ApiService } from '../shared/api.service';

@Component({
  selector: 'app-categories',
  templateUrl: './categories.component.html',
  styleUrls: ['./categories.component.scss']
})
export class CategoriesComponent {
  categorieForm !: FormGroup;
  categories:any = [];
  message!:any;
  errmess: any;
  
  constructor(
    private api: ApiService,
    private formBuilder: FormBuilder,
    private ngZone: NgZone,
    ) { }
  
  ngOnInit(): void {
    this.categorieForm = this.formBuilder.group({
      categorie: ['', Validators.required],
    });
  
    this.getCategories();
  }
  
    getCategories(){
      this.api.getCategories().subscribe({
        next: (response:any) => {        
          this.categories = response.data;
          this.showMessage();
        },
        error: (err:any) => {
          console.log('Hiba! A REST API lekérdezés sikertelen!');
          console.log(err);
        }
      });
    }

    onClick(){
      this.addCategories();
    }

    addCategories() {
      let data = {
        categorie: this.categorieForm.value.categorie,
      };
      this.clearField();
      this.api.addCategorie(data)
      .subscribe({
        next: (data:any) => {
          console.log('vissza: ' + data);
          this.message = data.message;
          this.getCategories();
          this.showMessage();
        },
        error: (err:any) => {
          this.errmess = err.error.message;
          this.showMessage();
        }
      });
    }

    clearField() {
      this.categorieForm.patchValue({
        inCategorie: ''
        });
    }

    deleteCategorie(id: number) {
      this.api.deleteCategorie(id).subscribe({
        next: (res:any) => {
          this.message = res.message;
          this.getCategories();
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
