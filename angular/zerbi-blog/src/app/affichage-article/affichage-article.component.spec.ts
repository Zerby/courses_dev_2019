import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AffichageArticleComponent } from './affichage-article.component';

describe('AffichageArticleComponent', () => {
  let component: AffichageArticleComponent;
  let fixture: ComponentFixture<AffichageArticleComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AffichageArticleComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AffichageArticleComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
