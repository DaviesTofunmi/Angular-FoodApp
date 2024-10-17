import { CommonModule } from '@angular/common';
import { HttpClient, HttpClientModule, HttpHeaders } from '@angular/common/http';
import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { NavComponent } from '../nav/nav.component';
import { CartCardComponent } from "../cart-card/cart-card.component";

@Component({
  selector: 'app-cart',
  standalone: true,
  imports: [CommonModule, NavComponent, HttpClientModule, CartCardComponent],
  templateUrl: './cart.component.html',
  styleUrl: './cart.component.css' 
})
export class CartComponent {
  constructor(public router: Router, public http: HttpClient){}
public Cart:any;

public derivedData: any;
public dataObj:any
public totalPrice: number = 0;
public totalAmount: number= 0;
public items: number=0;
public loading: string= 'Loading...';
public currUser= JSON.parse(localStorage.getItem('myEmail')!)


  
ngOnInit(){

  const formData = new FormData();
  formData.append('User', this.currUser);
  this.http.post('http://localhost:8000/firstApp/components/cart.php', formData).subscribe((info:any)=>{
   
   
    console.log(info);
    if(info){
      this.derivedData=info
     
      
   
      for (let i = 0; i < this.derivedData.length; i++) {
        this.totalPrice += parseFloat(this.derivedData[i].product_price) * parseInt(this.derivedData[i].quantity);
        this.items += parseInt(this.derivedData[i].quantity);
      }

      console.log('Total Price:', this.totalPrice);
      this.totalAmount= this.totalPrice + 5
      

  
   

     
    }
    else{
     console.error('Error fetching user data:',);
    }
     
     
 
 
   })





  











//   this.http.get('http://localhost:8000/firstApp/components/cart.php', {
     
//   }).subscribe((infoo:any)=>{
//     if(infoo){
//       this.derivedData=infoo
   
//       for (let i = 0; i < this.derivedData.length; i++) {
//         this.totalPrice += parseFloat(this.derivedData[i].product_price) * parseInt(this.derivedData[i].quantity);
//         this.items += parseInt(this.derivedData[i].quantity);
//       }

//       console.log('Total Price:', this.totalPrice);
//       this.totalAmount= this.totalPrice + 5
      

  
   

     
//     }
//     else{
//      console.error('Error fetching user data:',);
//     }
 
//  });
}







public checkOut(){
  const data = {
       
    User: this.currUser,
    Amount: this.totalAmount
};
  
  this.http.post('http://localhost:8000/firstApp/components/curlPayStack.php', data, ).subscribe((info:any)=>{
   
   
    console.log(info);
    if(info){
     window.open(info)
    }
    else{
     console.error('Error fetching link:',);
    }
     
     
 
 
   })
   this.http.post('http://localhost:8000/firstApp/components/clearCart.php', data, ).subscribe((res:any)=>{
   
   
    console.log(res);
    if(res){
    console.log(res.message);
    
    }
    else{
     console.error('Error fetching Cart:',);
    }
     
     
 
 
   })

}







}
