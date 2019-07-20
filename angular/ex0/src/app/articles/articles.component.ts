import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-articles',
  templateUrl: './articles.component.html',
  styleUrls: ['./articles.component.scss']
})
export class ArticlesComponent implements OnInit {

  constructor() { }

  articles: any = [
    {
      id: 1,
      title: 'Article de test',
      date: '2018',
      new: false
    },
    {
      id: 35,
      title: 'Nouvel article',
      date: '2019',
      new: true
    }
]
  ngOnInit() {
  }

}
