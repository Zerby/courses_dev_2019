import { Component } from '@angular/core';
import {DistribService} from './service/distrib.service';
import {any} from 'codelyzer/util/function';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  amount = 0;

  productSelected: number = null;

  showInfo = false;

  firstname: string = null;
  lastname: string = null;
  address: string = null;

  products: any = [
    {id: 1, name : 'Iphone XS', price: 2520},
    {id: 2, name : 'Imac 2018', price: 3652},
    {id: 3, name : 'Casque beats', price: 1296},
    {id: 4, name : 'Ipad 10', price: 210},
    {id: 5, name : 'Apple TV', price: 845},
    {id: 6, name : 'Mac mini', price: 1815},
    {id: 7, name : 'Ipod', price: 50},
    {id: 8, name : 'Apple watch', price: 1530},
  ];

  constructor(
    private distribService: DistribService
  ) {

  }

  addPiece(piece) {
    this.amount += piece;
  }

  buy() {
    if (this.productSelected == null) {
      alert('Veuillez sélectionner un produit !');
      return;
    }
    const product = this.products.find(pr => pr.id === this.productSelected);

    if (this.amount < product.price) {
      console.log(this.amount, product.price);
      alert('Veuillez ajouter de l\'argent !');
      return;
    } else if (this.amount > product.price) {
      alert('Veuillez faire l\'apoint');
      return;
    }

    alert(product.name + ' a bien été choisi');
    this.showInfo = true;
  }

  submitInfo() {
    if (this.firstname.length < 2) {
      alert('prénom trop court !');
    } else if (this.lastname.length < 2) {
      alert('nom trop court !');
    } else if (this.address.length < 10) {
      alert('adresse trop courte !');
    } else {
      this.distribService.buy({
        idProduct: this.productSelected,
        amount: Math.round(this.amount * 100) / 10000,
        firstname: this.firstname,
        lastname: this.lastname,
        address: this.address
      }).subscribe((res: any) => {
        console.log(res);
      },
      (err: any) => {
        console.error(err);
      });
    }
  }
}
