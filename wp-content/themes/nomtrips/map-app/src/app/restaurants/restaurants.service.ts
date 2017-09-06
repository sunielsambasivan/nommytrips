import { Injectable } from '@angular/core';
import { enableProdMode } from '@angular/core';
import { Http, Response } from '@angular/http';

import { Observable } from 'rxjs/Observable';

import 'rxjs/add/operator/map';

import { environment } from '../../environments/environment';
import { Restaurant } from './restaurant';

@Injectable()
export class RestaurantsService {

  private postsUrl = environment.baseUrl + "wp-json/restaurant-api/restaurant-list/city";
  private wpApiSettings;
  
  constructor(private http: Http) { }
  
  getPosts(cityId): Observable<Restaurant[]> { 
      return this.http
        .get(this.postsUrl + '/' + cityId)
        .map((res: Response) => res.json());
  
  }
}
