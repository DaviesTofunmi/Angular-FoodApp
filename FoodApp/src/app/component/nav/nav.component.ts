import { Component } from '@angular/core';
import { Router } from '@angular/router';


@Component({
  selector: 'app-nav',
  standalone: true,
  imports: [],
  templateUrl: './nav.component.html',
  styleUrl: './nav.component.css'
})
export class NavComponent {

  counter?:number;
  constructor(public router: Router,){
  
  }
  public date= new Date().getDay();




}
