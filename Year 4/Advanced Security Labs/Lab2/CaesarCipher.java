package com.Lab2.C16358056;

public class CaesarCipher 
{
	public String Decrypt(String message, int key)
	{
		char ch;
		String decryptedMessage = "";
		message = message.toLowerCase(); // Change the message to lower case to so you don't need to worry about the case of the letters.
		
		for(int i = 0; i < message.length(); ++i)
		{
			ch = message.charAt(i);

			if(ch >= 'a' && ch <= 'z') // If the character is a lower-case letter.
			{
	            ch = (char)(ch - key); // Take the key value from the character.
	            
	            // If it is less than 'a' after subtracting the key then you must start from z and continue to subtract the remainder of the key.
	            if(ch < 'a') 
	            {
	                ch = (char)(ch + 'z' - 'a' + 1);
	            }
	            
	            decryptedMessage += ch; // Add the character to the decrypted message.
	        }
	        else 
	        {
	        	// If the character is not a letter then don't change it.
				decryptedMessage += ch;
	        }
		}
		
		return decryptedMessage;
	}
}
