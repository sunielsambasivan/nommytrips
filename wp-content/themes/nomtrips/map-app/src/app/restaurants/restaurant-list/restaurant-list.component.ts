import { Component, OnInit, Input } from '@angular/core';
import { Restaurant } from '../restaurant';
import { RestaurantsService } from '../restaurants.service';

@Component({
  selector: 'app-restaurant-list',
  templateUrl: './restaurant-list.component.html',
  styleUrls: ['./restaurant-list.component.css'],
  providers: [RestaurantsService]
})
export class RestaurantListComponent implements OnInit {

  restaurants: Restaurant[];
  @Input() cityid: any;

  constructor(private restaurantsService: RestaurantsService) { }

  getPosts(cityId){
    console.log(cityId);
    this.restaurantsService
      .getPosts(cityId)
      .subscribe(res => {
        this.restaurants = res;
      });
  }

  ngOnInit() {    
    this.getPosts(this.cityid);
  }

}