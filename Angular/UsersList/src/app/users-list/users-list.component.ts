import { Component } from '@angular/core';
import * as list from '../../assets/users.json';
import { UsersCardsComponent } from "../users-cards/users-cards.component";
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-users-list',
  imports: [UsersCardsComponent,FormsModule],
  templateUrl: './users-list.component.html',
  styleUrl: './users-list.component.css'
})
export class UsersListComponent {
 data : any[] = (list as any).default;
 searchTerm: string = ''; 

 onSearch(): void {
   this.data = this.data.filter(user =>
     user.email.toLowerCase().includes(this.searchTerm.toLowerCase())
   );
 }


}
