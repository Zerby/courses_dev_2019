import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class CommentService {
  apiUrl = 'https://jsonplaceholder.typicode.com/comments?postId=';

  constructor(private http: HttpClient) { }

  getComments(id: number) {
    return this.http.get<Comment>(this.apiUrl + id);
  }

}
