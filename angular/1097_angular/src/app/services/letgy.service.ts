import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class LetgyService {

  constructor(
    private http: HttpClient
  ) {}

  getLetgyTarmac() {
    return this.http.get('https://api.letgy.com/1.0/adp/tarmac');
  }

  getLetgyDetail(id) {
    return this.http.get('https://api.letgy.com/1.0/adp/avions/avion/' + id);
  }

  postLetgy(data) {
    return this.http.post('https://api.letgy.com/1.0/adp/avions', data);
  }

}
