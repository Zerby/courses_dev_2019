import { Injectable } from '@angular/core';
import {HttpClient, HttpHeaders} from '@angular/common/http';
import {Article} from '../model/article.model';

@Injectable({
  providedIn: 'root'
})

export class ArticleService {
  apiUrl = 'https://jsonplaceholder.typicode.com/posts';

  constructor(private http: HttpClient) { }

  // permet de faire l'update sans être bloqué par le navigateur
   httpOptions = {
    headers: new HttpHeaders({
      'Content-Type':  'application/json',
      'Authorization': 'my-auth-token'
    })
  };

    getArticle () {
      return this.http.get<Article[]>(this.apiUrl);
    }

    getOneArticle(id: number) {
      return this.http.get<Article>(this.apiUrl + '/' + id);
    }

    createArticle(data) {
      return this.http.post(this.apiUrl, data);
    }

    updateArticle(id, data) {
    return this.http.put(this.apiUrl + '/' + id, data, this.httpOptions);
    }

    // Le delete fonctionne bien mais il est très long à s'afficher
    deleteOneArticle(id: number) {
    return this.http.delete<Article>(this.apiUrl + '/' + id);
    }
}
