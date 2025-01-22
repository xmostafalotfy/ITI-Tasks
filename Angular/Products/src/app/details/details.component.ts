import { Component, inject, Input } from '@angular/core';
import data from '../../assets/products.json'
import { JData } from '../type/j-data';
import { Router } from '@angular/router';
import { CartService } from '../cart.service';

@Component({
  selector: 'app-details',
  imports: [],
  templateUrl: './details.component.html',
  styleUrl: './details.component.css'
})
export class DetailsComponent {
  @Input() id?:number;
  list? : JData[];
  Math = Math;
  quantity : number = 1;
  serv = inject(CartService);
  cart :any ;
  constructor(private router : Router){}

  ngOnInit(){
    if(this.id){
      if(this.id < data.products.length)
      {
        this.list = data.products.filter((item): item is JData => item.id == this.id);

        }
      else this.router.navigate(['/error']);
    }else this.router.navigate(['/error']);

    this.serv.getCart().subscribe((c) =>this.cart = c);
    
  }
  add(){
    if(!(this.list !== undefined && this.quantity == this.list[0].stock))this.quantity++;
  }
  sub(){
    if(!(this.list !== undefined && this.quantity == 1))this.quantity--;
  }

  buy(id: number, amount: number) {
    if (!this.list || !this.list[0]) {
      alert("Item details not available.");
      return;
    }
  
    const stock = this.list[0].stock; 
  
    if (!Array.isArray(this.cart)) {
      this.cart = [];
    }
  
    const existingItemIndex = this.cart.findIndex((item: { id: number; amount: number }) => item.id === id);
  
    if (existingItemIndex !== -1) {
      const existingAmount = this.cart[existingItemIndex].amount;
      const newAmount = existingAmount + amount;
  
      if (newAmount > stock) {
        alert("Requested quantity exceeds stock. Adjusting to maximum available.");
        this.cart[existingItemIndex].amount = stock; 
      } else {
        this.cart[existingItemIndex].amount = newAmount; 
      }
    } else {
      if (amount > stock) {
        alert("Requested quantity exceeds stock. Adding maximum available.");
        amount = stock; 
      }
      this.cart.push({ id, amount });
    }
  
    this.serv.setCart(this.cart);
  
    const totalItems = this.cart.reduce((acc: number, item: { amount: number }) => acc + item.amount, 0);
    this.serv.setCounter(totalItems);
  
  }
  
  
  


}
