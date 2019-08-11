import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavigationComponent } from './store/navigation/navigation.component';
import { FooterComponent } from './store/footer/footer.component';
import { StoreModule } from './store/store.module';
import { HttpClient, HttpClientModule } from '@angular/common/http';
import { Cart } from './model/cart';

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    StoreModule,
    HttpClientModule
  ],
  providers: [Cart],
  bootstrap: [AppComponent]
})
export class AppModule { }
