/* tslint:disable:no-unused-variable */

import { TestBed, async, inject } from '@angular/core/testing';
import { RestaurantsService } from './restaurants.service';

describe('RestaurantsService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [RestaurantsService]
    });
  });

  it('should ...', inject([RestaurantsService], (service: RestaurantsService) => {
    expect(service).toBeTruthy();
  }));
});
