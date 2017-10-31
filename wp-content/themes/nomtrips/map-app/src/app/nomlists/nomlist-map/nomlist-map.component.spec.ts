/* tslint:disable:no-unused-variable */
import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { By } from '@angular/platform-browser';
import { DebugElement } from '@angular/core';

import { NomlistMapComponent } from './nomlist-map.component';

describe('NomlistMapComponent', () => {
  let component: NomlistMapComponent;
  let fixture: ComponentFixture<NomlistMapComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NomlistMapComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NomlistMapComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
