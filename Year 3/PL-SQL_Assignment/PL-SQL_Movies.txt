---------------------------------------------------------------------------
-- Part 2: PL/SQL Transaction
-- Program for the manager to be able to add new MOVIES to the cinema.
---------------------------------------------------------------------------

--ALTER SESSION SET CURRENT_SCHEMA = dt2nn3_a8;
--SELECT * FROM MOVIES;

SET serveroutput ON;
DECLARE 
    V_MOVIE MOVIES.MOVIE_NAME%TYPE := '&New_Movie_Name';
    V_LENGTH MOVIES.MOVIE_LENGTH_MIN%TYPE := '&Movie_Length';
    V_RELEASE MOVIES.RELEASE_DATE%TYPE := '&Release_Date';
    V_DIRECTOR MOVIES.DIRECTOR%TYPE := '&Director';
    V_PEGI MOVIES.PEGI_RATING%TYPE := '&Pegi_Rating';
    CHECK1 INT := 0;
    Movie_Exists_Already EXCEPTION;
    
BEGIN
    --Check if movie is already in the cinema.
    SELECT COUNT(*) INTO CHECK1 FROM MOVIES WHERE (MOVIE_NAME LIKE V_MOVIE);

    IF (CHECK1 = 0) THEN
        INSERT INTO MOVIES (MOVIE_NAME, MOVIE_LENGTH_MIN, 
            RELEASE_DATE, DIRECTOR, PEGI_RATING) 
        VALUES (V_MOVIE, V_LENGTH, V_RELEASE, V_DIRECTOR, V_PEGI);
    ELSE
        DBMS_OUTPUT.PUT_LINE('ERROR: Movie already exists in your database.');
        RAISE Movie_Exists_Already;
    END IF;
        
    COMMIT;
    
EXCEPTION
    WHEN OTHERS THEN
    DBMS_OUTPUT.PUT_LINE('Error number '||SQLCODE||' meaning '||SQLERRM||'. Rolling back...');
    ROLLBACK;
    
END;