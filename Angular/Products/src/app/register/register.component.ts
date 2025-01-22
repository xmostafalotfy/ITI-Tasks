import { Component } from '@angular/core';
import { AbstractControl, FormBuilder, FormGroup, ReactiveFormsModule, ValidationErrors, ValidatorFn, Validators } from '@angular/forms';
import { Router, RouterLink, RouterLinkActive } from '@angular/router';

@Component({
  selector: 'app-register',
  imports: [ReactiveFormsModule,RouterLink,RouterLinkActive],
  templateUrl: './register.component.html',
  styleUrl: './register.component.css'
})
export class RegisterComponent {

  registerForm: FormGroup;
  constructor(private fb: FormBuilder,private router: Router) {
    this.registerForm = this.fb.group({
      name : ['',Validators.required, Validators.pattern('^[A-Za-z]+$')],
      username: ['', [Validators.required, Validators.pattern('^[^\\s]*$')]],
      email: ['', [ Validators.required, Validators.email ]],
      password: ['', [Validators.required, Validators.minLength(8), Validators.pattern('^(?=.*[A-Z])(?=.*[a-z])(?=.*[^A-Za-z0-9]).+$')]],
      confirmPassword : ['' , [Validators.required ,Validators.minLength(8)]]

    },{ validators: this.passwordMatchValidator })
  }
  passwordMatchValidator: ValidatorFn = (control: AbstractControl): ValidationErrors | null => {
    const password = control.get('password');
    const confirmPassword = control.get('confirmPassword');

    if (password && confirmPassword && password.value !== confirmPassword.value) {
      return { passwordMismatch: true };
    }
    return null;
  };
  get formControls() {
    return this.registerForm.controls
  }

  handleSubmitForm(){
    this.router.navigate(['/'])
  }

}