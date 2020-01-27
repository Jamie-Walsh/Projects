package com.Lab2.C16358056;

import java.util.*;
import java.net.URL;

public class Control_Lab2 {

	public static void main(String[] args) 
	{
		String Cipher = "", message = "", decryptedMessage = "", tempMsg;
		Scanner sc = new Scanner(System.in);
		System.out.println("Choose your Cipher ('c'=Caesar 'v'=Vigenere 'b'=Base64 'i'=Base16):\n");
		Cipher = sc.nextLine(); // Save the char to the cipher variable.
		Cipher.toLowerCase();
		char ch = Cipher.charAt(0);
		CaesarCipher Cc = new CaesarCipher();
		VigenereCipher Vc = new VigenereCipher();
		
		if ((Cipher.length() == 1) && (ch == 'c' || ch == 'v' || ch == 'b' || ch == 'i'))
		{
			switch(ch)
			{
				case 'c':
					int key;
					// Ask the user to enter the encrypted message.
					System.out.println("Enter your message:\n");
					message = message + sc.nextLine(); // Save message to a variable.
					
					// Use brute force to display result from each key. The user chooses the key after.
					for(int i = 0; i < 26; i++)
					{
						tempMsg = Cc.Decrypt(message, i);
						System.out.println( "("+i+") " + tempMsg);
						tempMsg = "";
					}
					
					// The user can then see each result from each key and choose the appropriate one.
					System.out.println("\nChoose the correct key from the list: ");
					key = sc.nextInt();
					sc.close(); // Close the scanner.
						
					decryptedMessage = Cc.Decrypt(message, key);
					
					break;
				case 'v':
					String Vkey;
					Cipher = "Vigenere";
					// Ask the user to enter the encrypted message.
					System.out.println("Enter your message: ");
					message = message + sc.nextLine(); // Save message to a variable.
					
					System.out.println("Enter your key: ");
					Vkey = sc.nextLine(); // Ask for the key and save it to the Vkey variable
					decryptedMessage = Vc.Decrypt(message, Vkey); // Pass key and message to the VigenereCipher class to be decrypted.
					
					break;
				default:
					break;
			}
			
			if (ch != 'b')
				System.out.println("\nDecrypted Message:\n" + decryptedMessage);
		}
		else
		{
			System.out.println("Please enter 'c', 'v', 'b', or 'i'.");
		}
	}
}
