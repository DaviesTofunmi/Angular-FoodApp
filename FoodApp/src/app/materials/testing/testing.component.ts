import { Component, inject } from '@angular/core';
import { Router } from '@angular/router';
import {MatButtonModule} from '@angular/material/button';
import {MatIconModule} from '@angular/material/icon';
import {MatDividerModule} from '@angular/material/divider';
import {ChangeDetectionStrategy, signal} from '@angular/core';
import {MatExpansionModule} from '@angular/material/expansion';
import {MatFormFieldModule} from '@angular/material/form-field';
import {MatSnackBar} from '@angular/material/snack-bar';
import { CommonModule } from '@angular/common';


@Component({
  selector: 'app-testing',
  standalone: true,
  imports: [MatButtonModule,  MatDividerModule, MatIconModule, MatExpansionModule, MatFormFieldModule, CommonModule],
  templateUrl: './testing.component.html',
  styleUrl: './testing.component.css',
  changeDetection: ChangeDetectionStrategy.OnPush,
})
export class TestingComponent {
  constructor(public router: Router,){

  }
  readonly panelOpenState = signal(false);


  public date= new Date();


  private _snackBar = inject(MatSnackBar);
  public message:string='congrats bro'
  public action: string="close"
  public amount: number= 5000
  openSnackBar() {
    this._snackBar.open(this.message, this.action);
  }
}
