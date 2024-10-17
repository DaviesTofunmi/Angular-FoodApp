import { Component } from '@angular/core';
import { FetchapiService } from '../../service/fetchapi.service';
import { CommonModule } from '@angular/common';
import { HttpClient, HttpClientModule } from '@angular/common/http';
import { Router } from '@angular/router';


@Component({
  selector: 'app-food-card',
  standalone: true,
  imports: [CommonModule, HttpClientModule],
  templateUrl: './food-card.component.html',
  styleUrl: './food-card.component.css'
})
export class FoodCardComponent {
  constructor(public myFetch : FetchapiService, public router: Router, public http: HttpClient){} 
 
  public myFoodItems: any[] = [];
  public derivedData: any;
  public currUser= JSON.parse(localStorage.getItem('myEmail')!)
  
  
  public product_name: string=''
  public product_price: string=''
  public product_category: string=''
  public product_desc: string=''
  public product_img: string=''
  public quantity: number= 0
 public index: number= 0

  
  
  
 
  
  
  
  // public productObj={
  //   name: this.product_name,
  //   price: this.product_price,
  //   category: this.product_category,
  //   desc: this.product_desc,
  //   image: this.product_img,
  //  quantity: this.quantity
  
  // }


ngOnInit(){
  this.http.get('http://localhost:8000/firstApp/admin/products.php').subscribe((info:any)=>{
   
    this.derivedData= info
    this.derivedData.forEach((item: any) => {
      this.myFoodItems.push(item);
    });
    
    


  })
// this.fetchOneUser();
  // console.log(this.myFoodItems);
  this.myFoodItems= this.myFetch.foodItems; 
}


public addItem(i: number){
  console.log(this.derivedData[i].product_name);
  
  this.quantity= this.quantity+1;
  // console.log(this.quantity);

  const formData = new FormData();
  formData.append('name', this.derivedData[i].product_name);
  formData.append('price', this.derivedData[i].product_price);
  formData.append('category', this.derivedData[i].product_category);
  formData.append('desc', this.derivedData[i].product_desc);
  formData.append('image', this.derivedData[i].product_img);
  formData.append('quantity', this.quantity.toString());
  formData.append('User', this.currUser);
  // const data={



  this.http.post('http://localhost:8000/firstApp/components/addItem.php', formData).subscribe((info:any)=>{
   
   
   console.log(info);
   
    
    


  })
  this.router.navigate(['cart'])


}
// fetchOneUser(){
//   this.http.get('http://localhost:8000/firstApp/components/users.php').subscribe((infoo:any)=>{
//    if(infoo){

//     console.log(infoo);
    
//    }
//    else{
//     console.error('Error fetching user data:',);
//    }

// });
// }


}
