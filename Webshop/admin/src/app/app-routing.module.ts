import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ProductsComponent } from './products/products.component';
import { DashboardComponent } from './dashboard/dashboard.component';
import { NavbarComponent } from './navbar/navbar.component';
import { UsersComponent } from './users/users.component';
import { BrandsComponent } from './brands/brands.component';
import { CategoriesComponent } from './categories/categories.component';
import { LoginComponent } from './login/login.component';

const routes: Routes = [
  {path: "dashboard", component: DashboardComponent},
  {path: "products", component: ProductsComponent},
  {path: "users", component: UsersComponent},
  {path: "brands", component: BrandsComponent},
  {path: "categories", component: CategoriesComponent},
  {path: "", component: LoginComponent},
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
