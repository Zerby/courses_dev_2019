import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Params } from '@angular/router';
import {ArticleService} from '../service/article.service';
import {CommentService} from '../service/comments.service';
import {Article} from '../model/article.model';
import {Router} from '@angular/router';

@Component({
  selector: 'app-affichage-article',
  templateUrl: './affichage-article.component.html',
  styleUrls: ['./affichage-article.component.css']
})
export class AffichageArticleComponent implements OnInit {
  article: Article;
  comments: Comment;

  constructor(
    private route: ActivatedRoute,
    private articleService: ArticleService,
    private commentService: CommentService,
    private router: Router
  ) { }

  ngOnInit() {
    this.route.params.subscribe((params: Params) => {
      // console.log(params['id']);
      if (params['id']) {
        const articleId = params['id'];
        this.getUnArticle(articleId);
        this.getCommentaire(articleId);
      } else {
        console.log('Il n\'y a pas d\'id');
        this.router.navigate(['']);
      }
    });

  }

  getUnArticle(id: number) {
    return this.articleService.getOneArticle(id).subscribe(
      response => this.article = response,
      error => console.error('Error: ' + error));
  }

  getCommentaire(id: number) {
    return this.commentService.getComments(id).subscribe(
      response => this.comments = response,
      error => console.error('Error: ' + error));
  }

}
