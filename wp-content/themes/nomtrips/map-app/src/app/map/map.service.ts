import { Injectable } from '@angular/core';
import { enableProdMode } from '@angular/core';
import { Http, Response } from '@angular/http';

import { Observable } from 'rxjs/Observable';

import 'rxjs/add/operator/map';

import { environment } from '../../environments/environment';
import { Map } from './map';

@Injectable()
export class MapService {

  /* private postsUrl = "http://maps.googleapis.com/maps/api/js?key=AIzaSyCZ81efbEIFdgwhEpO3rShce8gtN-9ahQA"; */
  private postsUrl = "/maps/api/js?key=AIzaSyCZ81efbEIFdgwhEpO3rShce8gtN-9ahQA";

  constructor(private http: Http) { }

  mapInit(): Observable<Map[]> { 
    return this.http
      .get(this.postsUrl)
      .map((res: Response) => res.json());

  }
}
