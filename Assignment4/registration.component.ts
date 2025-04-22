import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-registration',
  standalone: true,
  templateUrl: './registration.component.html',
  styleUrls: ['./registration.component.css'],
  imports: [CommonModule, FormsModule] 
})
export class RegistrationComponent {
  firstName: string = "";
  lastName: string = "";
  email: string = "";
  password: string = "";
  confirmPassword: string = "";
  mobile: string = "";
  gender: string = "";
  message: string = "";

  constructor(private router: Router) {} // Inject Router

  register() {
    if (!this.validateInputs()) {
      return;
    }

    const user = {
      firstName: this.firstName,
      lastName: this.lastName,
      email: this.email,
      password: this.password,
      mobile: this.mobile,
      gender: this.gender
    };

    // Store user details temporarily in localStorage
    localStorage.setItem('user', JSON.stringify(user));

    this.message = "Registration Successful! Redirecting to Login...";
    console.log("User registered:", user);

    // Redirect to login page after 2 seconds
    setTimeout(() => {
      this.router.navigate(['/login']);
    }, 2000);
  }

  validateInputs(): boolean {
    if (!this.firstName.trim() || !this.lastName.trim()) {
      this.message = "First Name and Last Name are required!";
      return false;
    }
    if (!this.validateEmail(this.email)) {
      this.message = "Please enter a valid email address!";
      return false;
    }
    if (this.password.length < 6) {
      this.message = "Password must be at least 6 characters long!";
      return false;
    }
    if (this.password !== this.confirmPassword) {
      this.message = "Passwords do not match!";
      return false;
    }
    if (!this.mobile.match(/^[0-9]{10}$/)) {
      this.message = "Please enter a valid 10-digit mobile number!";
      return false;
    }
    if (!this.gender) {
      this.message = "Please select a gender!";
      return false;
    }
    return true;
  }

  validateEmail(email: string): boolean {
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailPattern.test(email);
  }
}