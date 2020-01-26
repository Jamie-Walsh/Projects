package com.example.username.jamieassignment;

import android.content.Intent;
import android.database.sqlite.SQLiteDatabase;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ImageButton;
import android.widget.Spinner;

public class Pubs extends AppCompatActivity
{
    private String pages[] = {"Home", "Login", "Pubs"};
    private ArrayAdapter <String> adapter;
    private Spinner spin;
    private boolean FirstTime = true;
    private ImageButton Whelans;
    private ImageButton TempleBar;
    private ImageButton Whitworth;
    private ImageButton Token;
    private ImageButton LongHall;
    private ImageButton Opium;
    DatabaseHelper db;
    static String PubChosen = null;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_pubs);

        adapter = new ArrayAdapter<String>(this, android.R.layout.simple_dropdown_item_1line, pages);
        spin = findViewById(R.id.spin);

        //set adapter to spinner
        spin.setAdapter(adapter);

        //set spinner method
        spin.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener()
        {
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int pos, long id)
            {
                if(FirstTime == true)
                {
                    FirstTime = false;
                }
                else {
                    //use position value
                    switch (pos) {
                        case 0: {
                            Home();
                            break;
                        }

                        case 1: {
                            Login();
                            break;
                        }

                        case 2: {
                            break;
                        }
                    }
                }
            }

            @Override
            public void onNothingSelected(AdapterView<?> parent) {

            }
        });

        Whelans = findViewById(R.id.Whelans);
        TempleBar = findViewById(R.id.Temple);
        Whitworth = findViewById(R.id.Whitworth);
        Token = findViewById(R.id.Token);
        LongHall = findViewById(R.id.LongHall);
        Opium = findViewById(R.id.Opium);

        Whelans.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v)
            {
                PubChosen = "1";
                PubDetails();
            }
        });

        TempleBar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v)
            {
                PubChosen = "2";
                PubDetails();
            }
        });

        Whitworth.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v)
            {
                PubChosen = "3";
                PubDetails();
            }
        });

        Token.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v)
            {
                PubChosen = "4";
                PubDetails();
            }
        });

        LongHall.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v)
            {
                PubChosen = "5";
                PubDetails();
            }
        });

        Opium.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v)
            {
                PubChosen = "6";
                PubDetails();
            }
        });
    }

    //Link to the home page when chosen in the dropdown spinner.
    public void Home()
    {
        Intent GoHome = new Intent(Pubs.this, MainActivity.class);
        startActivity(GoHome);
    }

    //Link to the login page when chosen in the dropdown spinner.
    public void Login()
    {
        Intent GoLogin = new Intent(Pubs.this, Login.class);
        startActivity(GoLogin);
    }

    //Method that links to the details page when a user clicks a pub.
    public void PubDetails()
    {
        Intent SeeDetails = new Intent(Pubs.this, Details.class);
        startActivity(SeeDetails);
    }
}
