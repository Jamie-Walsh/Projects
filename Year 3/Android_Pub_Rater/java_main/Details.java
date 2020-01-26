package com.example.username.jamieassignment;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import java.util.ArrayList;
import java.util.HashMap;

public class Details extends AppCompatActivity
{
    ArrayList<String> info_list = new ArrayList<>();
    DatabaseHelper db;
    TextView Name;
    TextView Address;
    TextView Times;
    TextView Cost;
    TextView Food;
    TextView Rating;
    Button Back;
    private String pages[] = {"Home", "Login", "Pubs"};
    private ArrayAdapter <String> adapter;
    private Spinner spin;
    private boolean FirstTime = true;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_details);

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
                            Home();
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
            public void onNothingSelected(AdapterView<?> parent)
            {

            }
        });

        Back=findViewById(R.id.Back);
        Back.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v)
            {
                Pubs();
            }
        });

        PrintDetails();
    }

    private void PrintDetails() {
        try
        {
            db = new DatabaseHelper(this);
            info_list = db.getData();

            String Pub = info_list.get(1);
            String Location = info_list.get(2);
            String Time = info_list.get(3);
            String Price = info_list.get(4);
            String sFood = info_list.get(5);
            String Ratings = info_list.get(6);

            Name = findViewById(R.id.PubTitle);
            Name.setText(Pub);

            Address = findViewById(R.id.Location);
            Address.setText(Location);

            Times = findViewById(R.id.Time);
            Times.setText(Time);

            Cost = findViewById(R.id.Price);
            Cost.setText(Price);

            Food = findViewById(R.id.Food);
            Food.setText(sFood);

            Rating = findViewById(R.id.Rating);
            Rating.setText(Ratings);
        }
        catch (Exception ex)
        {
            Toast.makeText(getApplicationContext(), "Fuck\n" + ex, Toast.LENGTH_SHORT).show();
        }
    }

    public void Home()
    {
        Intent GoHome = new Intent(Details.this, MainActivity.class);
        startActivity(GoHome);
    }

    public void Login()
    {
        Intent GoLogin = new Intent(Details.this, Login.class);
        startActivity(GoLogin);
    }

    public void Pubs()
    {
        Intent GoPubs = new Intent(Details.this, Pubs.class);
        startActivity(GoPubs);
    }


}