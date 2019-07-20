import { TestBed } from '@angular/core/testing';

import { LetgyService } from './letgy.service';

describe('LetgyService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: LetgyService = TestBed.get(LetgyService);
    expect(service).toBeTruthy();
  });
});
