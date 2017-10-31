import { Component, OnInit, Input } from '@angular/core';
import { Map } from '../map';
import { Restaurant } from '../../restaurants/restaurant';
import { MapService } from '../map.service';
import { RestaurantsService } from '../../restaurants/restaurants.service';
import { environment } from '../../../environments/environment';

@Component({
  selector: 'app-map-city',
  templateUrl: './map-city.component.html',
  styleUrls: ['./map-city.component.css'],
  providers: [MapService, RestaurantsService]
})
export class MapCityComponent implements OnInit {

  map: Map[];
  restaurants: Restaurant[];
  @Input() cityid: any;
  positions = [];
  path = environment.baseUrl;

  constructor( private mapService: MapService, private restaurantService: RestaurantsService ) {}

  mapInit() {
    this.mapService
      .mapInit()
      .subscribe( res => {
        this.map = res
      });      
  }

  getPosts(cityId){
    //console.log(cityId);
    this.restaurantService
      .getPosts(cityId)
      .subscribe(res => {
        this.restaurants = res;
        this.restaurants.forEach((rest)=>{
          this.positions.push([rest.latitude, rest.longitude]);
        });
      });
  }

  ngOnInit() {
    //this.mapInit();
    this.getPosts(this.cityid);
  }

}
