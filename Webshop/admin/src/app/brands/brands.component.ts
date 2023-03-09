import { Component, NgZone } from '@angular/core';
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
message!:any;
errmess: any;

constructor(
  private api: ApiService,
  private formBuilder: FormBuilder,
  private ngZone: NgZone,
  ) { }

ngOnInit(): void {
  this.brandForm = this.formBuilder.group({
    brand: ['', Validators.required],
  });

  this.getBrands();
}

  getBrands(){
    this.api.getBrands().subscribe({
      next: (response:any) => {        
        this.brands = response.data;
        this.showMessage();
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
      brand: this.brandForm.value.brand,
    };
    this.clearField();
    this.api.addBrand(data)
    .subscribe({
      next: (data:any) => {
        this.message = data.message;
        this.getBrands();
        this.showMessage();
      },
      error: (err:any) => {
        this.errmess = err.error.message;
        this.showMessage();
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
        this.message = res.message;
        this.getBrands();
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
