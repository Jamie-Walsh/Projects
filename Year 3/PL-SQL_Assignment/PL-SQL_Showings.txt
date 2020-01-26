-------------------------------------------------------------------------
-- Part 2: PL/SQL Transaction.
--Program for the manager to add new SHOWINGS of a film to the cinema.
-------------------------------------------------------------------------
--ALTER SESSION SET CURRENT_SCHEMA = dt2nn3_a8;
--SELECT * FROM SHOWINGS;
--SELECT * FROM MOVIES;

SET serveroutput ON;
DECLARE
    V_MOVIE MOVIES.MOVIE_NAME%TYPE := '&Movie_Name';
    V_SCREEN SHOWINGS.SCREEN_NUMBER%TYPE := '&Screen_Number';
    V_SHOWING_TIME SHOWINGS.SHOWING_TIME%TYPE := '&Showing_Time';
    V_SHOWING_WEEK SHOWINGS.SHOWING_WEEK%TYPE := '&Week_Number';
    V_STANDARD SHOWINGS.PRICE_STANDARD%TYPE := '&Standard_Price';
    V_PREMIUM SHOWINGS.PRICE_PREMIUM%TYPE := '&Premium_Price';
    CHECK1 INT := 0;
    CHECK2 INT := 0;
    Screen_Not_Available EXCEPTION;
    Movie_Not_Found EXCEPTION;
    
BEGIN
    --Check if movie exists.
    SELECT COUNT(*) INTO CHECK1 FROM MOVIES WHERE (MOVIE_NAME LIKE V_MOVIE);
    IF(CHECK1 > 0) THEN
        --Check if the screen is available.    
        SELECT COUNT(*) INTO CHECK2 FROM SHOWINGS WHERE (SHOWING_TIME LIKE V_SHOWING_TIME AND SCREEN_NUMBER LIKE V_SCREEN);
    
        IF (CHECK2 = 0) THEN
            INSERT INTO SHOWINGS (SCREEN_NUMBER, SHOWING_TIME, 
                SHOWING_WEEK, MOVIE_NAME, PRICE_STANDARD, PRICE_PREMIUM) 
            VALUES(V_SCREEN, V_SHOWING_TIME, 
            V_SHOWING_WEEK, V_MOVIE, V_STANDARD, V_PREMIUM);
        ELSE
            DBMS_OUTPUT.PUT_LINE('ERROR: Screen Unavailable.');
            RAISE Screen_Not_Available;
        END IF;
    ELSE
        DBMS_OUTPUT.PUT_LINE('ERROR: Movie doesn''t exist.');
        RAISE Movie_Not_Found;
    END IF;
        
    COMMIT;
    
EXCEPTION
    WHEN OTHERS THEN
    DBMS_OUTPUT.PUT_LINE('Error number '||SQLCODE||' meaning '||SQLERRM||'. Rolling back...');
    ROLLBACK;
    
END;