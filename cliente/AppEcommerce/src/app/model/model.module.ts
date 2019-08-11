import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ProductDatasourceService } from './product-datasource.service';
import { ProductRepositoryService } from './product-repository.service';
import { CartSummaryComponent } from '../store/cart-summary/cart-summary.component';

@NgModule({
  declarations: [ CartSummaryComponent],
  imports: [
    CommonModule
  ],
  providers: [ProductDatasourceService, ProductRepositoryService]
})
export class ModelModule { }
