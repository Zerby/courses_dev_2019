import {Component, OnInit, Input, OnChanges, SimpleChanges} from '@angular/core';

@Component({
  selector: 'app-test',
  templateUrl: './test.component.html',
  styleUrls: ['./test.component.css']
})
export class TestComponent implements OnInit, OnChanges {

  @Input() list: any;
  constructor() { }

  ngOnInit() {
    console.log(this.list);
  }

  ngOnChanges(changes: SimpleChanges) {
    console.log(changes);
  }

  clickP(myEvent) {
    console.log(myEvent);
  }

}
