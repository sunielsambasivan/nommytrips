import { Injectable } from '@angular/core';
import { enableProdMode } from '@angular/core';
import { Http, Response } from '@angular/http';

import { Observable } from 'rxjs/Observable';

import 'rxjs/add/operator/map';

import { environment } from '../../environments/environment';
import { Restaurant } from './restaurant';

@Injectable()
export class RestaurantsService {

  /* 
    * registered endpoints 
  */

  //get all restuarants for a city
  private postsUrl = environment.baseUrl + "wp-json/restaurant-api/restaurant-list/city";
  
  //add restaurant to a users nomlist
  private addRestaurantToNomlistUrl = environment.baseUrl + "wp-json/nomtrips/nomlist/city";
  
  //Php available vars (if needed)
  private wpApiSettings;
  
  constructor(private http: Http) { }
  
  getPosts(cityId): Observable<Restaurant[]> { 
      return this.http
        .get(this.postsUrl + '/' + cityId)
        .map((res: Response) => res.json());
  
  }

  addRestaurantToNomlist(cityId, restId, localizedObject): Observable<Restaurant[]> {
    return this.http
      .put(this.addRestaurantToNomlistUrl + '/' + cityId + '/user/' + localizedObject.localized_access_token.user_id + '/restaurant/' + restId + '/add/access_token=' + localizedObject.localized_access_token.access_token, JSON.stringify(restId))
      .map((res: Response) => res.json());
  }
}
