/* tslint:disable:no-unused-variable */
import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { By } from '@angular/platform-browser';
import { DebugElement } from '@angular/core';

import { NomlistCityComponent } from './nomlist-city.component';

describe('NomlistCityComponent', () => {
  let component: NomlistCityComponent;
  let fixture: ComponentFixture<NomlistCityComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NomlistCityComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NomlistCityComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
