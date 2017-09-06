import { Component, OnInit } from '@angular/core';
import { Map } from '../map';
import { MapService } from '../map.service';

@Component({
  selector: 'app-map-city',
  templateUrl: './map-city.component.html',
  styleUrls: ['./map-city.component.css'],
  providers: [MapService]
})
export class MapCityComponent implements OnInit {

  map: Map[];

  constructor( private mapService: MapService ) {}

  mapInit() {
    this.mapService
      .mapInit()
      .subscribe( res => {
        this.map = res
      });
      
  }

  ngOnInit() {
    this.mapInit();
  }

}
