import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import { Nomlist } from './nomlist';
import { environment } from '../../environments/environment';
import { Restaurant } from '../restaurants/restaurant';
import 'rxjs/add/operator/map';

@Injectable()
export class NomlistService {
  
  /** example endpoint for getting nomlist
   * /wp-json/nomtrips/nomlist/city/4/user/2/get/access_token=abc123def456
  **/
  private getNomlistStartUrl = environment.baseUrl + "wp-json/nomtrips/nomlist/city";
  private getRestaurantsInNomlistStart = environment.baseUrl + "wp-json/nomtrips/nomlist/nomlistid";
  public dom = environment.dom.window;
  constructor(private http: Http) { }

  /**
   * get nomlist object to get the nomlist id
   * @param cityId 
   * @param localizedObject 
   */
  getNomlist(cityId, localizedObject?): Observable<Nomlist[]> {
    localizedObject = localizedObject ? localizedObject : this.dom;
    return this.http
    .get(this.getNomlistStartUrl + '/' + cityId + '/user/' + localizedObject.localized_access_token.user_id + '/get/access_token=' + localizedObject.localized_access_token.access_token)
    .map((res: Response) => res.json());
  }
  
  /**
   * get nomlist object to get the nomlist id
   * @param nomlistid
   * @param cityid
   * @param localizedObject 
   */
  getNomlistRestaurants(nomlistid, cityid, localizedObject?): Observable<any> {
    localizedObject = localizedObject ? localizedObject : this.dom;
    return this.http
      .get(this.getRestaurantsInNomlistStart + '/' + nomlistid + '/city/' + localizedObject.localized_access_token.city.term_id + '/user/' + localizedObject.localized_access_token.user_id + '/get/access_token=' + localizedObject.localized_access_token.access_token)
      .map((res: Response) => res.json());
  }
}