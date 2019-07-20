import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ArticleFormulaireComponent } from './article-formulaire.component';

describe('ArticleFormulaireComponent', () => {
  let component: ArticleFormulaireComponent;
  let fixture: ComponentFixture<ArticleFormulaireComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ArticleFormulaireComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ArticleFormulaireComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
