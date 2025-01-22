import { Injectable } from '@angular/core';
import { BehaviorSubject } from 'rxjs';
import { JData } from './type/j-data';
@Injectable({
  providedIn: 'root'
})
export class CartService {
  private counter = new BehaviorSubject<number>(0);
  private cartItems = new BehaviorSubject<Array<{id:number,amount:number}>>([]);
  constructor() { }

  getCounter(){
    return this.counter.asObservable()
  }

  setCounter(newValue:number){
    return this.counter.next(newValue)
  }

  getCart(){
    return this.cartItems.asObservable()
  }

  setCart(newV :Array<{id:number,amount:number}>){
    return this.cartItems.next(newV)
  }

}
