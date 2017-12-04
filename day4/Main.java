import java.util.Set;
import java.util.HashMap;
import java.util.HashSet;
import java.io.*;
import java.util.Arrays;

public class Main {
    public static void main(String [] args) {

        String fileName = "passwords.txt";
        String line = null;
		int countValidPasswords = 0;
		int countSecurePasswords = 0;
        try {
            FileReader fileReader = new FileReader(fileName);
            // Always wrap FileReader in BufferedReader.
            BufferedReader bufferedReader = new BufferedReader(fileReader);

            while((line = bufferedReader.readLine()) != null) {
				countValidPasswords += validatePassword(line);
				countSecurePasswords += validateSecurePassword(line);
            }
			System.out.println("Challenge1: " + countValidPasswords);
			System.out.println("Challenge2: " + countSecurePasswords);
            bufferedReader.close();         
        }
        catch(FileNotFoundException ex) {
            System.out.println("Unable to open '" + fileName + "'");                
        }
        catch(IOException ex) {
            System.out.println("Error reading '" + fileName + "'");
            ex.printStackTrace();
        }
    }
    
    public static int validatePassword(String line){
		String[] passwords = line.split(" ");
		boolean validPassword = true;
		// Use HashSet data structure to find duplicates
		// Set doesn't allow duplicates in Java. Which means if you have added an element into Set and trying to insert duplicate element again, it will not be allowed.
		Set<String> storepw = new HashSet<>();
		for (String pw : passwords) { 
			if (storepw.add(pw) == false) { 
				validPassword = false;
				return 0;
			}
        }
        return 1;
	}
	
	//challenge 2
	public static int validateSecurePassword(String line){
		String[] passwords = line.split(" ");
		// Sort every single password alphabetically
		for (int i=0; i<passwords.length; i++) {
			String original = passwords[i];
			char[] chars = original.toCharArray();
			Arrays.sort(chars);
			String sorted = new String(chars);
			passwords[i] = sorted;
		}

		return validatePassword(String.join(" ", passwords));
	}
}