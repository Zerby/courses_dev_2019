import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Params } from '@angular/router';
import { LetgyService } from '../services/letgy.service';

@Component({
  selector: 'app-detail',
  templateUrl: './detail.component.html',
  styleUrls: ['./detail.component.scss']
})
export class DetailComponent implements OnInit {

  tabDetail: [any] = null;
  avionId: number = null;

  constructor(
    private route: ActivatedRoute,
    private api: LetgyService
  ) {
  }


  ngOnInit() {
    this.route.params.subscribe((params: Params) => {
      if (params['id']) {
        this.avionId = params['id'];
        this.getApiDetail();
      }
    });
  }

  getApiDetail() {

    this.api.getLetgyDetail(this.avionId).subscribe((res: any) => {
        console.log(res);
        this.tabDetail = res;
      },
      (err: any) => {
        console.error(err);
      });
  }


}
