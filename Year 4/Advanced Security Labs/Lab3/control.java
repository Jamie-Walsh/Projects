/*******************************************
 * Author: Jamie Walsh (C16358056)         *
 * Advanced Security 1                     *
 * Lab 03                                  *
 * 08/11/2019                              *
 *******************************************/
package Lab3_C16358056;

import java.util.Scanner;

public class control 
{
	public static void main(String[] args) 
	{
		int Num, ans = 0;
		int Iteration;
		boolean GoAgain = true;
		miller_rabin Mr = new miller_rabin();
		KeyExpansion_AES AES = new KeyExpansion_AES();
		Scanner sc = new Scanner(System.in);
		
		while (GoAgain)
		{		
			System.out.println("Please choose which question to test:\n" +
							   "(Enter 1 for the Miller Rabin Algorithm question. " +
							   "Enter 2 for the Key Expansion question.)");
			ans = sc.nextInt();
			
			if (ans == 1)
			{
				// Question 1 - Miller Rabin
				try
				{
					System.out.println("Enter a number to check if it is prime: ");
					Num = sc.nextInt();
					
					System.out.println("Enter the number of iteration: ");
					Iteration = sc.nextInt();
					
				}
				catch (Exception e)
				{
					System.out.println("Please enter positive integers. Re-run to try again.");
					break;
				}
		        
				if (Num < 0)
				{
					System.out.println("Please enter a positive integer.\n");
				}
				
		        if (Mr.isPrime(Num, Iteration)) 
		            System.out.print("inconclusive.\n\n");
		        else
		        	System.out.print("composite.\n\n"); 
			}
			else if (ans == 2)
			{
				// Question 2 - AES Key Expansion
				try
				{
					String str = "0f1571c947d9e8590cb7add6af7f6798"; // Hard-coded input.
					byte[] key = new byte[str.length() / 2]; // make an array to hold the keys.
					
					for (int i = 0; i < key.length; i++) 
					{
						int index = i * 2;
					    int j = Integer.parseInt(str.substring(index, index + 2), 16);
					    key[i] = (byte) j; // Add the int to the array of keys.
					     
					}
					  
					System.out.println("Key = " + key);
					int word[] = new int[44];
					
					AES.keyExpansion(key, word); //Perform the expansion here.
					  
					String[] AnswerList = new String[44]; //Create a new array to hold the values
					  
					for(int i =0;i<44;i++)
					{
						AnswerList[i] = Integer.toHexString(word[i]);
						System.out.println(AnswerList[i]); // Display each result from the list.
					}	
					
					System.out.println("\n");
				}
				catch (Exception e)
				{
					System.out.println("Please enter positive integers. Re-run to try again.");
					break;
				}
			}
			else
			{
				System.out.println("\nInvalid option entered. Only 1 and 2 are accepted\n\n");
			}
		}
		
		sc.close();
	}

}
