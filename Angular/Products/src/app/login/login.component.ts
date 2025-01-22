import { Component } from '@angular/core';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { RouterLink } from '@angular/router';
import { Router } from '@angular/router';
@Component({
  selector: 'app-login',
  imports: [FormsModule,RouterLink],
  templateUrl: './login.component.html',
  styleUrl: './login.component.css'
})
export class LoginComponent {

constructor(private router : Router){}

onSubmit(){
  this.router.navigate(['/']);
}

}
