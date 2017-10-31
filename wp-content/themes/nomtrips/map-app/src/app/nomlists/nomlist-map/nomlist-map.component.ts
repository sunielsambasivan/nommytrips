import { Component, OnInit, Input } from '@angular/core';
import { Observable } from 'rxjs/Observable';
import { Nomlist } from '../nomlist';
import { NomlistService } from '../nomlist.service';
import { environment } from '../../../environments/environment';

@Component({
  selector: 'app-nomlist-map',
  templateUrl: './nomlist-map.component.html',
  styleUrls: ['./nomlist-map.component.css'],
  providers: [NomlistService]
})
export class NomlistMapComponent implements OnInit {

  nomlist: Nomlist[];
  @Input() cityid: any;
  public localizedObject: any;
  public env = environment;
  constructor(private nomlistService: NomlistService) { }

  getNomlist(cityid) {
    this.localizedObject = window;
    this.nomlistService
      .getNomlist(cityid, this.localizedObject)
      .subscribe(res => {
        this.nomlist = res;
        console.log(this.nomlist)
      });
  }

  ngOnInit() {
    this.getNomlist(this.cityid);
  }

}
