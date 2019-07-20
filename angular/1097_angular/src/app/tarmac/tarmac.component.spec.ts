import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { TarmacComponent } from './tarmac.component';

describe('TarmacComponent', () => {
  let component: TarmacComponent;
  let fixture: ComponentFixture<TarmacComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ TarmacComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TarmacComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
