import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { ReactiveFormsModule } from '@angular/forms';
import { AppComponent } from './app.component';
import { ArticleComponent } from './article/article.component';
import { AppRoutingModule } from './app-routing.module';
import {HttpClientModule} from '@angular/common/http';
import {ArticleService} from './service/article.service';
import { AffichageArticleComponent } from './affichage-article/affichage-article.component';
import { ArticleFormulaireComponent } from './article-formulaire/article-formulaire.component';

@NgModule({
  declarations: [
    AppComponent,
    ArticleComponent,
    AffichageArticleComponent,
    ArticleFormulaireComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    ReactiveFormsModule,
    HttpClientModule
  ],
  providers: [ArticleService],
  bootstrap: [AppComponent]
})
export class AppModule { }
