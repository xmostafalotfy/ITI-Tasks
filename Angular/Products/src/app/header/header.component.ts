import { Component, inject } from '@angular/core';
import { RouterLink } from '@angular/router';
import { CartService } from '../cart.service';
@Component({
  selector: 'app-header',
  imports: [RouterLink],
  templateUrl: './header.component.html',
  styleUrl: './header.component.css'
})
export class HeaderComponent {
  counter = 0;
  serv = inject(CartService);
  ngOnInit(){
    this.serv.getCounter().subscribe((c) =>this.counter = c);
  }

  
  

}
