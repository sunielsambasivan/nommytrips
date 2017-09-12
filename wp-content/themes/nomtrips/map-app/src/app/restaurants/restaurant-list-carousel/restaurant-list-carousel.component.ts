import { Component, OnInit, Input } from '@angular/core';
import { Restaurant } from '../restaurant';
import { RestaurantsService } from '../restaurants.service';

@Component({
  selector: 'app-restaurant-list-carousel',
  templateUrl: './restaurant-list-carousel.component.html',
  styleUrls: ['./restaurant-list-carousel.component.css'],
  providers: [RestaurantsService]
})
export class RestaurantListCarouselComponent implements OnInit {
  
  restaurants: Restaurant[];
  @Input() cityid: any;

  constructor(private restaurantsService: RestaurantsService) { }

  getPosts(cityId){
    //console.log(cityId);
    this.restaurantsService
      .getPosts(cityId)
      .subscribe(res => {
        this.restaurants = res;
      });
  }

  ngOnInit() {    
    this.getPosts(this.cityid);
  }

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
