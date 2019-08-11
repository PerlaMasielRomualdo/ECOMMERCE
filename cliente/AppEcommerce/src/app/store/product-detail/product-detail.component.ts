import { Component, OnInit } from '@angular/core';
import { ProductRepositoryService } from 'src/app/model/product-repository.service';
import { ActivatedRoute, Router, ParamMap } from '@angular/router';
import { Observable } from 'rxjs';
import { Product } from 'src/app/model/product';
import { switchMap } from 'rxjs/operators'

@Component({
  selector: 'app-product-detail',
  templateUrl: './product-detail.component.html',
  styleUrls: ['./product-detail.component.css']
})
export class ProductDetailComponent implements OnInit {

  p$: Observable<Product>;

  constructor(private product: ProductRepositoryService, private route: ActivatedRoute, private router: Router) { }

  ngOnInit() {
    this.p$ = this.route.paramMap.pipe(switchMap((params: ParamMap) => this.product.getProductById(params.get('id'))));
  }

}
