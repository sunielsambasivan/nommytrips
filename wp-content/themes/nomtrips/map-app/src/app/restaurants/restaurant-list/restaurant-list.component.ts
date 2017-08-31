import { Component, OnInit } from '@angular/core';
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

  constructor(private restaurantsService: RestaurantsService) { }

  getPosts(){
    this.restaurantsService
      .getPosts()
      .subscribe(res => {
        this.restaurants = res;
      });
  }

  ngOnInit() {
    this.getPosts();
  }

}
