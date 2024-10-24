import { Component } from '@angular/core';
import { Router } from '@angular/router';

import {MatButtonModule} from '@angular/material/button'
import {MatIconModule} from '@angular/material/icon';



@Component({
  selector: 'app-nav',
  standalone: true,
  imports: [ MatButtonModule, MatIconModule],
  templateUrl: './nav.component.html',
  styleUrl: './nav.component.css'
})
export class NavComponent {

  counter?:number;
  constructor(public router: Router,){
  
  }
  public date= new Date().getDay();

  public goToCart(){
    this.router.navigate(['cart'])
  }




}
