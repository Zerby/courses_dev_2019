import {Component, OnDestroy, OnInit} from '@angular/core';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit, OnDestroy {
  title: string = 'toto';
  myNumber: number;
  myBool: boolean = false;
  myArray: any = [
    {
      title : 'test',
      nombre : 5
    },
    {
      title : 'encore un',
      nombre : 10
    }
  ];

  myDate: string = '2018-09-19 16:39:00';
  myCurrency: number = 5.5;

  constructor() {}

  ngOnInit() {

    let myVariable = null;
    myVariable = 5;

    this.title = 'lalala';
    setTimeout(() => {
      this.title = 'tit';
      this.myArray = null;
    }, 5000);
  }

  ngOnDestroy() {}
}
