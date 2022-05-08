import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyEvent;
import java.io.*;
import java.util.Formatter;
import java.util.Scanner;
import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.FileNotFoundException;
import java.io.IOException;
import java.io.FileWriter;
import javax.swing.DefaultListModel;
import javax.swing.JList;


public class Student implements ActionListener {

    public static Object Activities;
    public static String StudentId;
    public int count = 0;
    public JLabel label;
    public JFrame frame;
    public JPanel panel;
    public Scanner x;
    public Formatter studentFormatter;
    static String s;
    static FileWriter fw;
    static int number = 0;
    static BufferedReader reader2 = null;


    String userInput;
    JTextField textField;


    static PrintWriter pw;
    static String pickedActivity;
    JList activities;
    JButton Confirm;
    JList students;
    JButton Check;


    public int studentLines() {
        int lines = 0;
        try (BufferedReader reader = new BufferedReader(new FileReader("activities.txt"))) {
            while (reader.readLine() != null) {
                lines++;
            }
        } catch (IOException ex) {
            System.out.println("IOException reading activities.txt");
        }
        return lines;
    }

    Student() {
        try {
            x = new Scanner(new File("activities.txt"));
        } catch (FileNotFoundException e) {
            System.out.println("Could not read file");
        }

        String activity = null;
        JButton[] buttons = new JButton[studentLines()];

        for (int i = 0; i < buttons.length; i++) {
            activity = x.nextLine();
            buttons[i] = new JButton(activity);
            buttons[i].addActionListener(this);
        }

        JLabel titleLabel = new JLabel();
        JLabel footerLabel = new JLabel();

        titleLabel.setText("Student Screen!");
        titleLabel.setFont((new Font("Arial", Font.BOLD, 60)));

        footerLabel.setText("<html>This user can join an activity. <br/>" +
                "This user can also view what activity they are in. <br/>");
        footerLabel.setFont((new Font("Arial", Font.PLAIN, 20)));

        JPanel titlePanel = new JPanel();
        JPanel leftPanel = new JPanel();
        JPanel rightPanel = new JPanel();
        JPanel centrePanel = new JPanel();
        JPanel footerPanel = new JPanel();

        titlePanel.setBackground(Color.YELLOW);
        leftPanel.setBackground(Color.orange);
        rightPanel.setBackground(Color.orange);
        centrePanel.setBackground(Color.white);
        footerPanel.setBackground(Color.YELLOW);

        titlePanel.setPreferredSize(new Dimension(100, 100));
        leftPanel.setPreferredSize(new Dimension(100, 100));
        rightPanel.setPreferredSize(new Dimension(100, 100));
        footerPanel.setPreferredSize(new Dimension(100, 100));

        JFrame selectScreen = new JFrame();
        selectScreen.setTitle("Student Screen");
        selectScreen.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        selectScreen.setSize(1280, 720);
        selectScreen.setLayout(new BorderLayout());
        selectScreen.setVisible(true);

        titlePanel.add(titleLabel);
        footerPanel.add(footerLabel);

        selectScreen.add(titlePanel, BorderLayout.NORTH);
        selectScreen.add(leftPanel, BorderLayout.WEST);
        selectScreen.add(rightPanel, BorderLayout.EAST);
        selectScreen.add(centrePanel, BorderLayout.CENTER);
        selectScreen.add(footerPanel, BorderLayout.SOUTH);


        ImageIcon logo = new ImageIcon("logo.png");
        selectScreen.setIconImage(logo.getImage());
        for (int i = 0; i < buttons.length; i++) {
            centrePanel.add(buttons[i]);
        }

        Confirm = new JButton("Confirm");
        Confirm.setPreferredSize(new Dimension(100, 50));
        Confirm.setFocusable(false);
        Confirm.addActionListener(this);
        File file = new File("students.txt");
        BufferedReader reader = null;
        DefaultListModel list = new DefaultListModel();
        activities = new JList();


        try {
            reader = new BufferedReader(new FileReader(file));
            String text = null;

            while ((text = reader.readLine()) != null) {
                list.addElement(text);
                System.out.println(text);

            }
            activities.setModel(list);
        } catch (FileNotFoundException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        } finally {
            try {
                if (reader != null) {
                    reader.close();
                }
            } catch (IOException e) {
                e.printStackTrace();
            }
            JScrollPane s = new JScrollPane(activities);

            leftPanel.add(s);
            s.setVerticalScrollBarPolicy(JScrollPane.VERTICAL_SCROLLBAR_ALWAYS);
            leftPanel.add(Confirm);
        }
        File file2 = new File("activities.txt");
        reader2 = null;
        list = new DefaultListModel();
        Check = new JButton("info");
        Check.setPreferredSize(new Dimension(100, 50));

        Check.setFocusable(false);

        Check.addActionListener(this);
        students = new JList();

        try {
            reader2 = new BufferedReader(new FileReader(file2));
            String text = null;

            while ((text = reader2.readLine()) != null) {
                list.addElement(text);
                System.out.println(text);

            }
            students.setModel(list);
        } catch (FileNotFoundException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        } finally {
            try {
                if (reader2 != null) {
                    reader2.close();
                }
            } catch (IOException e) {
                e.printStackTrace();
            }
            JScrollPane s = new JScrollPane(students);

            leftPanel.add(s);
            s.setVerticalScrollBarPolicy(JScrollPane.VERTICAL_SCROLLBAR_ALWAYS);
            leftPanel.add(Check);
        }
    }

    @Override

    public void actionPerformed(ActionEvent e) {


        // We have created String variables for the activites so when clicked i.e. golf, then the variable will be A, this concept gets more clearer as you progress through code where you write this to the std-activities.txt file.
        String A = "golf";
        String B = "rugby";
        String C = "chess";
        String D = "drama";
        String E = "gymnastics";
        String F = "quidditch";
        String G = "lacrosse";
        String H = "cycling";
        String I = "cheerleading";
        String J = "badminton";
        String K = "running";
        String L = "acrobatics";
        String M = "rowing";
        String N = "sightseeing";
        String O = "canoeing";
        String P = "knitting";
        String Q = "flying";
        String R = "football";
        String S = "trampolining";
        String T = "painting";
        String U = "weightlifting";
        String V = "skateboarding";
        String W = "swimming";
        String X = "music";
        String Y = "walking";


  // this is a oounter and will count the number of students registering for a specific activity.
        int number = 0;


        String pickedActivity = e.getActionCommand();

  // JOPTIONPane box appears that welcomes a student to the activity that they click on with their name appearing as well.

        if (pickedActivity.equals(A)) {
            JOptionPane.showMessageDialog(null, "Hello SIMON, You have succesfully registered for Golf! " + userInput + " Added to Student-Activities.txt!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(B)) {
            JOptionPane.showMessageDialog(null, "Hello BOB, You have succesfully registered for Rugby! " + userInput + " Added to Student-Activities.txt!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(C)) {
            JOptionPane.showMessageDialog(null, "Hello ZAIN, You have succesfully registered for Chess! " + userInput + "Added to Student-Activities.txt!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(D)) {
            JOptionPane.showMessageDialog(null, "Hello ATIF, You have succesfully registered for Drama! " + userInput + "Added to Student-Activities.txt!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(E)) {
            JOptionPane.showMessageDialog(null, "Hello SAHIL, You have succesfully registered for Gymnastics! " + userInput + " Added to Student-Activities.txt!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(F)) {
            JOptionPane.showMessageDialog(null, "Hello ABDUL, You have succesfully registered for Quidditch! " + userInput + " Added to Student-Activities.txt!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(G)) {
            JOptionPane.showMessageDialog(null, "Hello DAWUD, You have succesfully registered for Lacrosse! " + userInput + "Added to Student-Activities.txt!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(H)) {
            JOptionPane.showMessageDialog(null, "Hello MARK, You have succesfully registered for Cycling! " + userInput + " Added to Student-Activities.txt!!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(I)) {
            JOptionPane.showMessageDialog(null, "Hello WILLIAM, You have succesfully registered for Cheerleading! " + userInput + " Added to Student-Activities.txt!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(J)) {
            JOptionPane.showMessageDialog(null, "Hello PAUL, You have succesfully registered for Badminton! " + userInput + " Added to Student-Activities.txt!!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(K)) {
            JOptionPane.showMessageDialog(null, "Hello HARVEY, You have succesfully registered for Running! " + userInput + " Added to Student-Activities.txt!!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(L)) {
            JOptionPane.showMessageDialog(null, "Hello DAVE, You have succesfully registered for Acrobatics! " + userInput + " Added to Student-Activities.txt!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(M)) {
            JOptionPane.showMessageDialog(null, "Hello GEORGE, You have succesfully registered for Rowing! " + userInput + " Added to Student-Activities.txt!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(N)) {
            JOptionPane.showMessageDialog(null, "Hello LIAM,You have succesfully registered for Sightseeing! " + userInput + " Added to Student-Activities.txt!!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(O)) {
            JOptionPane.showMessageDialog(null, "Hello STEPHANIE,You have succesfully registered for Canoeing! " + userInput + " Added to Student-Activities.txt!!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(P)) {
            JOptionPane.showMessageDialog(null, "Hello KATIE, You have succesfully registered for Knitting! " + userInput + "Added to Student-Activities.txt!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(Q)) {
            JOptionPane.showMessageDialog(null, "Hello SOPHIE, You have succesfully registered for Flying! " + userInput + "Added to Student-Activities.txt!!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(R)) {
            JOptionPane.showMessageDialog(null, "Hello MARTIN,You have succesfully registered for Football! " + userInput + " Added to Student-Activities.txt!!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(S)) {
            JOptionPane.showMessageDialog(null, "Hello RUSSEL, You have succesfully registered for Trampolining! " + userInput + "Added to Student-Activities.txt!!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(T)) {
            JOptionPane.showMessageDialog(null, "Hello STEVEN, You have succesfully registered for Painting! " + userInput + " Added to Student-Activities.txt!!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }


        if (pickedActivity.equals(U)) {
            JOptionPane.showMessageDialog(null, "Hello ROBERT, You have succesfully registered for Weightlifting! " + userInput + " Added to Student-Activities.txt!!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(V)) {
            JOptionPane.showMessageDialog(null, "Hello DAVID, You have succesfully registered for Skateboarding! " + userInput + " Added to Student-Activities.txt!!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(W)) {
            JOptionPane.showMessageDialog(null, "Hello PHILIP, You have succesfully registered for Swimming! " + userInput + " Added to Student-Activities.txt!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(X)) {
            JOptionPane.showMessageDialog(null, "Hello JOHN, You have succesfully registered for Music! " + userInput + "Added to Student-Activities.txt!!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }
        if (pickedActivity.equals(Y)) {
            JOptionPane.showMessageDialog(null, "Hello MICHEAL, You have succesfully registered for Walking! " + userInput + " Added to Student-Activities.txt!!",
                    "Register for activity", JOptionPane.PLAIN_MESSAGE);
        }

        System.out.println(pickedActivity);


        FileWriter fw = null;
        try {
            fw = new FileWriter("Student-Activities.txt", true);
        } catch (IOException ex) {

        }
        PrintWriter pw = new PrintWriter(fw);

 // if the Strings A-Z clicked, then it will write their name, UB number + activity clicked, to Std-Activities.txt file.
        if (pickedActivity.equals(A)) {
            pw.println("Simon,22980990," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            // counter results
            System.out.println(number + " the number of students registered for" + A);


        } else if (pickedActivity.equals(B)) {
            pw.println("Bob,22927583," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + B);
        } else if (pickedActivity.equals(C)) {
            pw.println("Zain,22587509," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + C);

        } else if (pickedActivity.equals(D)) {
            pw.println("Atif,22249535," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for: " + D);

        } else if (pickedActivity.equals(E)) {
            pw.println("Sahil,22904700," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + E);

        } else if (pickedActivity.equals(F)) {
            pw.println("Abdul,22368977," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + F);

        } else if (pickedActivity.equals(G)) {
            pw.println("Dawud,22077436," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + G);

        } else if (pickedActivity.equals(H)) {
            pw.println("Mark,22249535," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + H);

        } else if (pickedActivity.equals(I)) {
            pw.println("William,22986932," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + I);

        } else if (pickedActivity.equals(J)) {
            pw.println("Paul,22195418," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + J);

        } else if (pickedActivity.equals(K)) {
            pw.println("Harvey,22700286," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + K);
        } else if (pickedActivity.equals(L)) {
            pw.println("Dave,22425902," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + L);
        } else if (pickedActivity.equals(M)) {
            pw.println("George,22867752," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + M);

        } else if (pickedActivity.equals(N)) {
            pw.println("Liam,22932301," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + N);

        } else if (pickedActivity.equals(O)) {
            pw.println("Stephanie,22652904," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + O);

        } else if (pickedActivity.equals(P)) {
            pw.println("Katie,22032783," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + P);

        } else if (pickedActivity.equals(Q)) {
            pw.println("Sophie,22195418," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + Q);
        } else if (pickedActivity.equals(R)) {
            pw.println("Martin,22631377," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + R);
        } else if (pickedActivity.equals(S)) {
            pw.println("Russel,22572186," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + S);
        } else if (pickedActivity.equals(T)) {
            pw.println("Steven,22704816," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + T);

        } else if (pickedActivity.equals(U)) {
            pw.println("Robert,22543200," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + U);

        } else if (pickedActivity.equals(V)) {
            pw.println("David,22704816," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + V);

        } else if (pickedActivity.equals(W)) {
            pw.println("Philip,22872935," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + W);

        } else if (pickedActivity.equals(X)) {
            pw.println("John,22519915," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + X);

        } else if (pickedActivity.equals(Y)) {
            pw.println("Micheal,22752839," + "\t" + pickedActivity);
            number++;
            pw.flush();
            pw.close();
            System.out.println(number + " the number of students registered for:" + Y);

        }

        if (e.getSource() == Confirm) {
            JOptionPane.showMessageDialog(null, activities.getSelectedValue());
        }

        if (e.getSource() == Confirm) {
            JOptionPane.showMessageDialog(null, "You Are A Student! You can now register for an activity!", "Student validation", JOptionPane.YES_NO_CANCEL_OPTION);
        }

        if (e.getSource() == Check) {
            JOptionPane.showMessageDialog(null, "To enrol on this activity there MUST be more than 3 STUDENT!!!", "Activity Requirements To Join", JOptionPane.WARNING_MESSAGE);
        }


    }
}