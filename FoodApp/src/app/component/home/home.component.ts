import { CommonModule } from '@angular/common';
import { Component, NgModule, OnInit } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Router } from '@angular/router';
import { SwitchComponent } from '../switch/switch.component';
import { FoodCardComponent } from '../food-card/food-card.component';
import { HttpClient, HttpClientModule } from '@angular/common/http';
import { NavComponent } from '../nav/nav.component';

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [CommonModule, FormsModule, SwitchComponent, FoodCardComponent,NavComponent, HttpClientModule ],
  templateUrl: './home.component.html',
  styleUrl: './home.component.css'
})
export class HomeComponent   {
  constructor(public router: Router, public http: HttpClient){}
  public currToken= JSON.parse(localStorage.getItem('myToken')!)
  public currUser= JSON.parse(localStorage.getItem('myEmail')!)
  public loggedInUser:any={}

  ngOnInit(){
    if(this.currToken){
      console.log(this.currToken);
// console.log(this.currUser);

    
      
      

    }
    const data = {
       
      User: this.currUser
   
  };


  this.http.post('http://localhost:8000/firstApp/components/newProfile.php', data).subscribe((response:any)=>{

    console.log(response);

  }, error=>{
    console.log(error);
    
  });


 


  }
  
}
