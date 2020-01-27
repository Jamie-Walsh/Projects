package com.Lab2.C16358056;

public class VigenereCipher 
{
	public String Decrypt(String text, final String key) 
	{
        String decryptedmessage = "";
        text = text.toUpperCase();
        
        for (int i = 0, j = 0; i < text.length(); i++) 
        {
            char ch = text.charAt(i);
            if (ch < 'A' || ch > 'Z') continue;
            decryptedmessage += (char)((ch - key.charAt(j) + 26) % 26 + 'A');
            j = ++j % key.length();
        }
        
        return decryptedmessage;
    }
}
