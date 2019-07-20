import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {ArticleComponent} from './article/article.component';
import {AffichageArticleComponent} from './affichage-article/affichage-article.component';
import {ArticleFormulaireComponent} from './article-formulaire/article-formulaire.component';

const routes: Routes = [
  {
    path: '',
    pathMatch: 'full',
    component: ArticleComponent
  },
  {
    path: 'resume/:id',
    component: AffichageArticleComponent
  },
  {
    path: 'create',
    component: ArticleFormulaireComponent
  },
  {
    path: 'modif/:id',
    component: ArticleFormulaireComponent
  }
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
