import { Component, OnInit } from '@angular/core';
import { Cart, CartLine } from 'src/app/model/cart';
import { Product } from 'src/app/model/product';

@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})
export class CartComponent implements OnInit {

  private updateIndex: number;

  constructor(private cart: Cart) { }

  ngOnInit() {
  }

  get cartItems(): CartLine[]{
    return this.cart.getLines();
  }

  addMoreQuantity(line: CartLine){
    this.cart.addMoreQuantity(line);
    this.cart.recalculate();
  }

  lessQuantity(line: CartLine){
    this.cart.lessQuantity(line);
    this.cart.recalculate();
  }

  removeLine(){
    this.cart.removeLine(this.updateIndex);
    this.cart.recalculate();
  }

  update(product: Product, quantity: number){
    return this.cart.updateCart(product,+quantity);
   } 

}
