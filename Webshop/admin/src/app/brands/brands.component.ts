import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { ApiService } from '../shared/api.service';

@Component({
  selector: 'app-brands',
  templateUrl: './brands.component.html',
  styleUrls: ['./brands.component.scss']
})
export class BrandsComponent {

brandForm !: FormGroup;
brands:any = [];

constructor(
  private api: ApiService,
  private formBuilder: FormBuilder
  ) { }

ngOnInit(): void {
  this.brandForm = this.formBuilder.group({
    inBrand: ['', Validators.required],
  });

  this.getBrands();
}

  getBrands(){
    this.api.getBrands().subscribe({
      next: (brands:any) => {        
        this.brands = brands;
      },
      error: (err:any) => {
        console.log('Hiba! A REST API lekérdezés sikertelen!');
        console.log(err);
      }
    });
  }

  onClick() {
    this.addBrand();
  }

  addBrand() {
    let data = {
      brand: this.brandForm.value.inBrand,
    };
    this.clearField();
    this.api.addBrand(data)
    .subscribe({
      next: (data:any) => {
        console.log('vissza: ' + data);
        this.getBrands();
      },
      error: (err:any) => {
        console.log('Hiba! A termék felévtele sikertelen!')
      }
    });
  }

  clearField() {
    this.brandForm.patchValue({
        inBrand: ''
      });
  }

  deleteBrand(id: number) {
    this.api.deleteBrand(id).subscribe({
      next: (res) => {
        console.log(res);
        this.getBrands();
      },
      error: (err) => {
        console.log(err);
      }
    });
  }

}
