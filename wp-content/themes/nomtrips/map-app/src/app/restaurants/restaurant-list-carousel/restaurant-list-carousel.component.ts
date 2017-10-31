import { Component, OnInit, Input } from '@angular/core';
import { Observable } from 'rxjs/Observable';
import { Restaurant } from '../restaurant';
import { Nomlist } from '../../nomlists/nomlist';
import { RestaurantsService } from '../restaurants.service';
import { NomlistService } from '../../nomlists/nomlist.service';
import * as _ from "lodash";

@Component({
  selector: 'app-restaurant-list-carousel',
  templateUrl: './restaurant-list-carousel.component.html',
  styleUrls: ['./restaurant-list-carousel.component.css'],
  providers: [RestaurantsService, NomlistService]
})
export class RestaurantListCarouselComponent implements OnInit {
  
  restaurants: Restaurant[];
  nomlist: Nomlist[];  
  nomlistRestaurants: any;
  restaurantAdded: any;
  restaurantClicked = false;
  addedMessage: string;

  @Input() cityid: any;
  public localizedObject: any;
  constructor(private restaurantsService: RestaurantsService, private nomlistService: NomlistService) { }

  getPosts(cityId){
    //console.log(cityId);
    this.restaurantsService
      .getPosts(cityId)
      .subscribe(res => {
        this.restaurants = res;
      });
  }

  getNomlist(cityid) {
    this.localizedObject = window;
    this.nomlistService
      .getNomlist(cityid, this.localizedObject)
      .subscribe((res) => {
        this.nomlist = res;
        //console.log(this.nomlist);
        this.getNomlistRestaurants(this.nomlist, cityid, this.localizedObject);
      });
  }


  getNomlistRestaurants(nomlist, cityid, localizedObject) {
    this.nomlistService
      .getNomlistRestaurants(nomlist.nomlist_id, cityid, localizedObject)
        .subscribe(res => {
          this.nomlistRestaurants = res.restaurant_list;
          for (var i = 0, aLen = this.nomlistRestaurants .length; i < aLen; i++) {
            for (var q = 0, bLen = this.restaurants .length; q < bLen; q++) {
              if(this.restaurants[q].restaurant_id == this.nomlistRestaurants[i].restaurant_id){
                this.restaurants[q].onNomList = true;
              }              
            }
          }
          console.log(this.restaurants);
      });    
  }

  addRestaurant(restaurant) {
    this.localizedObject = window;    
    this.restaurantsService
      .addRestaurantToNomlist(restaurant.restaurant_location.city.term_id, restaurant.restaurant_id, this.localizedObject)
      .subscribe(res => {
        this.restaurantAdded = res;
        this.addedMessage = this.restaurantAdded.message;
        this.restaurantClicked = true;        
        setTimeout(() => {
          //display message when ad rest to nomlist clicked
          this.restaurantClicked = false;
          console.log(this.addedMessage);
        }, 1500);
      });
  }

  ngOnInit() {    
    this.restaurantAdded = "";
    this.getPosts(this.cityid);
    this.getNomlist(this.cityid);
  }

  /** 
   * uses slick for ng4 https://github.com/devmark/ngx-slick 
   **/
  slideConfig = {
    dots: true,
    infinite: false,
    speed: 300,
    mobileFirst: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 640,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          dots: true
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          dots: true
        }
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
          dots: true
        }
      },
      {
        breakpoint: 1366,
        settings: {
          slidesToShow: 6,
          slidesToScroll: 1,
          dots: true
        }
      }      
    ]
  };  

  afterChange(e) {
    console.log('afterChange');
  }

}
