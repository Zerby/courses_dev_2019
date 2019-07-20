import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class GiphyApiService {

  constructor(
    private httpClient: HttpClient
  ) {}

    getGiphy(search) {
      return this.httpClient.get('https://api.giphy.com/v1/gifs/search?api_key=bC1MnKtHhmnX34Kqz375kSozfxsosube&q=' + search + '&limit=10&offset=0&rating=G&lang=fr');
    }
  }

