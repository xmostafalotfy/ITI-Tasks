import { Component , Input, Output} from '@angular/core';

@Component({
  selector: 'app-users-cards',
  imports: [],
  templateUrl: './users-cards.component.html',
  styleUrl: './users-cards.component.css'
})
export class UsersCardsComponent {
  @Input() user:any;
  

}
