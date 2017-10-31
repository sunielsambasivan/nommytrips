/* tslint:disable:no-unused-variable */

import { TestBed, async, inject } from '@angular/core/testing';
import { NomlistService } from './nomlist.service';

describe('NomlistService', () => {
  beforeEach(() => {
    TestBed.configureTestingModule({
      providers: [NomlistService]
    });
  });

  it('should ...', inject([NomlistService], (service: NomlistService) => {
    expect(service).toBeTruthy();
  }));
});
