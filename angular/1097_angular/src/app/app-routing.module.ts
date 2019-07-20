import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { DetailComponent } from './detail/detail.component';
import { TarmacComponent } from './tarmac/tarmac.component';
import { AjoutComponent } from './ajout/ajout.component';

const routes: Routes = [
  { path: '',
    pathMatch: 'full',
    component: TarmacComponent
  },
  { path: 'ajout',
    component: AjoutComponent
  },
  { path: 'detail/:id',
    component: DetailComponent
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
