import { CommonModule } from '@angular/common';
import { HttpClient, HttpClientModule } from '@angular/common/http';
import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Router } from '@angular/router';


@Component({
  selector: 'app-signup',
  standalone: true,
  imports: [CommonModule, FormsModule, HttpClientModule],
  templateUrl: './signup.component.html',
  styleUrl: './signup.component.css'
})
export class SignupComponent {
  constructor(public router: Router,  public http: HttpClient){}
  public message: any;

 public signupUsers: Array<{first_name: string, last_name: string, email: string, password: string}>= [];
 public signupObj: any={
   first_name:'',
   last_name:'',
   email:'',
   password:''
 };

 onSignUp(){
  if(this.signupObj.first_name && this.signupObj.last_name  && this.signupObj.email && this.signupObj.password){
    this.signupUsers.push(this.signupObj);
    console.log(this.signupObj);

//  const formData = new FormData()
//   formData.append("first_name" , this.signupObj.first_name)
//   formData.append("last_name", this.signupObj.last_name)
//   formData.append("email", this.signupObj.email)
//   formData.append('password' , this.signupObj.password)
    const data = {
      first_name: this.signupObj.first_name,
      last_name: this.signupObj.last_name,
      email: this.signupObj.email,
      password: this.signupObj.password
  };

    this.http.post('http://localhost:8000/firstApp/components/newUsers.php', data).subscribe((response:any)=>{
      this.message= response.message;
      console.log(response);
      this.router.navigate(['login'])
    }, error=>{

      console.log(error);
      
    });
 
  }
   else{
     alert('Please fill all the fields');

   }
  
 }


}
