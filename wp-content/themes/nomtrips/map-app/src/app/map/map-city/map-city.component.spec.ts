/* tslint:disable:no-unused-variable */
import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { By } from '@angular/platform-browser';
import { DebugElement } from '@angular/core';

import { MapCityComponent } from './map-city.component';

describe('MapCityComponent', () => {
  let component: MapCityComponent;
  let fixture: ComponentFixture<MapCityComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MapCityComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MapCityComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
