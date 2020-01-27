/*******************************************
 * Author: Jamie Walsh (C16358056)         *
 * Advanced Security 1                     *
 * Lab 03                                  *
 * 08/11/2019                              *
 *******************************************/
package Lab3_C16358056;

public class miller_rabin 
{  
    // Modular exponentiation. ( It returns (x^y) % p )
    static int power(int x, int y, int p) 
    { 
        int result = 1;
          
        // Update x if it is more than or 
        // equal to p 
        x = x % p;  
  
        while (y > 0) 
        { 
            // If y is odd, multiply x with result 
            if ((y & 1) == 1) 
            	result = (result * x) % p; 
          
            // y is now even
            y = y / 2;
            x = (x * x) % p;
        }
         
        return result; 
    }
      
    /* This gets called multiple times depending on the user's choice of value for "Iteration".
       It returns false if n is composite or if n is probably prime.
       d is an odd number. */
    static boolean miillerTest(int d, int n) 
    {        
        // Pick a random number in [2..n-2] 
        // Corner cases make sure that n > 4 
        int a = 2 + (int)(Math.random() % (n - 4)); 
      
        // Compute a^d % n 
        int x = power(a, d, n); 
      
        if (x == 1 || x == n - 1) 
            return true; 
      
        /* Keep squaring x while one of the 
           following doesn't happen
           1. d does not reach n-1
           2. (x^2) % n is not 1
           3. (x^2) % n is not n-1 */
        while (d != n - 1) 
        { 
            x = (x * x) % n; 
            d *= 2; 
          
            if (x == 1) 
                return false; 
            if (x == n - 1) 
                return true; 
        } 
        
        // Return composite 
        return false; 
    } 
      
    
    /* If n is composite, return false. 
       if n is "probably prime", return true. 
       "iteration" is the accuracy level. */
    boolean isPrime(int n, int iteration) 
    {          
        // Corner cases 
        if (n <= 1 || n == 4) 
            return false; 
        if (n <= 3) 
            return true; 
      
        int d = n - 1; 
          
        // While d is even
        while (d % 2 == 0) 
            d /= 2; //divide d by two
      
        // Run as many times as the user specified.
        for (int i = 0; i < iteration; i++) 
            if (!miillerTest(d, n)) // If the millerTest returns false
                return false;
      
        return true; 
    }
}