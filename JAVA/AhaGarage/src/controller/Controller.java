/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package controller;

import java.awt.Graphics;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.ButtonGroup;
import model.Model;
import view.View;

/**
 *
 * @author soto.aitzol
 */
public class Controller implements ActionListener{
    private Model model;
    private View view;
    private Graphics gGraphics;
    
    public Controller(Model model, View view) {
        this.model = model;
        this.view = view;
        gehituActionListener(this);
        
        view.jTextAreaTextualReports.setEditable(false);
        //Textual radio buttons
        ButtonGroup group1 = new ButtonGroup();
        group1.add(view.jRadioButtonSoldProducts);
        group1.add(view.jRadioButtonGarageOcuppation);
        group1.add(view.jRadioButtonRentedHours);
        group1.add(view.jRadioButtonIncomeByClient);
        //Graphic radio buttons
        ButtonGroup group2 = new ButtonGroup();
        group2.add(view.jRadioButtonReport1);
        group2.add(view.jRadioButtonReport2);
        group2.add(view.jRadioButtonReport3);
        group2.add(view.jRadioButtonReport4);
    }
    
    private void gehituActionListener(ActionListener listener) {
        //GUIaren konponente guztiei gehitu listenerra
        view.jButtonTextualReports.addActionListener(listener);
        view.jButtonGraphicReports.addActionListener(listener);
        //Dialog textual reports
        view.jRadioButtonSoldProducts.addActionListener(listener);
        view.jRadioButtonGarageOcuppation.addActionListener(listener);
        view.jRadioButtonRentedHours.addActionListener(listener);
        view.jRadioButtonIncomeByClient.addActionListener(listener);
        //Graphic reports
        view.jRadioButtonReport1.addActionListener(listener);
        view.jRadioButtonReport2.addActionListener(listener);
        view.jRadioButtonReport3.addActionListener(listener);
        view.jRadioButtonReport4.addActionListener(listener);
    }
    
    public void actionPerformed(ActionEvent e) {
        String actionCommand = e.getActionCommand();
        //listenerrak entzun dezakeen eragiketa bakoitzeko. Konponenteek 'actionCommand' propietatea daukate
        switch (actionCommand) {
            case "GRAPHIC REPORTS":
                view.jDialogGraphicReports.setSize(600,450);
                view.jDialogGraphicReports.setResizable(false);
                view.jDialogGraphicReports.setVisible(true);
                gGraphics = view.jDialogGraphicReports.getGraphics();
                break;
            case "TEXTUAL REPORTS":
                view.jDialogTextualReports.setSize(550,425);
                view.jDialogTextualReports.setResizable(false);
                view.jDialogTextualReports.setVisible(true);
                break;
            case "Most sold products":
                view.jTextAreaTextualReports.setText("Most Sold Products");
                break;
            case "Garage occupation":
                view.jTextAreaTextualReports.setText("Garage Occupation");
                break;
            case "Rented hours by client":
                view.jTextAreaTextualReports.setText("Rented Hours");
                break;
            case "Income by client":
                view.jTextAreaTextualReports.setText("Income by client");
                break;
            case "SAVE":
                //Save textual report
                break;
            case "Report 1":
                //Draw report 1
                //view.jDialogGraphicReports.repaint();
                model.drawGraphicBase(gGraphics);
                model.drawReport1(gGraphics);
                break;
            case "Report 2":
                //Draw report 2
                model.drawGraphicBase(gGraphics);
                model.drawReport2(gGraphics);
                break;
            case "Report 3":
                //Draw report 3
                model.drawGraphicBase(gGraphics);
                model.drawReport3(gGraphics);
                break;
            case "Report 4":
                //Draw report 4
                model.drawGraphicBase(gGraphics);
                model.drawReport4(gGraphics);
                break;
        }
    }
}
