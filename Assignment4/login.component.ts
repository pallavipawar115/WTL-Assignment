import { Component } from '@angular/core';
import { Router } from '@angular/router';  // Import Router
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-login',
  standalone: true,
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css'],
  imports: [CommonModule, FormsModule] // Import CommonModule and FormsModule
})
export class LoginComponent {
  email: string = "";
  password: string = "";
  message: string = "";

  constructor(private router: Router) {}  // Inject Router

  login() {
    console.log("Email Entered:", this.email);  // Debugging log
    console.log("Password Entered:", this.password);

    if (this.email.trim() === "admin@example.com" && this.password.trim() === "password") {
      this.message = "Login Successful!";
      // Navigate to dashboard or home after successful login (optional)
      setTimeout(() => this.router.navigate(['/dashboard']), 1000);
    } else {
      this.message = "Invalid email or password!";
    }
  }

  goToRegister() {
    this.router.navigate(['/register']); 
  }
}
        