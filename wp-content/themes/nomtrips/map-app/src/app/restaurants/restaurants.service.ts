import { Injectable } from '@angular/core';
import { enableProdMode } from '@angular/core';
import { Http, Response } from '@angular/http';

import { Observable } from 'rxjs/Observable';

import 'rxjs/add/operator/map';

import { environment } from '../../environments/environment';
import { Restaurant } from './restaurant';

@Injectable()
export class RestaurantsService {

  private postsUrl = environment.baseUrl + "/wp-json/wp/v2/";
  private wpApiSettings;
  
  constructor(private http: Http) { }
  
  getPosts(): Observable<Restaurant[]> { 
      return this.http
        .get(this.postsUrl + 'posts')
        .map((res: Response) => res.json());
  
  }
}
