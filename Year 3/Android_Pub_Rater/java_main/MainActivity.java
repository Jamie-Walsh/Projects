package com.example.username.jamieassignment;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ImageButton;
import android.widget.Spinner;
import android.view.*;

public class MainActivity extends AppCompatActivity
{
    String pages[] = {"Home", "Login", "Pubs"};
    ArrayAdapter <String> adapter;
    Spinner spin;
    boolean FirstTime = true;
    ImageButton LoginHere;
    ImageButton ViewPubs;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        adapter = new ArrayAdapter<String>(this, android.R.layout.simple_dropdown_item_1line, pages);
        spin = findViewById(R.id.spin);

        //set adapter to spinner
        spin.setAdapter(adapter);

        //set spinner method
        spin.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int pos, long id)
            {
                if(FirstTime == true)
                {
                    FirstTime = false;
                }
                else
                {
                    //use position value
                    switch (pos) {
                        case 0: {
                            break;
                        }

                        case 1: {
                            Login();
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
            public void onNothingSelected(AdapterView<?> parent) {

            }
        });

        LoginHere = findViewById(R.id.LoginImage);
        LoginHere.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v)
            {
                Login();
            }
        });

        ViewPubs = findViewById(R.id.PubImage);
        ViewPubs.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v)
            {
                Pubs();
            }
        });
    }

    public void Login()
    {
        Intent GoLogin = new Intent(MainActivity.this, Login.class);
        startActivity(GoLogin);
    }

    public void Pubs()
    {
        Intent GoPubs = new Intent(MainActivity.this, Pubs.class);
        startActivity(GoPubs);
    }
}