import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.util.HashMap;
import java.util.HashSet;
import java.util.Map;
import java.util.Set;

/**
 * This is class will be used to parse the csv file with all the relevant
 * tags to their rating information.
 *
 * @author Judy
 *
 */
public class CSVParser {

	//Currently stores filename, new Recommendations, and
	//maps specific tags to

	String filename;
	Set<Recommendation> recommendation;
	Map<Tag, Recommendation> tagsToRec;

	public CSVParser(String filename) {
		this.filename = filename;
		this.recommendation = new HashSet<Recommendation>();
		this.tagsToRec = new HashMap<Tag, Recommendation>();
	}

	public void read() {
		BufferedReader br = null;
		FileReader file = null;

		try {
			//open the files and start reading
			file = new FileReader(this.filename);
			br = new BufferedReader(file);
			String line = br.readLine();

			while(line != null){
				String[] courseStrings = line.split("\\s*,\\s*");

				//Will parse the cvs accordingly
				//Create recommendations per line
				//add this rec to all of its associated tag mappings
				//TODO: Read according to file
			}


		} catch (FileNotFoundException e) {
			System.out.println("FileNotFoundException: CSVParser given filename " + filename);
		} catch (IOException e) {
			System.out.println("IOException: CSVParser");
		}
	}

	public Set<Recommendation> getRecommendations() {
		return this.recommendation;
	}

	public Map<Tag, Recommendation> getTagSet() {
		return this.tagsToRec;
	}

}
