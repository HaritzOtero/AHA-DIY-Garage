/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package model;

import java.util.ArrayList;
import javax.swing.table.AbstractTableModel;

/**
 *
 * @author soto.aitzol
 */
public class TotalIncomeByMonthTableModel extends AbstractTableModel{
    private final String[] zutabeIzenak = {"MONTH", "RENTING", "SELLING", "TOTAL"};
    private String[] hilabeteak = {"January","February","March","April","May","June","July","August","September","October","November","December","Total"};
    ArrayList<Selling> incomeFromSelling = new ArrayList();
    ArrayList<Renting> incomeFromRenting = new ArrayList();
    double total = 0;
    
    public TotalIncomeByMonthTableModel(ArrayList<Selling> incomeFromSelling,ArrayList<Renting> incomeFromRenting){
        this.incomeFromSelling = incomeFromSelling;
        this.incomeFromRenting = incomeFromRenting;
    }
    @Override
    public int getRowCount() {
        return hilabeteak.length;
    }
    
    @Override
    public String getColumnName(int columnIndex){
        return zutabeIzenak[columnIndex];
    }

    @Override
    public int getColumnCount() {
        return zutabeIzenak.length;
    }

    @Override
    public Object getValueAt(int rowIndex, int columnIndex) {
        if(columnIndex == 0){
            return hilabeteak[rowIndex];
        }else if (columnIndex == 1){
            return incomeFromRenting.get(rowIndex).getPrice();
        }else if (columnIndex == 2){
            return incomeFromSelling.get(rowIndex).getTotalCost();
        }else if (columnIndex == 3){
            return Math.round((incomeFromRenting.get(rowIndex).getPrice() + incomeFromSelling.get(rowIndex).getTotalCost())*100)/100;
        }
        return null;
    }
   
    
}
