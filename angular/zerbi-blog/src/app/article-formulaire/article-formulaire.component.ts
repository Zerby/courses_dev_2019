import { Component, OnInit } from '@angular/core';
import {FormGroup, FormBuilder, Validators} from '@angular/forms';
import { ActivatedRoute, Params } from '@angular/router';
import {ArticleService} from '../service/article.service';
import {Article} from '../model/article.model';

@Component({
  selector: 'app-article-formulaire',
  templateUrl: './article-formulaire.component.html',
  styleUrls: ['./article-formulaire.component.css']
})
export class ArticleFormulaireComponent implements OnInit {

  articleId: number = null;
  article: Article = null;

  registerForm: FormGroup;
  submitted = false;

  constructor(
    private formBuilder: FormBuilder,
    private articleService: ArticleService,
    private route: ActivatedRoute
    ) { }

  ngOnInit() {
    this.registerForm = this.formBuilder.group({
      title: ['', [Validators.required]],
      body: ['', [Validators.required]]
    });

    this.route.params.subscribe((params: Params) => {
      if (params['id']) {
        this.articleId = params['id'];
        this.getUnArticle(this.articleId);
      }
    });

  }

  getUnArticle(id: number) {
    return this.articleService.getOneArticle(id).subscribe(
      (response: any) => {
        this.article = response;
        this.registerForm.controls['title'].setValue(this.article.title);
        this.registerForm.controls['body'].setValue(this.article.body);
    },
      error => console.error('Error: ' + error));
  }

  get f() { return this.registerForm.controls; }

  onSubmit() {

    if (this.registerForm.invalid) {
      console.log('Invalide formulaire');
    } else if (this.articleId) {
      return this.articleService.updateArticle(this.articleId, this.registerForm.value).subscribe(
        (response) => console.log(response),
        error => console.error(error)
      );
    } else {
      return this.articleService.createArticle(this.registerForm.value).subscribe(
        (response) => console.log(response),
        error => console.error(error)
      );
    }

  }
}

