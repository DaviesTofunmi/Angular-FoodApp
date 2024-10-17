import { CommonModule } from '@angular/common';
import { HttpClient } from '@angular/common/http';
import { Component } from '@angular/core';

@Component({
  selector: 'app-cart-card',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './cart-card.component.html',
  styleUrl: './cart-card.component.css'
})
export class CartCardComponent {
  constructor( public http: HttpClient){} 
  public myFoodItems: any[] = [];
  public derivedData: any;
  public quantity: number= 1
  public currUser= JSON.parse(localStorage.getItem('myEmail')!)
  ngOnInit(){
    const formData = new FormData();
  formData.append('User', this.currUser);
  this.http.post('http://localhost:8000/firstApp/components/cart.php', formData).subscribe((info:any)=>{
   
   
    console.log(info);
    if(info){
      this.derivedData=info
    
      
   
    
      

  
   

     
    }
    else{
     console.error('Error fetching user data:',);
    }
     
     
 
 
   })
  // this.fetchOneUser();
    // console.log(this.myFoodItems);
   
  }

  public increaseQuantity(i: number){
  
    const formData = new FormData();
    formData.append('name', this.derivedData[i].product_name);
    formData.append('quantity', this.derivedData[i].quantity);
  this.http.post('http://localhost:8000/firstApp/components/increaseQuantity.php', formData).subscribe((info:any)=>{
   
    this.derivedData= info
   console.log(info.message);
   location.reload()
   
    
    


  })

  }

  public decreaseQuantity(i: number){
    const formData = new FormData();
    formData.append('name', this.derivedData[i].product_name);
    formData.append('quantity', this.derivedData[i].quantity);
  this.http.post('http://localhost:8000/firstApp/components/decreaseQuantity.php', formData).subscribe((info:any)=>{
   
    this.derivedData= info
   console.log(info.message);
   
    
    location.reload();


  })
  }


  public deleteItem(i: number){
    console.log(this.derivedData[i].product_id);
  
    const formData = new FormData();
    formData.append('product_id', this.derivedData[i].product_id);
  




  this.http.post('http://localhost:8000/firstApp/components/deleteItem.php', formData).subscribe((info:any)=>{
   
    this.derivedData= info
    
   console.log(info.message);
     
    
    


  })


  location.reload();
  }

}
