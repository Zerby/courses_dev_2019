import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ApiPostService {

  apiUrl = 'https://api.letgy.com/1.0/distrib/buy';

  constructor(private http: HttpClient) { }

  create(data) {
    return this.http.post(this.apiUrl, data);
  }
}
