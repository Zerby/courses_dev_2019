import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { DistributeurComponent } from './distributeur.component';

describe('DistributeurComponent', () => {
  let component: DistributeurComponent;
  let fixture: ComponentFixture<DistributeurComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ DistributeurComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DistributeurComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
