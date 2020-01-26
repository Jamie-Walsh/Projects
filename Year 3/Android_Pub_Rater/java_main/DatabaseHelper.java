package com.example.username.jamieassignment;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import java.util.ArrayList;
import java.util.HashMap;

public class DatabaseHelper extends SQLiteOpenHelper
{
    //Attributes
    static int ErrorNumber;

    //Constructor
    public DatabaseHelper(Context context)
    {
        super(context, "Login.db", null, 1);
    }

    //Methods inherited from 'SQLiteOpenHelper'.
    @Override
    public void onCreate(SQLiteDatabase database)
    {
        //Create the Tables.
        database.execSQL("Create table pubs(id text primary key, name text, location text, opening_times text, price text, food text, rating text)");
        database.execSQL("Create table users(username text primary key, email text, password text)");
    }

    @Override
    public void onUpgrade(SQLiteDatabase database, int oldVersion, int newVersion)
    {
        database.execSQL("Drop table if exists users");
        database.execSQL("Drop table if exists pubs");
    }

    public void PubPopulate()
    {
        SQLiteDatabase database = this.getWritableDatabase();

        //Inserts in to the pubs table.
        database.execSQL("insert or replace into pubs(id, name, location, opening_times, price, food, rating) " +
                "values(\"1\", \"Whelans\", \"Wexford Street, Dublin\", \"5pm-3am, Monday-Sunday\", \"€€\", \"No\", \"4.7\")");
        database.execSQL("insert or replace into pubs(id, name, location, opening_times, price, food, rating) " +
                "values(\"2\", \"The Temple Bar\", \"Temple Bar, Dublin\", \"9am-11pm, Monday-Sunday\", \"€€€\", \"Yes\", \"3.1\")");
        database.execSQL("insert or replace into pubs(id, name, location, opening_times, price, food, rating) " +
                "values(\"3\", \"The Whitworth\", \"Drumcondra, Dublin\", \"12pm-11:30pm, Monday-Sunday\", \"€\", \"Yes\", \"4.0\")");
        database.execSQL("insert or replace into pubs(id, name, location, opening_times, price, food, rating) " +
                "values(\"4\", \"Token\", \"Smithfield, Dublin\", \"12pm-12am, Monday-Sunday\", \"€€\", \"Yes\", \"4.3\")");
        database.execSQL("insert or replace into pubs(id, name, location, opening_times, price, food, rating) " +
                "values(\"5\", \"The Long Hall\", \"George's Street, Dublin\", \"12pm-12:30am, Monday-Sunday\", \"€\", \"No\", \"4.9\")");
        database.execSQL("insert or replace into pubs(id, name, location, opening_times, price, food, rating) " +
                "values(\"6\", \"Opium\", \"Wexford Street, Dublin\", \"12pm-1am, Monday-Sunday\", \"€€€\", \"Yes\", \"4.4\")");
    }

    //Insert a new user when they register successfully.
    public boolean insert(String username, String email, String password)
    {
        SQLiteDatabase database =this.getWritableDatabase();
        ContentValues content = new ContentValues();
        content.put("username", username);
        content.put("email", email);
        content.put("password", password);
        long ins = database.insert("users", null, content);

        if(ins==-1)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    //Checks if the username exists and if the password is correct when a user tries to log in.
    public Boolean LoginCheck(String name, String pass)
    {
        SQLiteDatabase db = this.getReadableDatabase();
        Cursor cursor = db.rawQuery("Select * from users where username =?", new String[]{name});
        if(cursor.getCount() > 0)
        {
            Cursor cursor2 = db.rawQuery("Select * from users where username =? and password =?", new String[]{name, pass});
            if(cursor2.getCount() > 0)
            {
                return true;
            }
            else
            {
                ErrorNumber = 2;
                return false;
            }
        }
        else
        {
            ErrorNumber = 1;
            return false;
        }
    }

    //Error checking on the sign up section.
    public Boolean RegCheck(String user, String email, String pass, String confirm)
    {
        SQLiteDatabase db = this.getReadableDatabase();
        Cursor cursor = db.rawQuery("Select * from users where username =?", new String[]{user});

        //If the username already exists return false.
        if(cursor.getCount() == 0)
        {
            //A small bit of error checking on the email entered
            if(email.contains("@") && email.contains("."))
            {
                //Check if the two passwords entered match.
                if(pass.equals(confirm))
                {
                    return true;
                }
                else
                {
                    ErrorNumber = 5;
                    return false;
                }
            }
            else
            {
                ErrorNumber = 4;
                return false;
            }
        }
        else
        {
            ErrorNumber = 3;
            return false;
        }
    }

    public ArrayList<String> getData()
    {
        PubPopulate();
        SQLiteDatabase db = this.getReadableDatabase();

        Cursor data = db.rawQuery("Select * from pubs where id = ?", new String[]{Pubs.PubChosen});
        ArrayList<String> mArrayList = new ArrayList<>();

        for(int i =0; i < data.getCount(); i++)
        {
            // The Cursor is now set to the right position
            mArrayList.add(data.getString(i));
        }

        return mArrayList;
    }

}