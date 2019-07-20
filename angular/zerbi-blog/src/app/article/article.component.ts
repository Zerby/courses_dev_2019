import { Component, OnInit } from '@angular/core';
import {Article} from '../model/article.model';
import { ActivatedRoute, Params } from '@angular/router';
import {ArticleService} from '../service/article.service';

@Component({
  selector: 'app-article',
  templateUrl: './article.component.html',
  styleUrls: ['./article.component.css']
})
export class ArticleComponent implements OnInit {
  articles: Article[];

  constructor(
    private articleService: ArticleService,
    private route: ActivatedRoute,
  ) { }

  ngOnInit() {
    this.route.params.subscribe((params: Params) => {
      if (params['id']) {
        const articleId = params['id'];
        this.deleteUnArticle(articleId);
      }
    });

    // console.log(this.articleService.getArticle().subscribe(article => this.article = article));
    this.getArticles();
  }

  getArticles() {
    return this.articleService.getArticle().subscribe(
      response => this.articles = response,
      error => console.error('Error: ' + error));
  }

  deleteUnArticle(id: number) {
    return this.articleService.deleteOneArticle(id).subscribe(
      (response) => console.log(response),
      error => console.error(error)
    );
}
}
