import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class SelectScreen extends JFrame implements ActionListener {
        JButton activityCoordinatorButton;
        JButton tutorButton;
        JButton studentButton;

        JFrame selectScreen;

    SelectScreen() { /*Constructor class*/

        activityCoordinatorButton = new JButton();
        activityCoordinatorButton.setPreferredSize(new Dimension(400, 100));
        activityCoordinatorButton.addActionListener(this);
        activityCoordinatorButton.setText("<html>Activity Coordinator<br/>Will and Sameer</html>");
        activityCoordinatorButton.setFocusable(false);

        tutorButton = new JButton();
        tutorButton.setPreferredSize(new Dimension(400, 100));
        tutorButton.addActionListener(this);
        tutorButton.setText("<html>Tutor<br/>Matthew and Amjad</html>");
        tutorButton.setFocusable(false);

        studentButton = new JButton();
        studentButton.setPreferredSize(new Dimension(400, 100));
        studentButton.addActionListener(this);
        studentButton.setText("<html>Student<br/>Zain and Atif</html>");
        studentButton.setFocusable(false);

        JLabel titleLabel = new JLabel();
        JLabel footerLabel = new JLabel();

        titleLabel.setText("USER SELECT SCREEN");
        titleLabel.setFont((new Font("Arial", Font.BOLD, 60)));

        footerLabel.setText("Use this screen to select what type of user you are! " +
                "Once you select your user type, a new screen will present it self to you.");
        footerLabel.setFont((new Font("Arial", Font.PLAIN, 20)));

        JPanel titlePanel = new JPanel();
        JPanel leftPanel = new JPanel();
        JPanel rightPanel = new JPanel();
        JPanel centrePanel = new JPanel();
        JPanel footerPanel = new JPanel();

        titlePanel.setBackground(Color.pink);
        leftPanel.setBackground(Color.orange);
        rightPanel.setBackground(Color.orange);
        centrePanel.setBackground(Color.white);
        footerPanel.setBackground(Color.pink);

        titlePanel.setPreferredSize(new Dimension(100, 100));
        leftPanel.setPreferredSize(new Dimension(100, 100));
        rightPanel.setPreferredSize(new Dimension(100, 100));
        footerPanel.setPreferredSize(new Dimension(100, 100));

        selectScreen = new JFrame();
        selectScreen.setTitle("User Select Screen");
        selectScreen.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        selectScreen.setSize(1280, 720);
        selectScreen.setLayout(new BorderLayout());
        selectScreen.setVisible(true);

        titlePanel.add(titleLabel);
        footerPanel.add(footerLabel);
        centrePanel.add(activityCoordinatorButton);
        centrePanel.add(tutorButton);
        centrePanel.add(studentButton);

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
        if(e.getSource()== activityCoordinatorButton) {
            System.out.println("Activity Coordinator Button is being pressed.");
            selectScreen.dispose();
            new ActivityCoordinator();
        } else if (e.getSource()== tutorButton) {
            System.out.println("Tutor Button is being pressed.");
            selectScreen.dispose();
            new Tutor();
        } else if (e.getSource()== studentButton) {
            System.out.println("Student Button is being pressed.");
            selectScreen.dispose();
            new Student();
        }
    }
}


