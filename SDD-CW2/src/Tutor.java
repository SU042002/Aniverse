import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.FileNotFoundException;
import java.io.IOException;
import javax.swing.DefaultListModel;
import javax.swing.JList;

public class Tutor implements ActionListener {
    JList Activities;
    JButton Confirm;

    Tutor() {
        JLabel titleLabel = new JLabel();
        JLabel footerLabel = new JLabel();
        Confirm = new JButton("Confirm");
        Confirm.setPreferredSize(new Dimension(100, 50));
        Confirm.setFocusable(false);
        Confirm.addActionListener(this);
        File file = new File("activities.txt");
        BufferedReader reader = null;
        DefaultListModel list = new DefaultListModel();
        Activities = new JList();
        try{
            reader = new BufferedReader(new FileReader(file));
            String text = null;

            while ((text = reader.readLine()) != null){
                list.addElement(text);
                System.out.println(text);

            }
            Activities.setModel(list);
        } catch (FileNotFoundException e) {
            e.printStackTrace();
        } catch (IOException e){
            e.printStackTrace();
        }finally {
            try {
                if (reader != null){
                    reader.close();
                }
                } catch (IOException e) {
                e.printStackTrace();
            }
        }
        titleLabel.setText("Tutor Screen!");
        titleLabel.setFont((new Font("Arial", Font.BOLD, 60)));

        footerLabel.setText("<html>This user can see how many participants are in their selected activity. <br/>" +
                "This includes retrieving their names and ID. <br/>" +
                "They can also view what activity they are assigned too.");
        footerLabel.setFont((new Font("Arial", Font.PLAIN, 20)));

        JPanel titlePanel = new JPanel();
        JPanel leftPanel = new JPanel();
        JPanel rightPanel = new JPanel();
        JPanel centrePanel = new JPanel();
        JPanel footerPanel = new JPanel();

        titlePanel.setBackground(Color.GREEN);
        leftPanel.setBackground(Color.orange);
        rightPanel.setBackground(Color.orange);
        centrePanel.setBackground(Color.white);
        footerPanel.setBackground(Color.GREEN);

        titlePanel.setPreferredSize(new Dimension(100, 100));
        leftPanel.setPreferredSize(new Dimension(120, 100));
        rightPanel.setPreferredSize(new Dimension(120, 100));
        footerPanel.setPreferredSize(new Dimension(100, 100));
        JFrame selectScreen = new JFrame();
        selectScreen.setTitle("Tutor Screen");
        selectScreen.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        selectScreen.setSize(1280, 720);
        selectScreen.setLayout(new BorderLayout());
        selectScreen.setVisible(true);
        titlePanel.add(titleLabel);
        footerPanel.add(footerLabel);
        JScrollPane s = new JScrollPane(Activities);

        leftPanel.add(s);
        s.setVerticalScrollBarPolicy(JScrollPane.VERTICAL_SCROLLBAR_ALWAYS);
        leftPanel.add(Confirm);
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

    }
}
