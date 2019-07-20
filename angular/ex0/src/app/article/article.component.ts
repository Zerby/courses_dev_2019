import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-article',
  templateUrl: './article.component.html',
  styleUrls: ['./article.component.scss']
})
export class ArticleComponent implements OnInit {

  articleId: number = null;
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
    this.route.params.suscribe((params: Params)=>{
      if(params['id']) {
        this.articleId = parseInt(params["id"], 10);

      }
    })
  }

}
