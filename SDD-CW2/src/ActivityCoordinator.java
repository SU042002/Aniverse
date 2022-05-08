import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.*;
import java.util.*;
import java.util.List;

public class ActivityCoordinator implements ActionListener {

    JButton addActivity;
    JButton removeActivity;
    JButton countActivity;
    JTextField textField;
    String userInput;
    /*creation of global variables like buttons and text fields*/

    JTextArea activityCountTextArea = new JTextArea(18, 58);

    static HashMap<String, Integer> activityMap = new HashMap<>();
    /*this is used for the activity count*/
    /*creates hashmap*/
    /*key-value pair*/
    /*key = activity*/
    /*value = count*/

    public static void addActivity(String userInput) throws IOException {
        boolean flag = false;
        boolean isValidEntry = false;
        String blankEntry = "^\\s*$";
        String validCharacters = "^[a-zA-Z ]*$";

        if (userInput.matches(blankEntry)) {
            return;
        }

        if (userInput.matches(validCharacters)) {
            isValidEntry = true;
        }

        if (!isValidEntry) {
            JOptionPane.showMessageDialog(null,
                    "\"" + userInput + "\"" + " is not a valid activity name, please try again", "Invalid Entry",
                    JOptionPane.WARNING_MESSAGE);
            return;
        }

        try (BufferedReader reader = new BufferedReader(new FileReader("activities.txt"))) {
            String line;
            while ((line = reader.readLine()) != null) {
                if (line.equalsIgnoreCase(userInput)) {
                    flag = true;
                    break;
                }
            }
        }
        if (!flag) {
            FileWriter fw = new FileWriter("activities.txt", true);
            PrintWriter pw = new PrintWriter(fw);
            pw.print("\n" + userInput);
            pw.close();
            JOptionPane.showMessageDialog(null, "The activity " + userInput + " has been added to the database!",
                    "Entry Added", JOptionPane.PLAIN_MESSAGE);
        } else if (flag) {
            JOptionPane.showMessageDialog(null, "The activity " + userInput + " already exists in the database!",
                    "Duplicate Entry", JOptionPane.WARNING_MESSAGE);
        }
    }

    public static void removeActivity(String userInput) throws IOException {
        boolean isValidEntry = false;
        String blankEntry = "^\\s*$";
        String validCharacters = "^[a-zA-Z ]*$";

        if (userInput.matches(blankEntry)) {
            return;
        }

        if (userInput.matches(validCharacters)) {
            isValidEntry = true;
        }

        if (!isValidEntry) {
            JOptionPane.showMessageDialog(null,
                    "\"" + userInput + "\"" + " is not a valid activity name, please try again", "Invalid Entry",
                    JOptionPane.WARNING_MESSAGE);
            return;
        }

        File tempFile = new File("tempFile.txt");
        File inputFile = new File("activities.txt");
        int linesBefore = 0;
        int linesAfter = 0;

        try (BufferedReader reader = new BufferedReader(new FileReader(inputFile));
             BufferedWriter writer = new BufferedWriter(new FileWriter(tempFile));) {
            String currentLine;
            String activityToRemove = userInput;

            try (BufferedReader reader2 = new BufferedReader(new FileReader(inputFile))) {

                while (reader2.readLine() != null) {
                    linesBefore++;
                }

                reader2.close();
            }

            while ((currentLine = reader.readLine()) != null) {
                String trimmedLine = currentLine.trim();
                if (trimmedLine.toLowerCase().contains(activityToRemove.toLowerCase()))
                    continue;
                writer.write(currentLine + System.getProperty("line.separator"));
            }

            writer.close();
            reader.close();
            inputFile.delete();
            tempFile.renameTo(inputFile);

            try (BufferedReader reader3 = new BufferedReader(new FileReader(inputFile))) {

                while (reader3.readLine() != null) {
                    linesAfter++;
                }

                reader3.close();
            }

            if (linesAfter != linesBefore) {
                JOptionPane.showMessageDialog(null,
                        "The activity " + userInput + " has been removed from the database!", "Activity Removed",
                        JOptionPane.PLAIN_MESSAGE);
                removeActivitySA(userInput);
            } else {
                JOptionPane.showMessageDialog(null,
                        "The activity " + userInput + " does not exist within the database!", "No Such Activity",
                        JOptionPane.WARNING_MESSAGE);
            }
        }
//        removeLastLine("activities.txt");
    }

    public static void removeActivitySA(String userInput) throws IOException {

        File tempFile = new File("tempFile.txt");
        File inputFile = new File("Student-Activities.txt");

        try (BufferedReader reader = new BufferedReader(new FileReader(inputFile));
             BufferedWriter writer = new BufferedWriter(new FileWriter(tempFile));) {
            String currentLine;
            String activityToRemove = userInput;

            while ((currentLine = reader.readLine()) != null) {
                String trimmedLine = currentLine.trim();
                if (trimmedLine.toLowerCase().contains(activityToRemove.toLowerCase())) {
                    continue;
                }
                writer.write(currentLine + System.getProperty("line.separator"));
            }
            writer.close();
            reader.close();
            inputFile.delete();
            tempFile.renameTo(inputFile);
        }
   //     removeLastLine("Student-Activities.txt");
    }

    public static void removeLastLine(String filename) throws IOException {
        File tempFile = new File("tempFile.txt");
        File inputFile = new File(filename);

        try (BufferedReader reader = new BufferedReader(new FileReader(inputFile));
             BufferedWriter writer = new BufferedWriter(new FileWriter(tempFile));) {
            String currentLine;
            String activityToRemove = "";

            while ((currentLine = reader.readLine()) != null) {
                String trimmedLine = currentLine.trim();
                if (trimmedLine.toLowerCase().equalsIgnoreCase(activityToRemove)) {
                    continue;
                }
                writer.write(currentLine + System.getProperty("line.separator"));
            }
            writer.close();
            reader.close();
            inputFile.delete();
            tempFile.renameTo(inputFile);
        }
    }


    public static void activityCount() throws IOException {
        BufferedReader readerActivities = new BufferedReader(new FileReader("activities.txt"));
        /*this is used first to create the hashmap because these are all the available activities that the students participate in*/
        /*buffered reader reads each line of activities*/
        String lineActivities;
        /*contains 1 line*/
        while ((lineActivities = readerActivities.readLine()) != null) {
            /*reads every line in the file*/
            /*null will be returned when the cycle through all the lines are complete*/
            activityMap.put(lineActivities, 0);
            /*puts each activity in hashmap*/
            /*no need to check for duplicates because everything in activities should already be unique when added*/
        }
        readerActivities.close();
        /*closes reader object*/
        /*prints all the original activityMap with all the activities as a key*/
        /*the values are all 0 because at this stage we do not know if any of the students are participating in any activities*/
        /*these values will be incremented based on the student-activities file*/

        BufferedReader readerStudentActivities = new BufferedReader(new FileReader("Student-Activities.txt"));
        /*buffered reader reads each line of student activities*/
        String lineStudentActivities;
        /*contains 1 line*/
        while ((lineStudentActivities = readerStudentActivities.readLine()) != null) {
            /*reads every line of the student activities file*/
            if (activityMap.containsKey(lineStudentActivities.substring(10, lineStudentActivities.length()))) {
                /*substring is used here to just retrieve the activities, not the student id details*/
                Integer activityExists = activityMap.get(lineStudentActivities.substring(10, lineStudentActivities.length()));
                /*creates an integer, this integer is used to retrieve the current value of the activity*/
                /*this integer is used below so that it can be incremented if there is another student that does the activity*/
                activityMap.replace(lineStudentActivities.substring(10, lineStudentActivities.length()), activityExists + 1);
                /*this replaces the value of the key if the activity already exists as a key in the hashmap*/
            }
//            System.out.println(lineStudentActivities.substring(10, lineStudentActivities.length()));
        }
        readerStudentActivities.close();
        /*closes reader object*/
    }


    ActivityCoordinator() { /* constructor class */

        JLabel titleLabel = new JLabel();
        JLabel footerLabel = new JLabel();
        JLabel result = new JLabel();

        addActivity = new JButton("Add Activity");
        addActivity.setPreferredSize(new Dimension(120, 50));
        addActivity.setFocusable(false);
        addActivity.addActionListener(this);

        removeActivity = new JButton("<html>Remove<br/>Activity</html>");
        removeActivity.setPreferredSize(new Dimension(120, 50));
        removeActivity.setFocusable(false);
        removeActivity.addActionListener(this);

        countActivity = new JButton("<html>Count<br/>Activity</html>");
        countActivity.setPreferredSize(new Dimension(120, 50));
        countActivity.setFocusable(false);
        countActivity.addActionListener(this);

        textField = new JTextField();
        textField.setPreferredSize(new Dimension(250, 40));

        titleLabel.setText("Activity Coordinator Screen!");
        titleLabel.setFont((new Font("Arial", Font.BOLD, 60)));

        footerLabel.setText("<html>This user can add new activities and delete existing activities. <br/>"
                + "They can assign a tutor to an activity. <br/>"
                + "They can also view how many participants are in an activity.");
        footerLabel.setFont((new Font("Arial", Font.PLAIN, 20)));

        JPanel titlePanel = new JPanel();
        JPanel leftPanel = new JPanel();
        JPanel rightPanel = new JPanel();
        JPanel centrePanel = new JPanel();
        JPanel footerPanel = new JPanel();

        titlePanel.setBackground(Color.cyan);
        leftPanel.setBackground(Color.orange);
        rightPanel.setBackground(Color.orange);
        centrePanel.setBackground(Color.white);
        footerPanel.setBackground(Color.cyan);

        titlePanel.setPreferredSize(new Dimension(100, 100));
        leftPanel.setPreferredSize(new Dimension(130, 100));
        rightPanel.setPreferredSize(new Dimension(130, 100));
        footerPanel.setPreferredSize(new Dimension(100, 100));

        JFrame selectScreen = new JFrame();
        selectScreen.setTitle("Activity Coordinator Screen");
        selectScreen.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        selectScreen.setSize(1280, 720);
        selectScreen.setLayout(new BorderLayout());
        selectScreen.setVisible(true);

        titlePanel.add(titleLabel);
        footerPanel.add(footerLabel);

        footerPanel.add(textField);
        leftPanel.add(addActivity);
        leftPanel.add(removeActivity);
        rightPanel.add(countActivity);

        result.setText("OUTPUT");
        /*center panel text*/
        result.setFont((new Font("Arial", Font.BOLD, 20)));
        /*sets text styling*/
        centrePanel.add(result);
        /*adding to panel*/

        activityCountTextArea.setFont(new Font("Arial", Font.PLAIN, 20));
        activityCountTextArea.setBackground(Color.YELLOW);
        activityCountTextArea.setText(activityMap.toString());
        activityCountTextArea.setLineWrap(true);
        centrePanel.add(activityCountTextArea);


        selectScreen.add(titlePanel, BorderLayout.NORTH);
        selectScreen.add(leftPanel, BorderLayout.WEST);
        selectScreen.add(rightPanel, BorderLayout.EAST);
        selectScreen.add(centrePanel, BorderLayout.CENTER);
        selectScreen.add(footerPanel, BorderLayout.SOUTH);

        ImageIcon logo = new ImageIcon("logo.png");
        selectScreen.setIconImage(logo.getImage());
    }

    @Override
    public void actionPerformed(ActionEvent e) {
        /*if any of the buttons are pressed*/
        if (e.getSource() == addActivity) {
            userInput = textField.getText();
            try {
                addActivity(userInput);
            } catch (IOException ex) {
                ex.printStackTrace();
            }
            textField.setText("");
        } else if (e.getSource() == removeActivity) {
            userInput = textField.getText();
            try {
                removeActivity(userInput);
            } catch (IOException ex) {
                ex.printStackTrace();
            }
            textField.setText("");
        } else if (e.getSource() == countActivity) {
            /*if activity button is pressed*/
            try {
                activityCount();
                /*creates the hash map of activities and count*/

                Set<Map.Entry<String, Integer>> entrySet = activityMap.entrySet();
                /*making a collection using the activity hash map*/

                List<Map.Entry<String, Integer>> list = new ArrayList<>(entrySet);
                /*creating a new list so that the sort method can be used*/
                /*making list out of entrySet*/

                Collections.sort(list, new Comparator<Map.Entry<String, Integer>>() {
                    /*collection class is used to sort the list*/
                    /*the second parameter is the entry set*/
                    @Override
                    public int compare(Map.Entry<String, Integer> o1, Map.Entry<String, Integer> o2) {
                        /*method to compare the values*/
                        return o1.getValue().compareTo(o2.getValue());
                        /*list gets sorted and returned*/
                    }
                });

                StringBuilder sort = new StringBuilder();
                /*stringBuilder used to output list*/
                list.forEach(s->{
                    /*for each key value perform method below*/
                    sort.append(s+" ");
                    /*for each list map add to sort stringBuilder*/
                });

                String sortedString = sort.toString();
                /*converts list to string*/

                activityCountTextArea.setText(sortedString);
                /*displays/outputs the text to text area*/
            } catch (IOException ex) {
                ex.printStackTrace();
            }
        }
    }
}