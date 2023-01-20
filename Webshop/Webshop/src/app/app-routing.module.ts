import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ProductsComponent } from './products/products.component';
import { AboutComponent } from './about/about.component';
import { SupportComponent } from './support/support.component';
import { HomeComponent } from './home/home.component';
import { GearDropComponent } from './gear-drop/gear-drop.component';
import { SignupComponent } from './signup/signup.component';
import { SigninComponent } from './signin/signin.component';

const routes: Routes = [
  {path: "home", component: HomeComponent},
  {path: "products", component: ProductsComponent},
  {path: "about", component: AboutComponent},
  {path: "support", component: SupportComponent},
  {path: "geardrop", component: GearDropComponent},
  {path: "signup", component: SignupComponent},
  {path: "signin", component: SigninComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
