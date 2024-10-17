import { Routes } from '@angular/router';
import { HomeComponent } from './component/home/home.component';
import { ViewComponent } from './component/view/view.component';
import { SignupComponent } from './component/signup/signup.component';
import { LoginComponent } from './component/login/login.component';
import { AdminLoginComponent } from './admin/admin-login/admin-login.component';
import { CreateProductComponent } from './admin/create-product/create-product.component';
import { TestingComponent } from './materials/testing/testing.component';
import { CartComponent } from './component/cart/cart.component';
import { NavComponent } from './component/nav/nav.component';

export const routes: Routes = [
    {
        path: '', pathMatch: 'full', redirectTo: 'home'
    },
    {
        path: 'home', component: HomeComponent, 
    },
    {
        path: 'one-user/:id', component: ViewComponent
    },
    {
        path: 'signup', component: SignupComponent, 
    },
    {
        path: 'login', component: LoginComponent
    },
    {
        path: 'adminLogin', component: AdminLoginComponent
    },
    {
        path: 'createProduct', component: CreateProductComponent
    },
    {
        path: 'testing', component: TestingComponent
    },
    {
        path: 'cart', component: CartComponent
    },
    {
        path: 'nav', component: NavComponent
    }
];
