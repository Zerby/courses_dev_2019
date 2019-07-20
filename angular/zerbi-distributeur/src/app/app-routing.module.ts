import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { DistributeurComponent} from './distributeur/distributeur.component';

const routes: Routes = [
  {
    path: '',
    pathMatch: 'full',
    component: DistributeurComponent
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})

export class AppRoutingModule { }
