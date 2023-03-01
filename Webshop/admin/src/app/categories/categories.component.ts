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
      inCategorie: ['', Validators.required],
    });
  
    this.getCategories();
  }
  
    getCategories(){
      this.api.getCategories().subscribe({
        next: (categories:any) => {        
          this.categories = categories;
        },
        error: (err:any) => {
          console.log('Hiba! A REST API lekérdezés sikertelen!');
          console.log(err);
        }
      });
    }

    addBrand() {
      let data = {
        categorie: this.categorieForm.value.Categorie,
      };
      this.clearField();
      this.api.addBrand(data)
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
