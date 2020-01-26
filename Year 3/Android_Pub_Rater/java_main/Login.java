package com.example.username.jamieassignment;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.Spinner;
import android.widget.Toast;

public class Login extends AppCompatActivity
{
    //Attributes
    private String pages[] = {"Home", "Login", "Pubs"};
    private ArrayAdapter <String> adapter;
    private Spinner spin;
    private boolean FirstTime = true;
    private Button Login;
    private Button SignUp;
    private EditText L_user, L_pass, S_user, S_pass, S_confirm, S_email;
    private DatabaseHelper db;
    private int position;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        adapter = new ArrayAdapter<String>(this, android.R.layout.simple_dropdown_item_1line, pages);
        spin = findViewById(R.id.spin);
        position = 0;
        //set adapter to spinner
        spin.setAdapter(adapter);

        //set spinner method
        spin.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id)
            {
                if(FirstTime == true)
                {
                    FirstTime = false;
                }
                else
                {
                    //use position value
                    switch (position)
                    {
                        case 0:
                        {
                            Home();
                            break;
                        }

                        case 1: {
                            break;
                        }

                        case 2: {
                            Pubs();
                            break;
                        }
                    }
                }
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent)
            {

            }
        });

        //Connect Database
        db = new DatabaseHelper(this);

        //Login Functionality
        L_user = findViewById(R.id.LogUsername);
        L_pass = findViewById(R.id.LogPass);
        Login = findViewById(R.id.LoginButton);
        Login.setOnClickListener(
                new View.OnClickListener()
                {
                    @Override
                    public void onClick(View v)
                    {
                        String Username = L_user.getText().toString();
                        String LoginPassword = L_pass.getText().toString();

                        //Check if any of the fields are empty.
                        if(Username.equals("") || LoginPassword.equals(""))
                        {
                            Toast.makeText(getApplicationContext(), "Please fill out all fields.", Toast.LENGTH_SHORT).show();
                        }
                        else
                        {
                            Boolean tryLogin = db.LoginCheck(Username, LoginPassword);
                            if(tryLogin == true)
                            {
                                Toast.makeText(getApplicationContext(), "Log in Successful.", Toast.LENGTH_SHORT).show();
                                Pubs();
                            }
                            else
                            {
                                if(DatabaseHelper.ErrorNumber == 1)
                                {
                                    Toast.makeText(getApplicationContext(), "Username Not Found.", Toast.LENGTH_SHORT).show();
                                }
                                else if(DatabaseHelper.ErrorNumber == 2)
                                {
                                    Toast.makeText(getApplicationContext(), "Password Incorrect.", Toast.LENGTH_SHORT).show();
                                }
                            }
                        }

                    }
                });

        //Sign up Functionality
        S_user = findViewById(R.id.SigUsername);
        S_email = findViewById(R.id.Email);
        S_pass = findViewById(R.id.SigPass);
        S_confirm = findViewById(R.id.Confirm);
        SignUp = findViewById(R.id.SignButton);
        SignUp.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                //Attributes
                String SignUpUserName = S_user.getText().toString();
                String Email = S_email.getText().toString();
                String SignUpPassword = S_pass.getText().toString();
                String Confirm_Pass = S_confirm.getText().toString();

                //Check if any of the fields are empty.
                if(SignUpUserName.equals("") || Email.equals("") || SignUpPassword.equals("") || Confirm_Pass.equals(""))
                {
                    Toast.makeText(getApplicationContext(), "Please fill out all fields.", Toast.LENGTH_SHORT).show();
                }
                else
                {
                    Boolean tryRegister = db.RegCheck(SignUpUserName, Email, SignUpPassword, Confirm_Pass);
                    if(tryRegister == true)
                    {
                        Boolean insert = db.insert(SignUpUserName, Email, SignUpPassword);
                        if (insert == true)
                        {
                            Toast.makeText(getApplicationContext(), "Registered Successfully. You Can Now Log In.", Toast.LENGTH_SHORT).show();
                        }
                        else
                        {
                            Toast.makeText(getApplicationContext(), "Error: You Haven't Been Registered.", Toast.LENGTH_SHORT).show();
                        }
                    }
                    else
                    {
                        if(DatabaseHelper.ErrorNumber == 3)
                        {
                            Toast.makeText(getApplicationContext(), "Username Already Exists.", Toast.LENGTH_SHORT).show();
                        }
                        else if(DatabaseHelper.ErrorNumber == 4)
                        {
                            Toast.makeText(getApplicationContext(), "Email Address is Invalid.", Toast.LENGTH_SHORT).show();
                        }
                        else if(DatabaseHelper.ErrorNumber == 5)
                        {
                            Toast.makeText(getApplicationContext(), "The Password Do Not Match.", Toast.LENGTH_SHORT).show();
                        }
                    }
                }
            }
        });
    }

    //Method to change activity to the home page when chosen in the dropdown.
    public void Home()
    {
        Intent GoHome = new Intent(Login.this, MainActivity.class);
        startActivity(GoHome);
    }

    //Change to the pubs page.
    public void Pubs()
    {
        Intent GoPubs = new Intent(Login.this, Pubs.class);
        startActivity(GoPubs);
    }
}