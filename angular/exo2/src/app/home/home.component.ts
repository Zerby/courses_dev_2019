import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {


  players: any = [
    {
      id: 1,
      nom: 'Joueur 1',
      couleur: 'red',
      force: '55',
      vie: '80'
    },
    {
      id: 2,
      nom: 'Joueur 2',
      couleur: 'blue',
      force: '75',
      vie: '45'
    },
  ];
  constructor() { }

  ngOnInit() {
  }

}
