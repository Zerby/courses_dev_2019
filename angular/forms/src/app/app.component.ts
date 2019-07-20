import {Component, OnInit} from '@angular/core';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit {

  formElements: any = {
    firstname: [null, [Validators.required, Validators.minLength(2)]],
    nbPerson: [1, [Validators.required, Validators.min(1), Validators.max(4)]],
  };

  formGroup: FormGroup;

  constructor(
    private fb: FormBuilder
  ) {
  }

  ngOnInit(): void {
    this.formGroup = this.fb.group(this.formElements);

    // modifier valeur
    this.formGroup.patchValue({
      firstname: 'toto'
    });

    // remise à zéro
    this.formGroup.reset();

    // enlève tous les validators
    this.formGroup.controls.firstname.clearValidators();

    // modifier validators d'un control
    this.formGroup.controls.firstname.setValidators([Validators.required]);

    // update valeurs coté front
    this.formGroup.controls.firstname.updateValueAndValidity();

    // Changement de valeur du form
    this.formGroup.valueChanges.subscribe((res: any) => {
      console.log(res);
    });

    // Changement de valeur d'un champ
    this.formGroup.valueChanges.firstname.subscribe((res: any) => {
      console.log(res);
    });
  }

  submit() {
    console.log(this.formGroup.value);
  }
}
