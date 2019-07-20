import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormGroup, Validators} from '@angular/forms';
import {GiphyApiService} from './service/giphy-api.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent implements OnInit {

  formElements: any = {
    search: [null, [Validators.required, Validators.minLength(2)]],
  };

  formGroup: FormGroup;

  tabs: Array<any> = null;

constructor(
    private fb: FormBuilder,
    private api: GiphyApiService
  ) {
  }

ngOnInit(): void {
    this.formGroup = this.fb.group(this.formElements);
  }

submit() {
    this.api.getGiphy(this.formGroup.value.search).subscribe((res: any) => {
        console.log(res);
        this.tabs = res.data;
      },
      (err: any) => {
        console.error(err);
      });
  }

}
