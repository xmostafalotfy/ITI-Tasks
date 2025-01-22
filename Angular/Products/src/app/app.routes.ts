import { Routes } from '@angular/router';
import { ListComponent } from './list/list.component';
import { LoginComponent } from './login/login.component';
import { RegisterComponent } from './register/register.component';
import { CartComponent } from './cart/cart.component';
import { DetailsComponent } from './details/details.component';
import { NotFoundComponent } from './not-found/not-found.component';

export const routes: Routes = [
    {
        path : '',
        component : ListComponent,
        title : "Items List"  
    },
    {
        path : 'login',
        component : LoginComponent,
        title : "Login"  
    },
    {
        path : 'register',
        component : RegisterComponent,
        title : "Register"  
    },
    {
        path : 'cart',
        component : CartComponent,
        title : "Cart"  
    },
    {
        path : 'details/:id',
        component : DetailsComponent,
        title : "Item Details"  
    },
    {
        path : '**',
        component : NotFoundComponent,
        title : "Error404"  
    }
];
