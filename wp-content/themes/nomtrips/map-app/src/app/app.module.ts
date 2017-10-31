import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';

import { AppComponent } from './app.component';
import { NguiMapModule} from '@ngui/map';
import { SlickModule } from 'ngx-slick';
import { PostListComponent } from './posts/post-list/post-list.component';
import { RestaurantListComponent } from './restaurants/restaurant-list/restaurant-list.component';
import { RestaurantListCarouselComponent } from './restaurants/restaurant-list-carousel/restaurant-list-carousel.component';
import { MapCityComponent } from './map/map-city/map-city.component';
import { NomlistCityComponent } from './nomlists/nomlist-city/nomlist-city.component';
import { NomlistMapComponent } from './nomlists/nomlist-map/nomlist-map.component';

@NgModule({
  declarations: [
    AppComponent,
    PostListComponent,
    RestaurantListComponent,
    RestaurantListCarouselComponent,
    MapCityComponent,
    NomlistCityComponent,
    NomlistMapComponent
  ],
  imports: [
    BrowserModule,
    FormsModule,
    HttpModule,
    NguiMapModule.forRoot({apiUrl: 'https://maps.google.com/maps/api/js?key=AIzaSyCZ81efbEIFdgwhEpO3rShce8gtN-9ahQA'}),
    SlickModule.forRoot()
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
