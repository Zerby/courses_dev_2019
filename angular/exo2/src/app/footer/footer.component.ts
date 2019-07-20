import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.scss']
})
export class FooterComponent implements OnInit {

  players: any = [
    {
      id: 3,
      nom: 'Joueur 3',
      couleur: 'yellow',
      force: '25',
      vie: '120'
    },
    {
      id: 4,
      nom: 'Joueur 4',
      couleur: 'pink',
      force: '65',
      vie: '35'
    },
  ];
  constructor() { }

  ngOnInit() {
  }

}
