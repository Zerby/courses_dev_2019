import { RouterModule, Routes } from "@angular/router";

import { ArticleComponent } from "./article/article.component";
import { ArticlesComponent } from "./articles/articles.component";
import { HomeComponent } from "./home/home.component";
import { NgModule } from "@angular/core";

const routes: Routes = [
  {
    path: "",
    pathMatch: "full",
    component: HomeComponent
  },
  {
    path: "articles",
    children: [
      {
        path: "",
        pathMatch: "full",
        component: ArticlesComponent
      },
      {
        path: "article",
        children: [
          {
            path: "add",
            component: ArticleComponent
          },
          {
            path: ":id",
            component: ArticleComponent
          }
        ]
      }
    ]
  }
];
@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule {}
