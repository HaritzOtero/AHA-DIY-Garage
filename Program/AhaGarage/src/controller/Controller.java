/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package controller;

import java.awt.Graphics;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.ButtonGroup;
import javax.swing.JTable;
import model.GarageOccupationTableModel;
import model.Model;
import model.TotalRentedHoursByClientTableModel;
import view.View;

/**
 *
 * @author basterra.alain
 */
public class Controller implements ActionListener {

    private Model model;
    private View view;
    private Graphics gGraphics;
    ButtonGroup group1;

    public Controller(Model model, View view) {
        this.model = model;
        this.view = view;
        gehituActionListener(this);

        //view.jTextAreaTextualReports.setEditable(false);
        //Textual radio buttons
        group1 = new ButtonGroup();
        group1.add(view.jRadioButtonSoldProducts);
        group1.add(view.jRadioButtonGarageOcuppation);
        group1.add(view.jRadioButtonProductsByMonth);
        group1.add(view.jRadioButtonTotalRentedHours);
        group1.add(view.jRadioButtonEmployeeByPosition);
        group1.add(view.jRadioButtonTotalIncomeByMonth);
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
        view.jRadioButtonProductsByMonth.addActionListener(listener);
        view.jRadioButtonTotalRentedHours.addActionListener(listener);
        view.jRadioButtonEmployeeByPosition.addActionListener(listener);
        view.jRadioButtonTotalIncomeByMonth.addActionListener(listener);
        //Graphic reports
        view.jRadioButtonReport1.addActionListener(listener);
        view.jRadioButtonReport2.addActionListener(listener);
        view.jRadioButtonReport3.addActionListener(listener);
        view.jRadioButtonReport4.addActionListener(listener);
        //Combo box
        view.jComboBoxHilabetea.addActionListener(listener);
        view.jComboBoxEmployeePos.addActionListener(listener);
        //Save button
        view.jButtonSave.addActionListener(listener);
    }

    public void actionPerformed(ActionEvent e) {
        String actionCommand = e.getActionCommand();
        //listenerrak entzun dezakeen eragiketa bakoitzeko. Konponenteek 'actionCommand' propietatea daukate
        switch (actionCommand) {
            case "GRAPHIC REPORTS":
                view.jDialogGraphicReports.setSize(600, 450);
                view.jDialogGraphicReports.setResizable(false);
                view.jDialogGraphicReports.setVisible(true);
                gGraphics = view.jDialogGraphicReports.getGraphics();
                break;
            case "TEXTUAL REPORTS":
                view.jRadioButtonSoldProducts.setSelected(true);
                view.jDialogTextualReports.setSize(750, 625);
                view.jDialogTextualReports.setResizable(false);
                view.jDialogTextualReports.setVisible(true);
                view.jComboBoxHilabetea.setEnabled(false);
                view.jComboBoxEmployeePos.setEnabled(false);

                group1 = new ButtonGroup();
                group1.add(view.jRadioButtonSoldProducts);
                group1.add(view.jRadioButtonGarageOcuppation);
                group1.add(view.jRadioButtonProductsByMonth);
                group1.add(view.jRadioButtonTotalRentedHours);
                group1.add(view.jRadioButtonEmployeeByPosition);
                group1.add(view.jRadioButtonTotalIncomeByMonth);
                break;
            case "Most sold products":
                view.jComboBoxHilabetea.setEnabled(false);
                view.jComboBoxEmployeePos.setEnabled(false);
                //view.jTextAreaTextualReports.setText("Most Sold Products");
                break;
            case "Garage occupation":
                view.jComboBoxHilabetea.setEnabled(true);
                view.jComboBoxEmployeePos.setEnabled(false);
                break;
            case "comboBoxChanged":
                if (view.jRadioButtonGarageOcuppation.isSelected()) {
                } else if (view.jRadioButtonProductsByMonth.isSelected()) {
                }
                break;
            case "Most sold products by month":
                view.jComboBoxHilabetea.setEnabled(true);
                view.jComboBoxEmployeePos.setEnabled(false);
                break;

            case "Total rented hours by client":
                view.jComboBoxHilabetea.setEnabled(false);
                view.jComboBoxEmployeePos.setEnabled(false);
                view.jTableReports.setModel(new TotalRentedHoursByClientTableModel(Model.totalRentedHoursByClient()));
                break;
            case "Employees by position":
                view.jComboBoxHilabetea.setEnabled(false);
                view.jComboBoxEmployeePos.setEnabled(true);
                break;
            case "positionComboBox":
                break;
            case "Total income by month":

                break;
            case "SAVE":
                String reportName = "";
                if(view.jRadioButtonSoldProducts.isSelected()){
                    reportName = "Most sold products";
                }else if(view.jRadioButtonGarageOcuppation.isSelected()){
                    reportName = "Garage occupation";
                }else if(view.jRadioButtonProductsByMonth.isSelected()){
                    reportName = "Most sold products by month";
                }else if(view.jRadioButtonTotalRentedHours.isSelected()){
                    reportName = "Total rented hours";
                }else if(view.jRadioButtonEmployeeByPosition.isSelected()){
                    reportName = "Employees by position";
                }
                Model.saveReportTxt(view.jTableReports, reportName);
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
