import { Component, OnInit } from '@angular/core';
import { LetgyService } from '../services/letgy.service';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';
import {Time} from '@angular/common';

@Component({
  selector: 'app-ajout',
  templateUrl: './ajout.component.html',
  styleUrls: ['./ajout.component.scss']
})
export class AjoutComponent implements OnInit {

  formElements: any = {
    type: [null, [Validators.required, Validators.minLength(2), Validators.maxLength(10)]],
    flightNumber: [null, [Validators.required, Validators.minLength(4), Validators.maxLength(8)]],
    from: [null, [Validators.required, Validators.minLength(3), Validators.maxLength(4)]],
    // J'ai mis 8 caractères obligatoires, sinon la requete API ne fonctionne pas
    hourStart: [null, [Validators.required, Validators.minLength(8), Validators.maxLength(8)]],
    passengerCount: [null, [Validators.required]],
    suitcaseCount: [null, [Validators.required]]
  };

  formGroup: FormGroup;

  constructor(
    private fb: FormBuilder,
    private api: LetgyService
  ) {
  }

  ngOnInit(): void {
    this.formGroup = this.fb.group(this.formElements);
  }

  submit() {
    const val = Object.assign(this.formGroup.value);
    return this.api.postLetgy(val).subscribe(
      (res) => console.log(res),
      error => console.error(error)
    );
  }
}
