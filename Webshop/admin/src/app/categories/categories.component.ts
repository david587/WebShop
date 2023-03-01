import { Component } from '@angular/core';
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
  
  constructor(
    private api: ApiService,
    private formBuilder: FormBuilder
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
          this.getCategories();
        },
        error: (err:any) => {
          console.log('Hiba! A termék felévtele sikertelen!')
        }
      });
    }

    clearField() {
      this.categorieForm.patchValue({
        inCategorie: ''
        });
    }
}
