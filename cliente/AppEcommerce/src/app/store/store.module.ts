import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { StoreComponent } from './store.component';
import { FooterComponent } from './footer/footer.component';
import { NavigationComponent } from './navigation/navigation.component';
import { CartSummaryComponent } from './cart-summary/cart-summary.component';
import { Cart } from '../model/cart';
import { CartComponent } from './cart/cart.component';
import { CheckoutComponent } from './checkout/checkout.component';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';
import { RouterModule } from '@angular/router';
import { AppRoutingModule } from '../app-routing.module';
import { ModelModule } from '../model/model.module';
import { ProductDetailComponent } from './product-detail/product-detail.component';

@NgModule({
  declarations: [StoreComponent, FooterComponent, NavigationComponent, CartSummaryComponent, CartComponent, CheckoutComponent, PageNotFoundComponent, ProductDetailComponent],
  imports: [
    CommonModule,
    RouterModule,
    AppRoutingModule
  ],
  exports: [StoreComponent],

  providers: [Cart, ModelModule]
})
export class StoreModule { }
