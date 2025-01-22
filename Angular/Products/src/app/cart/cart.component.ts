import { Component } from '@angular/core';
import { CartService } from '../cart.service';
import { JData } from '../type/j-data';
import data from '../../assets/products.json'; 

@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css'],
})
export class CartComponent {
  cart: Array<{ id: number; amount: number; product: JData }> = [];
  totalItems: number = 0;
  totalBill: number = 0;
  Math=Math

  constructor(private cartService: CartService) {}

  ngOnInit() {
    const products: JData[] = data.products as JData[]; 

    this.cartService.getCart().subscribe((cartData) => {
      this.cart = cartData
        .map((item) => {
          const product = products.find((p) => p.id === item.id);
          if (product) {
            return { ...item, product }; 
          }
          return null; 
        })
        .filter(
          (item): item is { id: number; amount: number; product: JData } =>
            item !== null 
        );

      this.calculateTotals();
    });
  }

  incrementItem(item: { id: number; amount: number; product: JData }) {
    if (item.amount < item.product.stock) {
      item.amount++;
      this.updateCart();
    }
  }

  decrementItem(item: { id: number; amount: number; product: JData }) {
    if (item.amount > 1) {
      item.amount--;
    } else {
      this.cart = this.cart.filter((cartItem) => cartItem.id !== item.id);
    }
    this.updateCart();
  }

  updateCart() {
    const updatedCart = this.cart.map((item) => ({
      id: item.id,
      amount: item.amount,
    }));
    this.cartService.setCart(updatedCart);
    this.calculateTotals();
  }

  calculateTotals() {
    this.totalItems = this.cart.reduce((acc, item) => acc + item.amount, 0);
    this.totalBill = this.cart.reduce((acc, item) => acc + item.amount * item.product.price, 0);
  }
}
