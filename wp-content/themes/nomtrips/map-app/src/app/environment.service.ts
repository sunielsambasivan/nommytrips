import { Injectable } from '@angular/core';
import { environment } from '../environments/environment';

@Injectable()
export class EnvironmentService {

  constructor() { }

  setLocalizedObject(window) {
    environment.localized_access_token =  window.localized_access_token;
  }

  init() {
    this.setLocalizedObject(environment.dom.window);
  }

}
