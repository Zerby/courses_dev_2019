import { Component, OnInit } from '@angular/core';
import { LetgyService } from '../services/letgy.service';

@Component({
  selector: 'app-tarmac',
  templateUrl: './tarmac.component.html',
  styleUrls: ['./tarmac.component.scss']
})

export class TarmacComponent implements OnInit {

  tabs: Array<any> = null;

  constructor(
    private api: LetgyService
  ) {
  }

  ngOnInit(): void {
    this.getApiTarmac();
    console.log(this.tabs);
  }

  getApiTarmac() {

    this.api.getLetgyTarmac().subscribe((res: any) => {
        console.log(res);
        this.tabs = res;
      },
      (err: any) => {
        console.error(err);
      });
  }
}
